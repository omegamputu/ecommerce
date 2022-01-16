<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\URL;
use PayPal\Api\Amount;
use PayPal\Api\Item;
use PayPal\Api\ItemList;
use PayPal\Api\Payer;
use PayPal\Api\Payment;
use PayPal\Api\PaymentExecution;
use PayPal\Api\RedirectUrls;
use PayPal\Api\Transaction;
use PayPal\Auth\OAuthTokenCredential;
use PayPal\Exception\PayPalConnectionException;
use PayPal\Rest\ApiContext;


class PaymentController extends Controller
{
    //
    public function __construct()
    {
        $paypal_conf = Config::get('paypal');
        $this->api_context = new ApiContext(new OAuthTokenCredential($paypal_conf['client_id'], $paypal_conf['secret']));
        $this->api_context->setConfig($paypal_conf['settings']);
    }

    public function payWithPaypal(Request $request)
    {
        $payer = new Payer();
        $payer->setPaymentMethod('paypal');

        $item_1 = new Item();
        $item_1->setName('Item 1')
               ->setCurrency('USD')
               ->setQuantity(1)
               ->setPrice($request->get('amount'));

        $item_list = new ItemList();
        $item_list->setItems([$item_1]);

        $amount = new Amount();
        $amount->setCurrency('USD')->setTotal($request->get('amount'));

        $transaction = new Transaction();
        $transaction->setAmount($amount)->setItemList($item_list)->setDescription('Your transaction description');

        $redirect_urls = new RedirectUrls();
        $redirect_urls->setReturnUrl(URL::route('status'))->setCancelUrl(URL::route('status'));

        $payment = new Payment();
        $payment->setIntent('Sale')->setPayer($payer)->setRedirectUrls($redirect_urls)->setTransactions([$transaction]);
        //dd($payment->create($this->api_context)); exit();

        try {
            $payment->create($this->api_context);
        } catch (PayPalConnectionException $exception) {
            if (Config::get('app.debug')) {
                Session::put('error', 'Délai de connection dépassé');
                return redirect()->route('paywithpaypal');
            } else {
                Session::put('error', 'Une erreur se produit, désolée pour l\'incovenient.');
                return redirect()->route('paywithpaypal');
            }
        }

        foreach ($payment->getLinks() as $link) {
            if ($link->getRel() == 'approval_url') {
                $redirect_url = $link->getHref();
                break;
            }
        }

        // add payment ID to session
        Session::put('paypal_payment_id', $payment->getId());

        if (isset($redirect_url)) {
            // redirect to paypal
            return Redirect::away($redirect_url);
        }

        Session::put('error', 'Une erreur inconnue se produit');

        return Redirect::route('paywithpaypal');
    }

    public function getPaymentStatus()
    {
        // Get the payment ID before session clear
        $payment_id = Session::get('paypal_payment_id');
        // clear the session payment ID
        Session::forget('paypal_payment_id');

        if (empty(Input::get('PayerID')) || empty(Input::get('token'))) {
            Session::put('error', 'Paiement échoué');
            return Redirect::route('paywithpaypal');
        }

        $payment = Payment::get($payment_id, $this->api_context);
        $execution = new PaymentExecution();
        $execution->setPayerId(Input::get('PayerID'));

        // Execute the payment
        $result = $payment->execute($execution, $this->api_context);

        if ($result->getState() == 'approved')
        {
            Session::put('success', 'Paiement réussi');
            return Redirect::to('thank');
        }
        Session::put('error', 'Paiement échoué');
        return Redirect::route('paywithpaypal');
    }

}

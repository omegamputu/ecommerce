<?php

namespace App\Http\Controllers;

use App\Order;
use App\Country;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\CheckoutRequest;
use Gloudemans\Shoppingcart\Facades\Cart;


class CheckoutController extends Controller
{
    // 

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $countries = Country::all();

        return view('checkout')->with([
            'countries' => $countries,
            'tax' => $this->getNumbers()->get('tax'),
            'discount' => $this->getNumbers()->get('discount'),
            'newSubTotal' => $this->getNumbers()->get('newSubTotal'),
            'newTax' => $this->getNumbers()->get('newTax'),
            'newTotal' => $this->getNumbers()->get('newTotal'),
        ]);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $order = new Order;

        $order->user_id = Auth::user()->id;
        $order->billing_email = $request->billing_email;
        $order->billing_name = $request->billing_name;
        $order->billing_address = $request->billing_address;
        $order->billing_city = $request->billing_city;
        $order->billing_country = $request->billing_country;
        $order->billing_phone = $request->billing_phone;
        $order->billing_total = (int) Cart::total();
        $order->billing_tax = (int) Cart::tax();

        $order->save();

        return redirect()->route('paywithpaypal');

    }

    private function getNumbers()
    {
        $tax = config('cart.tax') / 100;
        $discount = session()->get('coupon')['discount'] ?? 0;
        $newSubTotal = ((int) Cart::subtotal() - $discount);
        $newTax = $newSubTotal * $tax;
        $newTotal = $newSubTotal * (1 + $tax); // or $newSubTotal + $newTax

        return collect([
            'tax' => $tax,
            'discount' => $discount,
            'newSubTotal' => $newSubTotal,
            'newTax' => $newTax,
            'newTotal' => $newTotal,
        ]);
    }

}

<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use Illuminate\Support\Facades\Session;
use Gloudemans\Shoppingcart\Facades\Cart;

Route::get('locale/{locale}', function($locale){
    Session::put('locale', $locale); 

    return redirect()->back();
});
// Landing Page
Route::get('/', 'LandingPageController@index');
// Contact page
Route::get('contact', function(){
    return view('contact');
});
// Shop
Route::get('/shop', 'ShopController@index')->name('shop.index');
Route::get('/shop/{product}', 'ShopController@show')->name('shop.show');

// Cart
Route::resource('/cart', 'CartController');
Route::post('/cart/switchToSaveForLater/{product}', 'CartController@switchToSaveForLater')->name('cart.switchToSaveForLater');

Route::delete('/saveForLater/{product}', 'SaveForLaterController@destroy')->name('saveForLater.destroy');
Route::post('/saveForLater/switchToCart/{product}', 'SaveForLaterController@switchToCart')->name('saveForLater.switchToCart');

// Coupon
Route::post('/coupon', 'CouponsController@store')->name('coupon.store');
Route::delete('/coupon', 'CouponsController@destroy')->name('coupon.destroy');

// Checkout

Route::resource('/checkout', 'CheckoutController')->middleware('auth');
Route::post('/paypal-checkout', 'CheckoutController@paypalCheckout')->name('checkout.paypal');

Route::get('/guestCheckout', 'CheckoutController@index')->name('guestCheckout.index');
// Payment
Route::get('paywithpaypal', 'AppController@pay')->name('paywithpaypal');
Route::post('paypal', 'PaymentController@payWithPaypal')->name('paypal');
Route::get('status', 'PaymentController@getPaymentStatus')->name('status');
Route::get('thank', 'AppController@thank')->name('thank');

// Empty
Route::get('empty', function () {
    Cart::instance('saveForLater')->destroy();
});

Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->name('home')->middleware('verified');

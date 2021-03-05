<?php

use Illuminate\Support\Facades\Route;

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

//Route::get('/', function () {
//    return view('welcome');
//});

Route::get('/', 'HomeController@index')->middleware('verified');

Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->name('home')->middleware('verified');

// CRUD products

Route::resource('product', 'ProductController')->middleware('auth');

// Customers

Route::resource('customer', 'CustomerController')->middleware('auth');

// Shopping cart

Route::get('cart' , 'CartController@index');
Route::get('cart/{id}', 'CartController@add');
Route::post('cart/{rowId}/delete', 'CartController@destroy');

Route::get('checkout', 'CheckoutController@paymentStripe');
Route::post('checkout', 'CheckoutController@paymentStripe');
Route::post('checkout/pay', 'CheckoutController@postPaymentStripe');

// Transactions

Route::resource('transaction', 'TransactionController')->middleware('auth');






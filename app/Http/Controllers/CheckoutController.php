<?php

namespace App\Http\Controllers;

use App\Transaction;
use Cartalyst\Stripe\Exception\StripeException;
use Illuminate\Http\Request;
use Stripe\Exception\CardException;
use Stripe\Token;
use Validator;
use URL;
use Session;
use Redirect;
use App\User;
use Auth;
use Cartalyst\Stripe\Stripe;
use Gloudemans\Shoppingcart\Facades\Cart;
use Ramsey\Uuid\Math;
use Carbon\Carbon;
use App\Customer;

class CheckoutController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    public function paymentStripe(Request $request)
    {
        Cart::restore(Auth::user()->email);
        Cart::instance('shopping')->restore(Auth::user()->email);
        $cart = Cart::instance('shopping');

        $total = $cart->total();

        return view('payment.checkout')->with('total', $total);
    }

    public function postPaymentStripe(Request $request)
    {
        Cart::restore(Auth::user()->email);
        Cart::instance('shopping')->restore(Auth::user()->email);
        $cart = Cart::instance('shopping');

        $total = $cart->total();

        $validator = Validator::make($request->all(), [
            'card_name'     => 'required',
            'card_no'       => 'required',
            'ccExpiryMonth' => 'required',
            'ccExpiryYear'  => 'required',
            'cvvNumber'     => 'required',
            //'amount'        => 'required',
        ]);

        if ($validator->passes()) {

            try {

                if (null === (env('STRIPE_SECRET'))) {
                    session()->flash('message','SECRET KEY missing in .env');
                    return redirect()->to('checkout');
                }

                $stripe = new \Stripe\StripeClient(
                    env('STRIPE_SECRET')
                );

                $token = $stripe->tokens->create([
                    'card' => [
                        'number' => $request->get('card_no'),
                        'exp_month' => $request->get('ccExpiryMonth'),
                        'exp_year' => $request->get('ccExpiryYear'),
                        'cvc' => $request->get('cvvNumber'),
                    ],
                ]);

                $bill = intval($total*100);

                $charge = $stripe->charges->create([
                    'customer' => Auth::user()->stripe_id,//$token['id'],
                    'currency' => 'myr',
                    'amount' => $bill, // cents
                    'description' => 'pay',
                ]);

                if($charge['status'] == 'succeeded') {

                    $details = '';
                    foreach($cart->content() as $eachProd) {
                        $details .= $eachProd->qty .'x'. $eachProd->name . ', ';
                    }

                    $cust_id = Customer::where('user_id', Auth::user()->id)->pluck('id')->first();

                    // transaction record
                    $transaction = new Transaction;
                    $transaction->details = ' purchased ' . substr($details,0,-2);
                    $transaction->user_id = Auth::user()->id;
                    $transaction->customer_id = $cust_id;
                    $transaction->total = $bill/100;
                    $transaction->created_at = Carbon::now();
                    $transaction->save();

                    Cart::restore(Auth::user()->email);
                    Cart::instance('shopping')->restore(Auth::user()->email);
                    Cart::instance('shopping')->destroy();
                    session()->remove('cart');

                    return redirect()->to('cart')->with('message', $charge['status']);

                } else {
                    session()->flash('message', 'Failed to debit payment to wallet!');
                    return redirect()->to('checkout');
                }

            } catch (\Exception $e) {
                session()->flash('message', $e->getMessage());
                return redirect()->to('checkout');
            }

        } else {
            session()->flash('message', 'Contain Invalid Fields.');
            return redirect()->to('checkout');
        }
    }
}

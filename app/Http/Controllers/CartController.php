<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;

use App\Product;
use Auth;

class CartController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('product.shoppingCart');
    }

    public function add($id)
    {
        Cart::restore(Auth::user()->email);
        Cart::instance('shopping')->restore(Auth::user()->email);

        $product = Product::find($id);

        $item = array(
            "id"    => $product->id,
            "name"  => $product->name,
            "qty"   => 1,
            "price" => $product->price,
        );

        // add item to cart
        Cart::instance('shopping')->add($item);

        Cart::store(Auth::user()->email);
        Cart::instance('shopping')->store(Auth::user()->email);

        $cart = Cart::instance('shopping');
        session()->put('cart',
            [
                'content' => $cart->content(),
                'subtotal' => $cart->subtotal(),
                'total' => $cart->total(),
                'tax' => $cart->tax(),
            ]
        );

        return redirect()->to('cart');
    }

    public function checkout()
    {
        Cart::restore(Auth::user()->email);
        Cart::instance('shopping')->restore(Auth::user()->email);
        $cart = Cart::instance('shopping');

//        dd('checkout', $cart->content(), $cart->total());

        return view('payment.checkout')->with(['summary' => $cart->content(), 'total' => $cart->total()]);
    }

    public function destroy(Request $request)
    {
        Cart::restore(Auth::user()->email);
        Cart::instance('shopping')->restore(Auth::user()->email);

        Cart::instance('shopping')->remove($request->post('rowId'));

        Cart::store(Auth::user()->email);
        Cart::instance('shopping')->store(Auth::user()->email);

        $cart = Cart::instance('shopping');
        session()->put('cart',
            [
                'content' => $cart->content(),
                'subtotal' => $cart->subtotal(),
                'total' => $cart->total(),
                'tax' => $cart->tax(),
            ]
        );

        return redirect()->to('cart');

//        Cart::instance('shopping')->destroy();
//        Cart::destroy();
//        session()->remove('cart');
//        return view('product.shoppingCart');
    }

}

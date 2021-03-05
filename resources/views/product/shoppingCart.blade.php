@extends('layouts.app')
@section('content')

    <div class="container">

        @hasrole('customer')
        @if (Session::has('cart'))
            <table class="table table-striped">
                <thead>
                <tr>
                    <th scope="col">Product</th>
                    <th scope="col">Qty</th>
                    <th scope="col">Price</th>
                    <th scope="col">Subtotal</th>
                </tr>
                </thead>
                <tbody>

                @php(

                    $cart = Session::get('cart')
                )

                @foreach($cart['content'] as $item_in_cart)
                    <tr>
                        <td>
                            {{ Form::open(array('method' => 'POST', 'url' => 'cart/'.$item_in_cart->rowId . '/delete', 'class' => '')) }}
                            {{ Form::hidden('rowId', $item_in_cart->rowId) }}
                            {{ Form::submit('x', array('class' => 'btn btn-link')) }}

                            <strong>{{ $item_in_cart->name }}</strong>
                            {{ ($item_in_cart->options->has('siztransace') ? $item_in_cart->options->size : '') }}


                            {{ Form::close() }}


                        </td>
                        <td>{{ $item_in_cart->qty }}</td>
                        <td>${{ $item_in_cart->price }}</td>
                        <td>${{ $item_in_cart->total }}</td>
                    </tr>
                @endforeach
                </tbody>

                <tfoot>
                    <tr>
                        <td colspan="2">&nbsp;</td>
                        <td>Subtotal</td>
                        <td>${{$cart['subtotal']}}</td>
                    </tr>
                    <tr>
                        <td colspan="2">&nbsp;</td>
                        <td>Tax</td>
                        <td>${{$cart['tax']}}</td>
                    </tr>
                    <tr>
                        <td colspan="2">&nbsp;</td>
                        <td><strong>Total</strong></td>
                        <td><strong>${{$cart['total']}}</strong></td>
                    </tr>
                </tfoot>

            </table>
        @else
            <i>Shopping Cart is Empty</i>
        @endif

        <hr>
        <div class="row">
            <div class="col-md-12 text-right">

{{--                <a class="btn btn-dark" href="{{ url('cart/checkout') }}">Checkout &rarr;</a>--}}

                {{ Form::open(array('method' => 'POST', 'url' => 'checkout')) }}
                {{ Form::hidden('total', (Session::has('cart') ? $cart['total'] : 0)) }}

                <a class="btn btn-primary" href="{{ url('product') }}">&larr; Continue Shopping</a>

                @if (Session::has('cart'))
                {{ Form::submit('Checkout &rarr;', array('class' => 'btn btn-dark')) }}
                {{ Form::close() }}
                @endif

            </div>
        </div>

        @else
            <i>Shopping cart for customer</i>
        @endrole

    </div>
@endsection

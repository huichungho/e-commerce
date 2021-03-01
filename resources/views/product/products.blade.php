@extends('layouts.app')
@section('content')

    <div class="container">

        <p><a href="{{ url()->to('product/create') }}">Add a Product</a></p>

        List of Products

        @if(!is_null($product))

        <ul>
            @if (isset($singular))
                <li> {{ $product->name }} </li>
            @else
                @foreach ($product as $eachProduct)
                    <li>{{ $eachProduct->name }}</li>
                @endforeach
            @endif
        </ul>

        @endif

    </div>


@endsection

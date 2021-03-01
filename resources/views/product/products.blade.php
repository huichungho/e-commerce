@extends('layouts.app')
@section('content')

    <div class="container">

        <p><a href="{{ url()->to('product/create') }}">Add a Product</a></p>

        List of Products

        @if(!is_null($product))

        <ul>
            @if (isset($singular))
                <li>
                    {{ $product->name }} <a href="{{ url('product/'.$product->id).'/edit' }}">[edit]</a>
                </li>
            @else
                @foreach ($product as $eachProduct)
                    <li>
                        <a href="{{ url('product/'.$eachProduct->id).'/edit' }}">[edit]</a>
                        {{ $eachProduct->name }}
                    </li>
                @endforeach
            @endif
        </ul>

        @endif

    </div>


@endsection

@extends('layouts.app')
@section('content')

    <div class="container">

        List of Products

        <ul>
            @foreach ($product as $eachProduct)
                <li>{{ $eachProduct->name }}</li>
            @endforeach
        </ul>

    </div>


@endsection

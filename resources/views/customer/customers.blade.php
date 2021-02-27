@extends('layouts.app')
@section('content')

    <div class="container">

        List of Customers

        <ul>
            @foreach ($customer as $eachCustomer)
                <li>{{ $eachCustomer->name }}</li>
            @endforeach
        </ul>

    </div>


@endsection

@extends('layouts.app')
@section('content')

    <div class="container">

        List of Customers

        @if(!is_null($customer))

        <ul>
            @if (isset($singular))
                <li> {{ $customer->name }} </li>
            @else
                @foreach ($customer as $eachCustomer)
                    <li>{{ $eachCustomer->name }}</li>
                @endforeach
            @endif
        </ul>

        @endif

    </div>


@endsection

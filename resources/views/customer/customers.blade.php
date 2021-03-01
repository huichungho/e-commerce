@extends('layouts.app')
@section('content')

    <div class="container">

        List of Customers

        @if(!is_null($customer))

        <ul>
            @if (isset($singular))
                <li> {{ $customer->name }}
                    <br> + Transaction history
                    <ul>
                        @foreach ($customer->transaction as $transaction)
                            <li> {{ $transaction->details }} </li>
                        @endforeach
                    </ul>
                </li>
            @else
                @foreach ($customer as $eachCustomer)
                    <li>{{ $eachCustomer->name }}</li>
                @endforeach
            @endif
        </ul>

        @endif

    </div>


@endsection

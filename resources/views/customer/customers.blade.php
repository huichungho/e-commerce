@extends('layouts.app')
@section('content')

    <div class="container">

        @if (isset($singular))
            <p><a href="{{ url('customer') }}">&larr; back</a></p>
            <h5>Details of Customer</h5>
        @else
            <h5>List of Customers</h5>
        @endif

        @if(!is_null($customer))

        <ul class="list-group">
            @if (isset($singular))
                <li class="list-group-item">
                    {{ $customer->details->name }}
                    <br> - Transaction history
                    <ul>
                        @foreach ($customer->transaction as $transaction)
                            <li> {{ $transaction->details }} </li>
                        @endforeach
                    </ul>
                </li>
            @else
                @foreach ($customer as $eachCustomer)
                    <li class="list-group-item">
                        <a href="{{ url('customer').'/'.$eachCustomer->id }}">[details]</a>
                        {{ $eachCustomer->details->name }}
                    </li>
                @endforeach
            @endif
        </ul>

        @endif

    </div>


@endsection

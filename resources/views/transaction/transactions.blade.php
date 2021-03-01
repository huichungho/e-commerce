@extends('layouts.app')
@section('content')

    <div class="container">

        List of transactions

        @if(!is_null($transaction))

        <ul>
            @if (isset($singular))
                {{ $transaction->customer->name }}
                {{ $transaction->details }}
            @else
                @foreach ($transaction as $eachTransaction)
                    <li>
                        {{ $eachTransaction->customer->name }}
                        {{ $eachTransaction->details }}
                    </li>
                @endforeach
            @endif
        </ul>

        @endif

    </div>


@endsection

@extends('layouts.app')
@section('content')

    <div class="container">

        List of transactions

        <ul>
            @foreach ($transaction as $eachTransaction)
                <li>
                    {{ $eachTransaction->customer->name }}
                    {{ $eachTransaction->details }}
                </li>
            @endforeach
        </ul>

    </div>


@endsection

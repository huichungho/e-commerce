@extends('layouts.app')
@section('content')

    <div class="container">

        <p>List of transactions</p>

        @if(!is_null($transaction))

        <ul class="list-group">
            @foreach ($transaction as $eachTransaction)
                <li class="list-group-item">
                    {{ $eachTransaction->customer->details->name }}
                    {{ $eachTransaction->details }}
                    at total of ${{ $eachTransaction->total }}
                    on {{ $eachTransaction->created_at }}
                </li>
            @endforeach

            <br><div class="row">
                <div class="col-md-12">
                    {{ $transaction->links() }}
                </div>
            </div>

        </ul>

        @endif

    </div>


@endsection

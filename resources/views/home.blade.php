@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <p>{{ __('You are logged in!') }}</p>

                    @hasanyrole('customer')
                        <ul class="list-group">
                            <li class="list-group-item active"><a class="text-light" href="{{ url('product') }}">Products</a></li>
                            <li class="list-group-item"><a href="{{ url('transaction').'/'.Auth::user()->id }}">Transactions</a></li>
                        </ul>
                    @endhasrole

                    @hasrole('superadmin')
                        <ul class="list-group">
                            <li class="list-group-item active"><a class="text-light" href="{{ url('product') }}">Products</a></li>
                            <li class="list-group-item"><a href="{{ url('customer') }}">Customers</a></li>
                            <li class="list-group-item"><a href="{{ url('transaction') }}">Transactions</a></li>
                        </ul>
                    @endhasrole

                </div>
            </div>
        </div>
    </div>
</div>
@endsection

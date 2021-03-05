@extends('layouts.app')

@section('content')
    <div class="container">

        <h3>Admin Panel</h3>

        <br><a href="{{ url('product') }}">List Products</a>
        <br><a href="{{ url('customer') }}">List Customers</a>
        <br><a href="{{ url('transaction') }}">Show Transactions</a>

    </div>
@endsection

@extends('layouts.app')
@section('content')
    <div class="container">

    @if (isset($product->id))

        <p><a href="{{ url('product') }}">&larr; back</a></p>
        <h4>Edit "{{ $product->name }}"</h4>

        <br>{{ Form::model($product, array('url' => 'product/'.$product->id, 'method' => 'PUT')) }}

            <div class="form-group">
                {{ Form::label('name','Name') }}
                {{ Form::text('name', Request::old('name'), array('class' => 'form-control', 'placeholder' => 'Product name', 'required' => 'required')) }}
            </div>

            <div class="form-group">
                {{ Form::label('description','Description') }}
                {{ Form::text('description', Request::old('description'), array('class' => 'form-control', 'placeholder' => 'Description here')) }}
            </div>

            <div class="form-group">
                {{ Form::label('price','Price') }}
                {{ Form::number('price', Request::old('price'), array('class' => 'form-control', 'step' => '0.01', 'placeholder' => '0.00', 'required' => 'required')) }}
            </div>

            {{ Form::submit('Update', array('class' => 'btn btn-primary')) }}
            <a class="btn btn-dark" href="{{ url('product') }}" role="button">Cancel</a>

            {{ Form::close() }}

        <hr>

        {{ Form::open(array('url' => 'product/'.$product->id)) }}
            {{ Form::hidden('_method', 'DELETE') }}
            {{ Form::submit('Delete!', array('class' => 'btn btn-danger')) }}
            <small><i>(Proceed with cautious!)</i></small>
        {{ Form::close() }}


    @else
        <small>Product not found or has been removed.</small>
    @endif

    </div>
@endsection

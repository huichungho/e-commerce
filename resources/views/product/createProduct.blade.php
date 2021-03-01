@extends('layouts.app')
@section('content')
    <div class="container">
        <p><a href="{{ url('product') }}">&larr; back</a></p>
        <h4>Add a Product</h4>

        <br>{{ Form::open(array('url' => 'product')) }}

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

            {{ Form::submit('Add', array('class' => 'btn btn-primary')) }}

        {{ Form::close() }}

    </div>
@endsection

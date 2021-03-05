@extends('layouts.app')
@section('content')

    <div class="container">

        @hasrole('customer')

            <h4>Summary</h4>
            <br><strong>Total : ${{$total}}</strong>
            <br>Payment Method: Stripe

            <div class="flex flex-wrap -mx-2 mt-4">
                <div class="p-3 w-auto border-top border-bottom">
                    <div class="relative">
                        <label for="card_element" class="leading-7 text-sm text-gray-600"><b>Credit Card Information</b></label>
                        <div id="card-element"></div>

                        <br><div class='relative bg'>

                            <form class="form-horizontal" method="POST" id="payment-form" role="form" action="{!!url('checkout/pay')!!}" >

                                {{ csrf_field() }}

                                <div class='form-row'>

                                    <div class='col-xs-12 form-group name required'>

                                        <p>
                                            <label class='control-label'>Name on Card</label>

                                            <input autocomplete='off' class='form-control card-name' size='25' type='text' name="card_name" required>
                                        </p>
                                    </div>

                                </div>

                                <div class='form-row'>

                                    <div class='col-xs-12 form-group card required'>

                                        <p>
                                            <label class='control-label'>Card Number</label>
                                            <input autocomplete='off' class='form-control card-number' size='24' type='text' name="card_no" required>
                                        </p>
                                    </div>

                                </div>

                                <div class='form-row'>

                                    <div class='col-xs-4 form-group cvc required'>

                                        <label class='control-label'>CVV</label>

                                        <input autocomplete='off' class='form-control card-cvc' placeholder='ex. 311' size='4' type='text' name="cvvNumber" required>

                                    </div>

                                    <div class='col-xs-4 form-group expiration required'>

                                        <label class='control-label'>Expiration</label>

                                        <input class='form-control card-expiry-month' placeholder='MM' size='4' type='text' name="ccExpiryMonth" required>

                                    </div>

                                    <div class='col-xs-4 form-group expiration required'>

                                        <label class='control-label'> Year </label>

                                        <input class='form-control card-expiry-year' placeholder='YYYY' size='4' type='text' name="ccExpiryYear" required>

                                        {{--<input class='form-control card-expiry-year' placeholder='YYYY' size='4' type='hidden' name="amount" value="300">--}}

                                    </div>

                                </div>

                                {{ Form::submit('Proceed to Payment', array('class' => 'btn btn-danger')) }}

                            </form>

                        </div>

                    </div>
                </div>
            </div>

            {{--<p>--}}
                {{--{{ Form::open(array('url' => 'checkout/pay')) }}--}}
                {{--{{ Form::hidden('secret', 'secretkey') }}--}}
                {{--{{ Form::submit('Proceed to Payment', array('class' => 'btn btn-danger')) }}--}}
                {{--{{ Form::close() }}--}}
            {{--</p>--}}
        @endhasrole
    </div>
@endsection

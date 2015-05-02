@extends('public.layouts.main')

@section('title')
    @parent About fooCart
@stop

@section('content')
    <div class="container">
        <div class="row row-top-buffer">
            @if($errors->any())
                <div class="row">
                    <div class="col-sm-12 alert alert-danger">
                        <h1>Error <span class="glyphicon glyphicon-exclamation-sign"></span></h1>
                        <ul>
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            @endif
            @if(isset($error))
                <div class="row">
                    <div class="col-sm-12 alert alert-danger">
                        <h1>Error <span class="glyphicon glyphicon-exclamation-sign"></span></h1>
                        <ul>
                            <li>{{ $error }}</li>
                        </ul>
                    </div>
                </div>
            @endif
            {!! Form::open(['url' => '/order', 'id' => 'checkout-form']) !!}
                <div class="col-sm-12" id="checkout-error">
                    <ul class="alert alert-danger messages">

                    </ul>
                </div>
                <div class="col-sm-6">
                    <h4 class="col-sm-12">Address</h4>
                    <div class="form-group col-sm-12">
                        {!! Form::text('first_name', null, ['class' => 'form-control required', 'id' => 'firstName', 'placeholder' => 'First Name']) !!}
                    </div>
                    <div class="form-group col-sm-12">
                        {!! Form::text('last_name', null, ['class' => 'form-control required', 'id' => 'lastName', 'placeholder' => 'Last Name']) !!}
                    </div>
                    <div class="form-group col-sm-12">
                        {!! Form::text('home_phone', null, ['class' => 'form-control required', 'id' => 'homePhone', 'maxlength' => '12', 'placeholder' => 'Phone']) !!}
                    </div>
                    <div class="form-group col-sm-12">
                        {!! Form::text('addr_street_1', null, ['class' => 'form-control required', 'id' => 'addressOne', 'placeholder' => 'Address Line 1']) !!}
                    </div>
                    <div class="form-group col-sm-12">
                        {!! Form::text('addr_street_2', null, ['class' => 'form-control', 'id' => 'addressTwo', 'placeholder' => 'Address Line 2']) !!}
                    </div>
                    <div class="form-group col-sm-12">
                        {!! Form::text('addr_city', null, ['class' => 'form-control required', 'id' => 'city', 'placeholder' => 'City']) !!}
                    </div>
                    <div class="form-group col-sm-6">
                        @include('public.partials.state-list-dropdown')
                    </div>
                    <div class="form-group col-sm-6">
                        {!! Form::text('addr_zip', null, ['class' => 'form-control required', 'id' => 'zip', 'maxlength' => '5', 'placeholder' => 'Zip']) !!}
                    </div>
                </div>
                <div class="col-sm-6">
                    <h4 class="col-sm-12">Payment Information</h4>
                    <div class="form-group col-sm-9">
                        <input type="text" id="cardNumber" class="form-control" data-stripe="number" placeholder="Credit Card Number"/>
                    </div>
                    <div class="form-group col-sm-3">
                        <input type="text" id="cv2" class="form-control" data-stripe="cvc" placeholder="CV Code"/>
                    </div>
                    <div class="form-group col-sm-6">
                        {!! Form::selectMonth(null, null, ['id' => 'exp-month', 'class' => 'form-control', 'data-stripe' => 'exp-month']) !!}
                    </div>
                    <div class="form-group col-sm-6">
                        {!! Form::selectYear(null, date('Y'), date('Y') + 10, null, ['id' => 'exp-year', 'class' => 'form-control', 'data-stripe' => 'exp-year']) !!}
                    </div>
                    <div class="form-group col-sm-12">
                        {!! Form::submit('Purchase', ['id' => 'subBtn', 'class' => 'form-control btn-primary']) !!}
                    </div>
                </div>
            {!! Form::close() !!}
        </div>
    </div>
@stop
@section('footer')
    <script type="text/javascript" src="https://js.stripe.com/v2/"></script>
    <script>
        var orderForm = window.orderForm || {};
        $(function()
        {
            /**
             * Initialize the order form.
             * Set the required parameters.
             * Run any functions required by form.
             */
            orderForm.init = function()
            {
                //Set form parameters
                this.form = $('form#checkout-form');
                this.submitButton = this.form.find('input[type="submit"]');
                this.stripeErrorMsg = $('li.stripe-error');
                this.submitButtonValue = this.submitButton.val();
                orderForm.autoHyphenate();
                //Set the public Stripe key
                var stripeKey = '{{ Config::get('stripe.publishable_key') }}';
                Stripe.setPublishableKey(stripeKey);
            };

            /**
             * Handle form submission.
             */
            $('form#checkout-form').submit(function(e)
            {
                if(orderForm.checkRequiredFields())
                {
                    orderForm.sendToken();
                }

                e.preventDefault();
                return false;
            });

            /**
             * Send payment info to Stripe (AJAX).
             * Stripe returns a token to ID the payment.
             *
             * @returns {boolean}
             */
            orderForm.sendToken = function()
            {
                this.submitButton.val('Processing...').prop('disabled', true);

                Stripe.createToken(this.form, $.proxy(this.stripeResponseHandler, this));

                return false
            };

            /**
             * Submit the form to our server.
             * Include the data from the Stripe server.
             *
             * @param s
             * @param r
             * @returns {*}
             */
            orderForm.stripeResponseHandler = function(s, r)
            {
                if(r.error)
                {
                    $('li.stripe-error').remove();
                    this.form.find('#checkout-error').show().find('ul.messages').append('<li class="stripe-error">' + r.error.message + '</li>');
                    return this.submitButton.prop('disabled', false).val(this.submitButtonValue);
                }

                $('<input>', {
                    type: 'hidden',
                    name: 'stripe-token',
                    value: r.id
                }).appendTo(this.form);

                this.form[0].submit();
            };

            /**
             * Auto-hyphenate the phone number field.
             * This currently applies to US numbers only.
             */
            orderForm.autoHyphenate = function()
            {
                $("input[name='home_phone']").keyup(function(){
                    //Remove hyphens that the user enters.
                    var phoneNum = $(this).val().split("-").join("");
                    if($(this).val().length > 3){
                        phoneNum = phoneNum.match(new RegExp('.{1,4}$|.{1,3}', 'g')).join("-");
                        $(this).val(phoneNum);
                    }
                });
            };

            /**
             * Check that all required fields have a value.
             *
             * @returns {boolean}
             */
            orderForm.checkRequiredFields = function()
            {
                var passedValidation = true;
                $('input.required, select.required').each(function()
                {
                    var empty = (!!$(this).val() === 'undefined' || $(this).val() === '');
                    if(empty)
                    {
                        $('li.validation-error').remove();
                        $('form#checkout-form').find('#checkout-error').show().find('ul.messages').append('<li class="validation-error">Please fill out all required fields.</li>');
                        $(this).addClass('order-form-error');
                        passedValidation = false;
                    }else {
                        $('li.validation-error').remove();
                        $(this).removeClass('order-form-error');
                    }
                });
                return passedValidation;
            };

            //Call the init method.
            orderForm.init();
        });
    </script>
@stop
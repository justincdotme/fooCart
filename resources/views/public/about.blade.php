@extends('public.layouts.main')

@section('title')
    @parent About fooCart
@stop

@section('content')
    <div class="container">
        <div class="row row-top-buffer">
            <div class="col-sm-8">
                <div class="jumbotron">
                    <h1>About fooCart</h1>
                    <p>fooCart is a PHP 5 based eCommerce application with integrated Stripe payments developed by <a href="http://justinc.me" target="_BLANK">Justin Christenson</a> as a portfolio project.</p>
                    <h3>fooCart was built with:</h3>
                    <div class="row">
                        <div class="col-sm-6">
                            <ul class="list-group">
                                <li class="list-group-item-heading list-group-item">
                                    <h4>Server Side</h4>
                                </li>
                                <li class="list-group-item list-group-item-text"><a target="_BLANK" href="http://laravel.com/">Laravel 5</a></li>
                                <li class="list-group-item list-group-item-text"><a target="_BLANK" href="https://www.mysql.com/">MySQL</a></li>
                                <li class="list-group-item list-group-item-text"><a target="_BLANK" href="https://stripe.com/">Stripe SDK</a></li>
                            </ul>
                        </div>
                        <div class="col-sm-6">
                            <ul class="list-group">
                                <li class="list-group-item-heading list-group-item">
                                    <h4>Client Side</h4>
                                </li>
                                <li class="list-group-item list-group-item-text"><a target="_BLANK" href="http://getbootstrap.com/">Bootstrap</a></li>
                                <li class="list-group-item list-group-item-text"><a target="_BLANK" href="https://jquery.com/">jQuery</a></li>
                                <li class="list-group-item list-group-item-text"><a target="_BLANK" href="http://handlebarsjs.com/">Handlebars JS</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="well well-sm">All product images are courtesy of <a target="_BLANK" href="http://www.FreeDigitalPhotos.net">FreeDigitalPhotos.net</a>.</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <h1>Contact</h1>
                        @if($errors->any())
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="alert alert-danger">
                                        <h1>Error <span class="glyphicon glyphicon-exclamation-sign"></span></h1>
                                        <ul>
                                            @foreach($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        @endif
                            <div class="row contact-errors">
                                <div class="col-sm-12">
                                    <div class="alert alert-danger">
                                        <h1>Error <span class="glyphicon glyphicon-exclamation-sign"></span></h1>
                                        <ul class="messages">

                                        </ul>
                                    </div>
                                </div>
                            </div>
                        @if(!$contacted)
                        <form id="contact-form" role="form" method="POST" action="/messages">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <div class="form-group">
                                <label for="name">Name:</label>
                                <input name="sender_name" type="text" class="form-control required" id="name">
                            </div>
                            <div class="form-group">
                                <label for="email">Email Address:</label>
                                <input name="sender_email" type="email" class="form-control required" id="email">
                            </div>
                            <div class="form-group">
                                <label for="phone">Phone Number:</label>
                                <input name="sender_phone" type="phone" class="form-control required" id="phone" maxlength="12">
                            </div>
                            <div class="form-group">
                                <label for="message">Message</label>
                                <textarea name="message" rows="5" class="form-control" id="message"></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary">Contact</button>
                        </form>
                        @else
                            <h1>Thank you for your interest!</h1>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
@section('footer')
    <script>
        var contactForm = window.contactForm || {};

        /**
         * Auto hyphenate the Phone Number field using a regex.
         */
        contactForm.autoHyphenate = function()
        {
            $("input[name='sender_phone']").keyup(function(){
                //Remove hyphens that the user enters.
                var phoneNum = $(this).val().split("-").join("");
                if($(this).val().length > 3){
                    phoneNum = phoneNum.match(new RegExp('.{1,4}$|.{1,3}', 'g')).join("-");
                    $(this).val(phoneNum);
                }
            });
        };

        /**
         * Check that each required field has a value.
         *
         * @returns {boolean}
         */
        contactForm.checkRequiredFields = function()
        {
            var passedValidation = true;
            $('input.required').each(function()
            {
                var empty = (!!$(this).val() === 'undefined' || $(this).val() === '');
                if(empty)
                {
                    $('li.validation-error').remove();
                    $('.contact-errors').show().find('ul.messages').append('<li class="validation-error">Please fill out all required fields.</li>');
                    $(this).addClass('contact-form-error');
                    passedValidation = false;
                }else {
                    $('li.validation-error').remove();
                    $(this).removeClass('contact-form-error');
                }
            });
            return passedValidation;
        };

        /**
         * Handle form submission.
         */
        $('form#contact-form').submit(function(e)
        {
            var submitBtn = $(this).find('button[type="submit"]');
            if(contactForm.checkRequiredFields())
            {
                submitBtn.text('Sending...');
                var url = $(this).attr('action');
                var data = $(this).serialize();
                $.post(url, data, function(d)
                {
                    $('form#contact-form').slideUp().after('<h1>Thank you for your interest!</h1>');
                });
            }
            e.preventDefault();
        });

        contactForm.autoHyphenate();
    </script>
@stop
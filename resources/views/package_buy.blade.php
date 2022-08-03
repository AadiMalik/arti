@extends('layouts.app')
@section('content')
@section('style')
    <style>
        .pricingTable {
            background: #fff;
            font-family: 'Outfit', sans-serif;
            text-align: center;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            position: relative;
            z-index: 1;
        }

        .pricingTable .pricingTable-header {
            color: #fff;
            background-color: #22A6B3;
            padding: 20px 20px 25px;
            margin: 0 0 43px;
            border-radius: 0 0 50% 50%/0 0 100% 100%;
            box-shadow: 0 5px 10px rgba(0, 0, 0, 0.3);
            position: relative;
        }

        .pricingTable .pricingTable-header:before,
        .pricingTable .pricingTable-header:after {
            content: '';
            background-color: #4444;
            height: 100%;
            width: 50%;
            border-radius: 0 0 50% 50%;
            position: absolute;
            left: 0;
            top: 0;
            z-index: -1;
        }

        .pricingTable .pricingTable-header:after {
            left: auto;
            right: 0;
        }

        .pricingTable .title {
            font-size: 33px;
            font-weight: 600;
            letter-spacing: 0.5px;
            text-transform: uppercase;
            margin: 0 0 15px;
        }

        .pricingTable .price-value .amount {
            font-size: 40px;
            font-weight: 500;
            line-height: 40px;
            display: block;
        }

        .pricingTable .price-value .duration {
            text-transform: uppercase;
            display: block;
        }

        .pricingTable .pricing-content {
            padding: 0;
            margin: 0 0 40px;
            list-style: none;
        }

        .pricingTable .pricing-content li {
            color: #000;
            font-size: 17px;
            line-height: 25px;
            text-transform: uppercase;
            margin: 0 0 17px;
        }

        .pricingTable .pricing-content li:last-child {
            margin: 0;
        }

        .pricingTable .pricingTable-signup {
            background-color: #22A6B3;
            padding: 10px 10px 8px;
            border-radius: 50% 50% 0 0/100% 100% 0 0;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
        }

        .pricingTable .pricingTable-signup a {
            color: #fff;
            font-size: 23px;
            font-weight: 600;
            text-transform: uppercase;
            transition: all 0.3s ease 0s;
        }

        .pricingTable .pricingTable-signup a:hover {
            color: #fff;
            letter-spacing: 2px;
            text-shadow: 3px 3px 0 rgba(255, 255, 255, 0.2);
        }

        .pricingTable.pink .pricingTable-header,
        .pricingTable.pink .pricingTable-header::before,
        .pricingTable.pink .pricingTable-header::after,
        .pricingTable.pink .pricingTable-signup {
            background-color: #BE2EDD;
        }

        .pricingTable.green .pricingTable-header,
        .pricingTable.green .pricingTable-header::before,
        .pricingTable.green .pricingTable-header::after,
        .pricingTable.green .pricingTable-signup {
            background-color: #6AB04C;
        }

        @media only screen and (max-width: 990px) {
            .pricingTable {
                margin: 0 0 40px;
            }
        }
    </style>
@endsection
<!-- breadcrumb area start -->
<div class="breadcrumb-area">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="breadcrumb-wrap">
                    <nav aria-label="breadcrumb">
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Price Table</li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="demo">
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-sm-6">
                <div class="pricingTable">
                    <div class="pricingTable-header" style="background: {{ $package->color ?? '#000' }}">
                        <h3 class="title">{{ $package->name ?? '' }}</h3>
                        <div class="price-value">
                            <span class="amount">Rs.{{ $package->price ?? '' }}</span>
                            <span class="duration">{{ $package->days ?? '' }} Days</span>
                        </div>
                    </div>
                    <ul class="pricing-content">
                        <li>{{ $package->add ?? '' }} Adds</li>
                    </ul>
                    <div class="pricingTable-signup" style="background: {{ $package->color ?? '#000' }}">
                        <a href="#">Sign Up</a>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="card panel-default credit-card-box">
                    <div class="card-header display-table">
                        <div class="row display-tr p-3">
                            <h3 class="panel-title display-td">Payment Details</h3>
                        </div>
                    </div>
                    <div class="card-body">
                        @if (Session::has('success'))
                            <div class="alert alert-success text-center">
                                <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                                <p>{{ Session::get('success') }}</p>
                            </div>
                        @endif
                        @if (Session::has('error'))
                            <div class="alert alert-danger text-center">
                                <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                                <p>{{ Session::get('error') }}</p>
                            </div>
                        @endif
                        <form role="form" action="{{ route('stripe.post') }}" method="post"
                            class="require-validation" data-cc-on-file="false"
                            data-stripe-publishable-key="{{ config('app.stripe_key') }}" id="payment-form">
                            @csrf
                            <div class='form-row row'>
                                <div class='col-md-12 error form-group d-none'>
                                    <div class='alert-danger alert'>Please correct the errors and try
                                        again.
                                    </div>
                                </div>
                            </div>
                            <div class='form-row row'>
                                <div class='col-md-12 form-group required'>
                                    <label class='control-label'>Name on Card</label> <input class='form-control'
                                        size='20' type='text'>
                                </div>
                            </div>
                            <div class='form-row row'>
                                <div class='col-md-12 form-group required'>
                                    <label class='control-label'>Card Number</label> <input autocomplete='off'
                                        class='form-control card-number' size='20' type='text'>
                                </div>
                            </div>
                            <div class='form-row'>
                                <div class='col-md-4 form-group cvc required'>
                                    <label class='control-label'>CVC</label> <input autocomplete='off'
                                        class='form-control card-cvc' placeholder='ex. 311' size='4'
                                        type='text'>
                                </div>
                                <div class='col-md-4 form-group expiration required'>
                                    <label class='control-label'>Expiration Month</label> <input
                                        class='form-control card-expiry-month' placeholder='MM' size='2'
                                        type='text'>
                                </div>
                                <div class='col-md-4 form-group expiration required'>
                                    <label class='control-label'>Expiration Year</label> <input
                                        class='form-control card-expiry-year' placeholder='YYYY' size='4'
                                        type='text'>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-12">
                                    <input type='hidden' name="package_id" value="{{$package->id}}">
                                    <button class="btn btn-success btn-lg btn-block ml-3 mt-3" type="submit">Pay Now
                                        (Rs.{{ $package->price ?? '' }})</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')
<script type="text/javascript" src="https://js.stripe.com/v2/"></script>
<script type="text/javascript">
    $(function() {
        var $form = $(".require-validation");
        $('form.require-validation').bind('submit', function(e) {
            var $form = $(".require-validation"),
                inputSelector = ['input[type=email]', 'input[type=password]',
                    'input[type=text]', 'input[type=file]',
                    'textarea'
                ].join(', '),
                $inputs = $form.find('.required').find(inputSelector),
                $errorMessage = $form.find('div.error'),
                valid = true;
            $errorMessage.addClass('d-none');
            $('.has-error').removeClass('has-error');
            $inputs.each(function(i, el) {
                var $input = $(el);
                if ($input.val() === '') {
                    $input.parent().addClass('has-error');
                    $errorMessage.removeClass('d-none');
                    e.preventDefault();
                }
            });
            if (!$form.data('cc-on-file')) {
                e.preventDefault();
                Stripe.setPublishableKey($form.data('stripe-publishable-key'));
                Stripe.createToken({
                    number: $('.card-number').val(),
                    cvc: $('.card-cvc').val(),
                    exp_month: $('.card-expiry-month').val(),
                    exp_year: $('.card-expiry-year').val()
                }, stripeResponseHandler);
            }
        });

        function stripeResponseHandler(status, response) {
            if (response.error) {
                $('.error')
                    .removeClass('d-none')
                    .find('.alert')
                    .text(response.error.message);
            } else {
                /* token contains id, last4, and card type */
                var token = response['id'];
                $form.find('input[type=text]').empty();
                $form.append("<input type='hidden' name='stripeToken' value='" + token + "'/>");
                $form.get(0).submit();
            }
        }
    });
</script>
@endsection

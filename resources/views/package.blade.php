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
            @foreach ($package as $item)
            <div class="col-md-4 col-sm-6">
                <div class="pricingTable">
                    <div class="pricingTable-header" style="background: {{$item->color??'#000'}}">
                        <h3 class="title">{{$item->name??''}}</h3>
                        <div class="price-value">
                            <span class="amount">Rs.{{$item->price??''}}</span>
                            <span class="duration">{{$item->days??''}} Days</span>
                        </div>
                    </div>
                    <ul class="pricing-content">
                        <li>{{$item->add??''}} Featured Adds</li>
                        <li>{{$item->top??''}} Days Display Front Page</li>
                    </ul>
                    <div class="pricingTable-signup" style="background: {{$item->color??'#000'}}">
                        <a href="{{url('package-buy/'.$item->id)}}">Sign Up</a>
                    </div>
                </div>
            </div>
            @endforeach
            {{-- <div class="col-md-4 col-sm-6">
                <div class="pricingTable pink">
                    <div class="pricingTable-header">
                        <h3 class="title">Business</h3>
                        <div class="price-value">
                            <span class="amount">$20.00</span>
                            <span class="duration">Per Month</span>
                        </div>
                    </div>
                    <ul class="pricing-content">
                        <li>50GB Disk Space</li>
                        <li>50 Email Accounts</li>
                        <li>50GB Bandwidth</li>
                        <li>Maintenance</li>
                        <li>15 Subdomains</li>
                    </ul>
                    <div class="pricingTable-signup">
                        <a href="#">Sign Up</a>
                    </div>
                </div>
            </div> --}}
        </div>
    </div>
</div>
@endsection

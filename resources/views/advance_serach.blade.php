@php

use Carbon\Carbon;
@endphp
@extends('layouts.app')
@section('content')
@section('style')
    <style>
        .ribbon {
            font: bold 12px sans-serif;
            text-align: center;
            -webkit-transform: rotate(45deg);
            -moz-transform: rotate(45deg);
            -ms-transform: rotate(45deg);
            -o-transform: rotate(45deg);
            position: absolute;
            padding: 4px 0;
            top: 15px;
            right: -30px;
            width: 120px;
            background-color: #0c8b51;
            color: #fff;
        }

        .nice-select {
            width: 100%;
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
                            <li class="breadcrumb-item active" aria-current="page">Advance Search</li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- breadcrumb area end -->

<!-- page wrapper start -->
<div class="page-main-wrapper">
    <div class="container">
        <div class="row">
            <!-- sidebar start -->
            <div class="col-lg-3 order-2 order-lg-1">
                <div class="shop-sidebar-wrap mt-md-28 mt-sm-28">
                    <!-- sidebar categorie start -->
                    {{-- <div class="sidebar-widget mb-30">
                        <div class="sidebar-category">
                            <ul>
                                <li class="title"><i class="fa fa-bars"></i> categories</li>
                                @foreach ($category as $item)
                                <li><a href="#">{{$item->name??''}}</a><span>({{$product->where('category_id',$item->id)->count()}})</span></li>
                                @endforeach
                            </ul>
                        </div>
                    </div> --}}
                    <!-- sidebar categorie start -->

                    <!-- manufacturer start -->
                    <form action="{{ url('advance-search/filter') }}" method="POST">
                        @csrf
                        <div class="sidebar-widget mb-30">
                            <div class="sidebar-title mb-10">
                                <h3>Advance Search For</h3>
                            </div>
                            <div class="sidebar-widget-body">
                                <ul>
                                    <li style="background: #0c8b51; padding:5px;"><a style="color:#fff; font-weight:bold;" href="{{url('advance-search')}}">For Sale Product</a></li>
                                    <li><a href="{{url('arti-advance-search')}}">For Commession Agent</a></li>
                                    
                                </ul>
                            </div>
                        </div>
                        <div class="sidebar-widget mb-30">
                            <div class="sidebar-title mb-10">
                                <h3>forsale Categories</h3>
                            </div>
                            <div class="sidebar-widget-body">
                                <ul>
                                    <li><input type="radio" name="category" value="vehicles">
                                        Vehicles<span>({{ number_format($sale_product_count->where('category', 'vehicles')->count()) }})</span>
                                    </li>
                                    <li><input type="radio" name="category" value="crops">
                                        Crops<span>({{ number_format($sale_product_count->where('category', 'crops')->count()) }})</span>
                                    </li>
                                    <li><input type="radio" name="category" value="fertilizers">
                                        Fertilizers<span>({{ number_format($sale_product_count->where('category', 'fertilizers')->count()) }})</span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="sidebar-widget mb-30">
                            <div class="sidebar-title mb-10">
                                <h3>Sub Categories</h3>
                            </div>
                            <div class="sidebar-widget-body">
                                <ul>
                                    <li><input type="radio" name="sub_category" value="tractor">
                                        Tractors<span>({{ number_format($sale_product_count->where('sub_category', 'tractor')->count()) }})</span>
                                    </li>
                                    <li><input type="radio" name="sub_category" value="dumper">
                                        Dumpers<span>({{ number_format($sale_product_count->where('sub_category', 'dumper')->count()) }})</span>
                                    </li>
                                    <li><input type="radio" name="sub_category" value="exivator">
                                        Exivators<span>({{ number_format($sale_product_count->where('sub_category', 'exivator')->count()) }})</span>
                                    </li>
                                    <li><input type="radio" name="sub_category" value="harvestor">
                                        Harvestors<span>({{ number_format($sale_product_count->where('sub_category', 'harvestor')->count()) }})</span>
                                    </li>
                                    <li><input type="radio" name="sub_category" value="fertilizer">
                                        Fertilizers<span>({{ number_format($sale_product_count->where('sub_category', 'fertilizer')->count()) }})</span>
                                    </li>
                                    <li><input type="radio" name="sub_category" value="fruit">
                                        Fruits<span>({{ number_format($sale_product_count->where('sub_category', 'fruit')->count()) }})</span>
                                    </li>
                                    <li><input type="radio" name="sub_category" value="vegitable">
                                        Vegitables<span>({{ number_format($sale_product_count->where('sub_category', 'vegitable')->count()) }})</span>
                                    </li>
                                    <li><input type="radio" name="sub_category" value="grain">
                                        Grains<span>({{ number_format($sale_product_count->where('sub_category', 'grain')->count()) }})</span>
                                    </li>
                                    <li><input type="radio" name="sub_category" value="other">
                                        Others<span>({{ number_format($sale_product_count->where('sub_category', 'other')->count()) }})</span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <!-- manufacturer end -->
                        <!-- pricing filter start -->
                        <div class="sidebar-widget mb-30">
                            <div class="sidebar-title mb-10">
                                <h3>Disctrict/Tehsil</h3>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <select name="district" style="width: 100%;" class="form-control"
                                            id="">
                                            <option disabled selected>--select district--</option>
                                            @foreach ($district as $item)
                                            <option value="{{$item->id??''}}">{{$item->name??''}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div><br><br>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <select name="tehsil" class="form-control" id="">
                                            <option disabled selected>--select tehsil--</option>
                                            @foreach ($tehsil as $item)
                                            <option value="{{$item->id??''}}">{{$item->name??''}} ({{$item->district_name->name??''}})</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- pricing filter start -->
                        <div class="sidebar-widget mb-10">
                            <div class="sidebar-title mb-10">
                                <h3>filter by Price</h3>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <span>Min: </span>
                                    <input type="number" class="form-control" name="min">
                                    <span>Max: </span>
                                    <input type="number" class="form-control" name="max"><br>
                                </div>
                            </div>
                        </div>
                        <div class="sidebar-widget mb-30">
                            <div class="sidebar-title mb-10">
                                <h3>filter by Make</h3>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <span>Make: </span>
                                    <input type="text" class="form-control" name="make">
                                    <span>Model: </span>
                                    <input type="text" class="form-control" name="model">
                                </div>
                            </div>
                        </div>

                        <button class="btn btn-success">Filter</button>
                        <hr>

                    </form>
                    <!-- pricing filter end -->

                    <!-- product size start -->


                    <!-- sidebar banner start -->
                    <div class="sidebar-widget mb-30">
                        <div class="img-container fix img-full">
                            <a href="#"><img src="1.jpg" alt=""></a>
                        </div>
                    </div>
                    <!-- sidebar banner end -->
                </div>
            </div>
            <!-- sidebar end -->

            <!-- product main wrap start -->
            <div class="col-lg-9 order-1 order-lg-2">
                {{-- <div class="shop-banner img-full">
                    <img src="{{ asset('3.jpg') }}" alt="" style="height: 250px;">
                </div> --}}
                <!-- product view wrapper area start -->
                <div class="shop-product-wrapper pt-34">

                    
                    <!-- product item end -->
                    <h3>For Sale Products</h3>
                    <hr>
                    <!-- product item start -->
                    <div class="shop-product-wrap grid row">
                        @if ($sale_product->count() > 0)
                            @foreach ($sale_product as $item)
                                @if ($item->expiry > Carbon::now())
                                    <div class="col-lg-3 col-md-4 col-sm-6">
                                        <!-- product single grid item start -->
                                        <div class="product-item fix mb-30">
                                            <div class="product-thumb">
                                                <i class="ribbon">Featured</i>
                                                <a href="{{ url('forsale-detail/' . $item->id) }}">
                                                    <img src="{{ asset($item->image1 ?? '') }}" class="img-pri"
                                                        style="height: 200px;" alt="">
                                                    {{-- <img src="{{ asset($item->image2 ?? '') }}" class="img-sec"
                                                            style="height: 200px;" alt=""> --}}
                                                </a>
                                            </div>
                                            <div class="product-content">
                                                <h4><a
                                                        href="{{ url('forsale-detail/' . $item->id) }}">{{ $item->name ?? '' }}</a>
                                                </h4>
                                                <div class="pricebox">
                                                    <span class="regular-price">Rs. {{ $item->price ?? '' }}</span>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- product single grid item end -->
                                    </div> <!-- product single column end -->
                                @endif
                            @endforeach
                            @foreach ($sale_product as $item)
                                @if ($item->expiry < Carbon::now() || ($item->expiry = null))
                                    <div class="col-lg-3 col-md-4 col-sm-6">
                                        <!-- product single grid item start -->
                                        <div class="product-item fix mb-30">
                                            <div class="product-thumb">
                                                <a href="{{ url('forsale-detail/' . $item->id) }}">
                                                    <img src="{{ asset($item->image1 ?? '') }}" class="img-pri"
                                                        style="height: 200px;" alt="">
                                                    {{-- <img src="{{ asset($item->image2 ?? '') }}" class="img-sec"
                                                            style="height: 200px;" alt=""> --}}
                                                </a>
                                            </div>
                                            <div class="product-content">
                                                <h4><a
                                                        href="{{ url('forsale-detail/' . $item->id) }}">{{ $item->name ?? '' }}</a>
                                                </h4>
                                                <div class="pricebox">
                                                    <span class="regular-price">Rs.
                                                        {{ $item->price ?? '' }}</span>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- product single grid item end -->
                                    </div> <!-- product single column end -->
                                @endif
                            @endforeach
                        @else
                            <div class="col-md-12">
                                <h4>No Product Found</h4>
                            </div>
                        @endif
                    </div>
                    <!-- product item end -->
                    <!-- shop product top wrap start -->
                </div>
            </div>
            <!-- product main wrap end -->
        </div>
    </div>
</div>
<!-- page wrapper end -->
@endsection

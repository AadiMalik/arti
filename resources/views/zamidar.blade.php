@php

use Carbon\Carbon;
@endphp
@extends('layouts.app')
@section('content')
@section('style')
    <style>
        .ribbon {
            font: bold 15px sans-serif;
            text-align: center;
            -webkit-transform: rotate(-45deg);
            -moz-transform: rotate(-45deg);
            -ms-transform: rotate(-45deg);
            -o-transform: rotate(-45deg);
            position: absolute;
            padding: 7px 0;
            top: 15px;
            left: -30px;
            width: 120px;
            background-color: #0c8b51;
            color: #fff;
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
                            <li class="breadcrumb-item active" aria-current="page">Zameendar Products</li>
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
                    <div class="sidebar-widget mb-30">
                        <div class="sidebar-title mb-10">
                            <h3>Categories</h3>
                        </div>
                        <div class="sidebar-widget-body">
                            <ul>
                                <li><i class="fa fa-angle-right"></i><a
                                        href="{{ url('category/vehicles') }}">Vehicles</a><span>({{ number_format($sale_product_count->where('category', 'vehicles')->count()) }})</span>
                                </li>
                                <li><i class="fa fa-angle-right"></i><a
                                        href="{{ url('category/crops') }}">Crops</a><span>({{ number_format($sale_product_count->where('category', 'crops')->count()) }})</span>
                                </li>
                                <li><i class="fa fa-angle-right"></i><a
                                        href="{{ url('category/fertilizers') }}">Fertilizers</a><span>({{ number_format($sale_product_count->where('category', 'fertilizers')->count()) }})</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!-- manufacturer end -->

                    <!-- pricing filter start -->
                    <div class="sidebar-widget mb-30">
                        <div class="sidebar-title mb-10">
                            <h3>filter by price</h3>
                        </div>
                        <div class="row">
                            <form action="{{ url('zameendar/filter') }}" method="GET">
                                @csrf
                                <div class="col-md-12">
                                    <span>Min: </span>
                                    <input type="number" required class="form-control" name="min">
                                    <span>Max: </span>
                                    <input type="number" required class="form-control" name="max"><br>
                                    <button class="btn btn-success">Filter</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- pricing filter end -->

                    <!-- product size start -->
                    <div class="sidebar-widget mb-30">
                        <div class="sidebar-title mb-10">
                            <h3>Sub Categories</h3>
                        </div>
                        <div class="sidebar-widget-body">
                            <ul>
                                <li><i class="fa fa-angle-right"></i><a
                                        href="{{ url('sub-category/tractor') }}">Tractors</a><span>({{ number_format($sale_product_count->where('sub_category', 'tractor')->count()) }})</span>
                                </li>
                                <li><i class="fa fa-angle-right"></i><a
                                        href="{{ url('sub-category/dumper') }}">Dumpers</a><span>({{ number_format($sale_product_count->where('sub_category', 'dumper')->count()) }})</span>
                                </li>
                                <li><i class="fa fa-angle-right"></i><a
                                        href="{{ url('sub-category/exivator') }}">Exivators</a><span>({{ number_format($sale_product_count->where('sub_category', 'exivator')->count()) }})</span>
                                </li>
                                <li><i class="fa fa-angle-right"></i><a
                                        href="{{ url('sub-category/harvestor') }}">Harvestors</a><span>({{ number_format($sale_product_count->where('sub_category', 'harvestor')->count()) }})</span>
                                </li>
                                <li><i class="fa fa-angle-right"></i><a
                                        href="{{ url('sub-category/fertilizer') }}">Fertilizers</a><span>({{ number_format($sale_product_count->where('sub_category', 'fertilizer')->count()) }})</span>
                                </li>
                                <li><i class="fa fa-angle-right"></i><a
                                        href="{{ url('sub-category/fruit') }}">Fruits</a><span>({{ number_format($sale_product_count->where('sub_category', 'fruit')->count()) }})</span>
                                </li>
                                <li><i class="fa fa-angle-right"></i><a
                                        href="{{ url('sub-category/vegitable') }}">Vegitables</a><span>({{ number_format($sale_product_count->where('sub_category', 'vegitable')->count()) }})</span>
                                </li>
                                <li><i class="fa fa-angle-right"></i><a
                                        href="{{ url('sub-category/grain') }}">Grains</a><span>({{ number_format($sale_product_count->where('sub_category', 'grain')->count()) }})</span>
                                </li>
                                <li><i class="fa fa-angle-right"></i><a
                                        href="{{ url('sub-category/other') }}">Others</a><span>({{ number_format($sale_product_count->where('sub_category', 'other')->count()) }})</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!-- product size end -->

                    <!-- product tag start -->
                    {{-- <div class="sidebar-widget mb-30">
                        <div class="sidebar-title mb-10">
                            <h3>tags</h3>
                        </div>
                        <div class="sidebar-widget-body">
                            <div class="product-tag">
                                @foreach ($product as $item)
                                <a href="#">{{$item->tags??''}}</a>
                                @endforeach
                            </div>
                        </div>
                    </div> --}}
                    <!-- product tag end -->

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
                <div class="shop-banner img-full">
                    <img src="{{ asset('3.jpg') }}" alt="" style="height: 250px;">
                </div>
                <!-- product view wrapper area start -->
                <div class="shop-product-wrapper pt-34">
                    <!-- shop product top wrap start -->
                    <div class="shop-top-bar">
                        <div class="row">
                            <div class="col-lg-7 col-md-6">
                                <div class="top-bar-left">
                                    <div class="product-view-mode mr-70 mr-sm-0">
                                        <a href="#" data-target="grid"><i class="fa fa-th"></i></a>
                                        <a class="active" href="#" data-target="list"><i
                                                class="fa fa-list"></i></a>
                                    </div>
                                    <div class="product-amount">
                                        <p>{{ $sale_product->links() }}</p>
                                    </div>
                                </div>
                            </div>
                            {{-- <div class="col-lg-5 col-md-6">
                                <div class="top-bar-right">
                                    <div class="product-short">
                                        <p>Sort By : </p>
                                        <select class="nice-select" name="sortby">
                                            <option value="trending">Relevance</option>
                                            <option value="sales">Name (A - Z)</option>
                                            <option value="sales">Name (Z - A)</option>
                                            <option value="rating">Price (Low &gt; High)</option>
                                            <option value="date">Rating (Lowest)</option>
                                            <option value="price-asc">Model (A - Z)</option>
                                            <option value="price-asc">Model (Z - A)</option>
                                        </select>
                                    </div>
                                </div>
                            </div> --}}
                        </div>
                    </div>
                    <!-- shop product top wrap start -->

                    <!-- product item start -->
                    <div class="shop-product-wrap list row">
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
                                @if ($item->expiry < Carbon::now() || $item->expiry = null)
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
                        <div class="col-lg-3 col-md-4 col-sm-6">
                            <!-- product single list item start -->

                            @foreach ($sale_product as $item)
                                @if ($item->expiry > Carbon::now() )
                                    <div class="product-list-item mb-30">
                                        <div class="product-thumb" style="overflow: hidden;">
                                            <i class="ribbon">Featured</i>
                                            <a href="{{ url('forsale-detail/' . $item->id) }}">
                                                <img src="{{ asset($item->image1 ?? '') }}" class="img-pri"
                                                    style="height: 310px;" alt="">
                                                {{-- <img src="{{ asset($item->image2 ?? '') }}" class="img-sec"
                                                        style="height: 310px;" alt=""> --}}
                                            </a>
                                        </div>
                                        <div class="product-list-content">
                                            <h3><a
                                                    href="{{ url('forsale-detail/' . $item->id) }}">{{ $item->name ?? '' }}</a>
                                            </h3>
                                            <div class="pricebox">
                                                <span class="regular-price">Rs. {{ $item->price ?? '' }}</span>
                                            </div>
                                            <p>{!! $item->description ?? '' !!}</p>
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                            @foreach ($sale_product as $item)
                                @if ($item->expiry < Carbon::now() || $item->expiry = null)
                                    <div class="product-list-item mb-30">
                                        <div class="product-thumb">
                                            <a href="{{ url('forsale-detail/' . $item->id) }}">
                                                <img src="{{ asset($item->image1 ?? '') }}" class="img-pri"
                                                    style="height: 310px;" alt="">
                                                {{-- <img src="{{ asset($item->image2 ?? '') }}" class="img-sec"
                                                        style="height: 310px;" alt=""> --}}
                                            </a>
                                        </div>
                                        <div class="product-list-content">
                                            <h3><a
                                                    href="{{ url('forsale-detail/' . $item->id) }}">{{ $item->name ?? '' }}</a>
                                            </h3>
                                            <div class="pricebox">
                                                <span class="regular-price">Rs. {{ $item->price ?? '' }}</span>
                                            </div>
                                            <p>{!! $item->description ?? '' !!}</p>
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                            <!-- product single list item start -->
                        </div> <!-- product single column end -->
                    </div>
                    <!-- product item end -->
                </div>
                <!-- product view wrapper area end -->

                <!-- start pagination area -->
                <div class="paginatoin-area text-center pt-28">
                    <div class="row">
                        <div class="col-12">
                            <ul class="pagination-box">
                                {{ $sale_product->links() }}
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- end pagination area -->

            </div>
            <!-- product main wrap end -->
        </div>
    </div>
</div>
<!-- page wrapper end -->
@endsection

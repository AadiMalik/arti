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
            top: 55px;
            right: -45px;
            width: 206px;
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
                    <form action="{{ url('arti-advance-search/filter') }}" method="POST">
                        @csrf
                        <div class="sidebar-widget mb-30">
                            <div class="sidebar-title mb-10">
                                <h3>Advance Search For</h3>
                            </div>
                            <div class="sidebar-widget-body">
                                <ul>
                                    <li><a href="{{ url('advance-search') }}">For Sale Product</a></li>
                                    <li style="background: #0c8b51; padding:5px;"><a
                                            style="color:#fff; font-weight:bold;"
                                            href="{{ url('arti-advance-search') }}">For Commession Agent</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="sidebar-widget mb-30">
                            <div class="sidebar-title mb-10">
                                <h3>Arti</h3>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <span>Name/Email/Phone/address: </span>
                                    <input type="text" class="form-control" name="arti">
                                </div>
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
                                                <option value="{{ $item->id ?? '' }}">{{ $item->name ?? '' }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div><br><br>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <select name="tehsil" class="form-control" id="">
                                            <option disabled selected>--select tehsil--</option>
                                            @foreach ($tehsil as $item)
                                                <option value="{{ $item->id ?? '' }}">{{ $item->name ?? '' }}
                                                    ({{ $item->district_name->name ?? '' }})</option>
                                            @endforeach
                                        </select>
                                    </div>
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
                    <!-- shop product top wrap start -->
                    <h3>Commession Agents</h3>
                    <hr>
                    <!-- product item start -->
                    <div class="shop-product-wrap grid row">
                        @if ($arti->count() > 0)
                            @foreach ($arti as $item)
                                @foreach ($item->roles as $item2)
                                    @if ($item2->title == 'Arti')
                                        <div class="col-lg-3 col-md-4 col-sm-6">
                                            <!-- product single grid item start -->
                                            <div class="product-item fix mb-30">
                                                <div class="product-thumb">
                                                    @if ($item->verify == 0)
                                                        <i class="ribbon">Verify</i>
                                                    @endif
                                                    <a href="{{ url('arti-detail/' . $item->id) }}">
                                                        <img src="{{ asset($item->image ?? 'assets/img/user.jpg') }}"
                                                            class="img-pri" style="height: 200px;" alt="">
                                                    </a>
                                                </div>
                                                <div class="product-content">
                                                    <h4><a href="{{ url('arti-detail/' . $item->id) }}">{{ $item->first_name ?? '' }}
                                                            {{ $item->last_name ?? '' }}</a>
                                                        @if ($item->verify == 0)
                                                            <i class="fa fa-check-circle" style="color: blue;"
                                                                aria-hidden="true"></i>
                                                        @endif
                                                    </h4>
                                                    <div class="pricebox">
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- product single grid item end -->
                                        </div> <!-- product single column end -->
                                    @endif
                                @endforeach
                            @endforeach
                        @else
                            <div class="col-md-12">
                                <h4>No Commession Agent Found</h4>
                            </div>
                        @endif
                    </div>
                </div>

            </div>
            <!-- product main wrap end -->
        </div>
    </div>
</div>
<!-- page wrapper end -->
@endsection

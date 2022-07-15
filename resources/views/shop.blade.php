@extends('layouts.app')
@section('content')
<!-- breadcrumb area start -->
<div class="breadcrumb-area">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="breadcrumb-wrap">
                    <nav aria-label="breadcrumb">
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Products</li>
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
                    <div class="sidebar-widget mb-30">
                        <div class="sidebar-category">
                            <ul>
                                <li class="title"><i class="fa fa-bars"></i> categories</li>
                                @foreach ($category as $item)
                                <li><a href="#">{{$item->name??''}}</a><span>({{$product->where('category_id',$item->id)->count()}})</span></li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    <!-- sidebar categorie start -->

                    <!-- manufacturer start -->
                    <div class="sidebar-widget mb-30">
                        <div class="sidebar-title mb-10">
                            <h3>Manufacturers</h3>
                        </div>
                        <div class="sidebar-widget-body">
                            <ul>
                                <li><i class="fa fa-angle-right"></i><a href="#">calvin klein</a><span>(10)</span></li>
                                <li><i class="fa fa-angle-right"></i><a href="#">diesel</a><span>(12)</span></li>
                                <li><i class="fa fa-angle-right"></i><a href="#">polo</a><span>(20)</span></li>
                                <li><i class="fa fa-angle-right"></i><a href="#">Tommy Hilfiger</a><span>(12)</span></li>
                                <li><i class="fa fa-angle-right"></i><a href="#">Versace</a><span>(16)</span></li>
                            </ul>
                        </div>
                    </div>
                    <!-- manufacturer end -->

                    <!-- pricing filter start -->
                    <div class="sidebar-widget mb-30">
                        <div class="sidebar-title mb-10">
                            <h3>filter by price</h3>
                        </div>
                        <div class="sidebar-widget-body">
                            <div class="price-range-wrap">
                                <div class="price-range" data-min="50" data-max="400"></div>
                                <div class="range-slider">
                                    <form action="#" class="d-flex justify-content-between">
                                        <button class="filter-btn">filter</button>
                                        <div class="price-input d-flex align-items-center">
                                            <label for="amount">Price: </label>
                                            <input type="text" id="amount">
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- pricing filter end -->

                    <!-- product size start -->
                    <div class="sidebar-widget mb-30">
                        <div class="sidebar-title mb-10">
                            <h3>size</h3>
                        </div>
                        <div class="sidebar-widget-body">
                            <ul>
                                <li><i class="fa fa-angle-right"></i><a href="#">s</a><span>(10)</span></li>
                                <li><i class="fa fa-angle-right"></i><a href="#">m</a><span>(12)</span></li>
                                <li><i class="fa fa-angle-right"></i><a href="#">l</a><span>(20)</span></li>
                                <li><i class="fa fa-angle-right"></i><a href="#">XL</a><span>(12)</span></li>
                            </ul>
                        </div>
                    </div>
                    <!-- product size end -->

                    <!-- product tag start -->
                    <div class="sidebar-widget mb-30">
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
                    </div>
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
                    <img src="3.jpg" alt="" style="height: 250px;">
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
                                        <a class="active" href="#" data-target="list"><i class="fa fa-list"></i></a>
                                    </div>
                                    <div class="product-amount">
                                        <p>Showing 1–16 of 21 results</p>
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
                        @foreach ($product as $item)
                        <div class="col-lg-3 col-md-4 col-sm-6">
                            <!-- product single grid item start -->
                            <div class="product-item fix mb-30">
                                <div class="product-thumb">
                                    <a href="{{url('product-detail/'.$item->id)}}">
                                        @foreach ($product_image->where('product_id',$item->id)->take(2) as $loop=> $item2)
                                        @if($loop->first)
                                        <img src="{{asset($item2->image??'')}}" class="img-pri" style="height: 200px;" alt="">
                                        @else
                                        <img src="{{asset($item2->image??'')}}" class="img-sec" style="height: 200px;" alt="">
                                        @endif
                                        @endforeach
                                    </a>
                                    {{-- <div class="product-label">
                                        <span>hot</span>
                                    </div>
                                    <div class="product-action-link">
                                        <a href="#" data-toggle="modal" data-target="#quick_view"> <span data-toggle="tooltip" data-placement="left" title="Quick view"><i class="fa fa-search"></i></span> </a>
                                        <a href="#" data-toggle="tooltip" data-placement="left" title="Wishlist"><i class="fa fa-heart-o"></i></a>
                                        <a href="#" data-toggle="tooltip" data-placement="left" title="Compare"><i class="fa fa-refresh"></i></a>
                                        <a href="#" data-toggle="tooltip" data-placement="left" title="Add to cart"><i class="fa fa-shopping-cart"></i></a>
                                    </div> --}}
                                </div>
                                <div class="product-content">
                                    <h4><a href="{{url('product-detail/'.$item->id)}}">{{$item->name??''}}({{$item->type??''}})</a></h4>
                                    <div class="pricebox">
                                        <span class="regular-price">Rs. {{$item->price_low??''}} - {{$item->price_high??''}}</span>
                                        {{-- <div class="ratings">
                                            <span class="good"><i class="fa fa-star"></i></span>
                                            <span class="good"><i class="fa fa-star"></i></span>
                                            <span class="good"><i class="fa fa-star"></i></span>
                                            <span class="good"><i class="fa fa-star"></i></span>
                                            <span><i class="fa fa-star"></i></span>
                                            <div class="pro-review">
                                                <span>1 review(s)</span>
                                            </div>
                                        </div> --}}
                                    </div>
                                </div>
                            </div>
                            <!-- product single grid item end -->
                        </div> <!-- product single column end -->
                        @endforeach
                        <div class="col-lg-3 col-md-4 col-sm-6">
                            <!-- product single list item start -->
                            @foreach ($product as $item)
                            <div class="product-list-item mb-30">
                                <div class="product-thumb">
                                    <a href="{{url('product-detail/'.$item->id)}}">
                                        @foreach ($product_image->where('product_id',$item->id)->take(2) as $loop=> $item2)
                                        @if($loop->first)
                                        <img src="{{asset($item2->image??'')}}" class="img-pri" style="height: 310px;" alt="">
                                        @else
                                        <img src="{{asset($item2->image??'')}}" class="img-sec" style="height: 310px;" alt="">
                                        @endif
                                        @endforeach
                                    </a>
                                    {{-- <div class="product-label">
                                        <span>hot</span>
                                    </div> --}}
                                </div>
                                <div class="product-list-content">
                                    <h3><a href="{{url('product-detail/'.$item->id)}}">{{$item->name??''}}({{$item->type??''}})</a></h3>
                                    {{-- <div class="ratings">
                                        <span class="good"><i class="fa fa-star"></i></span>
                                        <span class="good"><i class="fa fa-star"></i></span>
                                        <span class="good"><i class="fa fa-star"></i></span>
                                        <span class="good"><i class="fa fa-star"></i></span>
                                        <span><i class="fa fa-star"></i></span>
                                        <div class="pro-review">
                                            <span>1 review(s)</span>
                                        </div>
                                    </div> --}}
                                    <div class="pricebox">
                                        <span class="regular-price">Rs. {{$item->price_low??''}} - {{$item->price_high??''}}</span>
                                        {{-- <span class="old-price"><del>$90.00</del></span> --}}
                                    </div>
                                    <p>{!!$item->description??''!!}</p>
                                    {{-- <p>Phasellus id nisi quis justo tempus mollis sed et dui. In hac habitasse platea dictumst. Suspendisse ultrices mauris diam. Nullam sed aliquet elit. Mauris consequat nisi ut mauris efficitur lacinia.</p> --}}
                                    {{-- <div class="product-list-action-link">
                                        <a class="buy-btn" href="#" data-toggle="tooltip" data-placement="top" title="Add to cart">go to buy <i class="fa fa-shopping-cart"></i> </a>
                                        <a href="#" data-toggle="modal" data-target="#quick_view"> <span data-toggle="tooltip" data-placement="top" title="Quick view"><i class="fa fa-search"></i></span> </a>
                                        <a href="#" data-toggle="tooltip" data-placement="top" title="Wishlist"><i class="fa fa-heart-o"></i></a>
                                        <a href="#" data-toggle="tooltip" data-placement="top" title="Compare"><i class="fa fa-refresh"></i></a>
                                    </div> --}}
                                </div>
                            </div>
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
                                {{$product->links()}}
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
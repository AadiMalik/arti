@php
    use Carbon\Carbon;
@endphp
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
                            <li class="breadcrumb-item active" aria-current="page">product detail</li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- breadcrumb area end -->

<!-- product details wrapper start -->
<div class="product-details-wrapper">
    <div class="container">
        <div class="row">
            <div class="col-lg-9">
                <!-- product details inner end -->
                <div class="product-details-inner fix">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="product-box-slider slick-padding slick-arrow-style_2 mb-20">
                                @if($sale_product_detail->image1)
                                <div class="pro-large-img">
                                    <img src="{{asset($sale_product_detail->image1)}}" style="height: 300px;" alt="" />
                                </div>
                                @endif
                                @if($sale_product_detail->image2)
                                <div class="pro-large-img">
                                    <img src="{{asset($sale_product_detail->image2)}}" style="height: 300px;" alt="" />
                                </div>
                                @endif
                                @if($sale_product_detail->image3)
                                <div class="pro-large-img">
                                    <img src="{{asset($sale_product_detail->image3)}}" style="height: 300px;" alt="" />
                                </div>
                                @endif
                                @if($sale_product_detail->image4)
                                <div class="pro-large-img">
                                    <img src="{{asset($sale_product_detail->image4)}}" style="height: 300px;" alt="" />
                                </div>
                                @endif
                                @if($sale_product_detail->image5)
                                <div class="pro-large-img">
                                    <img src="{{asset($sale_product_detail->image5)}}" style="height: 300px;" alt="" />
                                </div>
                                @endif
                                @if($sale_product_detail->image6)
                                <div class="pro-large-img">
                                    <img src="{{asset($sale_product_detail->image6)}}" style="height: 300px;" alt="" />
                                </div>
                                @endif
                                @if($sale_product_detail->image7)
                                <div class="pro-large-img">
                                    <img src="{{asset($sale_product_detail->image7)}}" style="height: 300px;" alt="" />
                                </div>
                                @endif
                                @if($sale_product_detail->image8)
                                <div class="pro-large-img">
                                    <img src="{{asset($sale_product_detail->image8)}}" style="height: 300px;" alt="" />
                                </div>
                                @endif
                                @if($sale_product_detail->image9)
                                <div class="pro-large-img">
                                    <img src="{{asset($sale_product_detail->image9)}}" style="height: 300px;" alt="" />
                                </div>
                                @endif
                                @if($sale_product_detail->image10)
                                <div class="pro-large-img">
                                    <img src="{{asset($sale_product_detail->image10)}}" style="height: 300px;" alt="" />
                                </div>
                                @endif
                                @if($sale_product_detail->image11)
                                <div class="pro-large-img">
                                    <img src="{{asset($sale_product_detail->image11)}}" style="height: 300px;" alt="" />
                                </div>
                                @endif
                                @if($sale_product_detail->image12)
                                <div class="pro-large-img">
                                    <img src="{{asset($sale_product_detail->image12)}}" style="height: 300px;" alt="" />
                                </div>
                                @endif
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="product-details-des card-body mt-14">
                                <h3>{{$sale_product_detail->name??''}}</h3>
                                <div class="pricebox">
                                    <span class="regular-price">Rs. {{$sale_product_detail->price??''}}</span>
                                </div><br>
                                <table class="table table-striped table-hover">
                                    @if($sale_product_detail->company_name)
                                    <tr>
                                        <th><b>Company Name:</b></th>
                                        <td>{{ucfirst($sale_product_detail->company_name??'')}}</td>
                                    </tr>
                                    @endif
                                    <tr>
                                        <th><b>Category:</b></th>
                                        <td>{{ucfirst($sale_product_detail->category??'')}}</td>
                                    </tr>
                                    <tr>
                                        <th><b>Sub Category:</b></th>
                                        <td>{{ucfirst($sale_product_detail->sub_category??'')}}</td>
                                    </tr>
                                    <tr>
                                        <th><b>Price:</b></th>
                                        <td>{{$sale_product_detail->price??''}}</td>
                                    </tr>
                                    <tr>
                                        <th><b>Make:</b></th>
                                        <td>{{$sale_product_detail->make??''}}</td>
                                    </tr>
                                    <tr>
                                        <th><b>Model:</b></th>
                                        <td>{{$sale_product_detail->model??''}}</td>
                                    </tr>
                                    <tr>
                                        <th><b>Address:</b></th>
                                        <td>{{$sale_product_detail->address??''}}</td>
                                    </tr>
                                    <tr>
                                        <th><b>Tehsil:</b></th>
                                        <td>{{$sale_product_detail->tehsil_name->name??''}}</td>
                                    </tr>
                                    <tr>
                                        <th><b>District/City:</b></th>
                                        <td>{{$sale_product_detail->district_name->name??''}}</td>
                                    </tr>
                                    <tr>
                                        <th><b>Created By:</b></th>
                                        <td>{{$sale_product_detail->user_name->username??''}}</td>
                                    </tr>
                                    @if($sale_product_detail->updated_at)
                                    <tr>
                                        <th><b>Updated:</b></th>
                                        <td>{{$sale_product_detail->updated_at??''}}</td>
                                    </tr>
                                    @else
                                    <tr>
                                        <th><b>Created:</b></th>
                                        <td>{{$sale_product_detail->created_at??''}}</td>
                                    </tr>
                                    @endif
                                    <tr>
                                        <th><b>Discription:</b></th>
                                        <td>{!!$sale_product_detail->description??''!!}</td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- product details inner end -->

                <!-- product details reviews start -->
                {{-- <div class="product-details-reviews mt-34">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="product-review-info">
                                <ul class="nav review-tab">
                                    <li>
                                        <a class="active" data-toggle="tab" href="#tab_one">description</a>
                                    </li>
                                    <li>
                                        <a data-toggle="tab" href="#tab_two">information</a>
                                    </li>
                                    <li>
                                        <a data-toggle="tab" href="#tab_three">reviews</a>
                                    </li>
                                </ul>
                                <div class="tab-content reviews-tab">
                                    <div class="tab-pane fade show active" id="tab_one">
                                        <div class="tab-one">
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam fringilla augue nec est tristique auctor. Ipsum metus feugiat sem, quis fermentum turpis eros eget velit. Donec ac tempus ante. Fusce ultricies massa massa. Fusce aliquam, purus eget sagittis vulputate, sapien libero hendrerit est, sed commodo augue nisi non neque.</p>
                                            <div class="review-description">
                                                <div class="tab-thumb">
                                                    <img src="assets/img/about/services.jpg" alt="">
                                                </div>
                                                <div class="tab-des mt-sm-24">
                                                    <h3>Product Information :</h3>
                                                    <ul>
                                                        <li>Donec non est at libero vulputate rutrum.</li>
                                                        <li>Morbi ornare lectus quis justo gravida semper.</li>
                                                        <li>Pellentesque aliquet, sem eget laoreet ultrices</li>
                                                        <li>Nulla tellus mi, vulputate adipiscing cursus eu, suscipit id nulla</li>
                                                        <li>Donec a neque libero.</li>
                                                        <li>Pellentesque aliquet, sem eget laoreet ultrices</li>
                                                        <li>Morbi ornare lectus quis justo gravida semper.</li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <p>Cras neque metus, consequat et blandit et, luctus a nunc. Etiam gravida vehicula tellus, in imperdiet ligula euismod eget. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Nam erat mi, rutrum at sollicitudin rhoncus, ultricies posuere erat. Duis convallis, arcu nec aliquam consequat, purus felis vehicula felis, a dapibus enim lorem nec augue. Nunc facilisis sagittis ullamcorper.</p>
                                            <p>Proin lectus ipsum, gravida et mattis vulputate, tristique ut lectus. Sed et lorem nunc. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Aenean eleifend laoreet congue. Vivamus adipiscing nisl ut dolor dignissim semper. Nulla luctus malesuada tincidunt.</p>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="tab_two">
                                        <table class="table table-bordered">
                                            <tbody>
                                                <tr>
                                                    <td>color</td>
                                                    <td>black, blue, red</td>
                                                </tr>
                                                <tr>
                                                    <td>size</td>
                                                    <td>L, M, S</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="tab-pane fade" id="tab_three">
                                        <form action="#" class="review-form">
                                            <h5>1 review for Simple product 12</h5>
                                            <div class="total-reviews">
                                                <div class="rev-avatar">
                                                    <img src="assets/img/about/avatar.jpg" alt="">
                                                </div>
                                                <div class="review-box">
                                                    <div class="ratings">
                                                        <span class="good"><i class="fa fa-star"></i></span>
                                                        <span class="good"><i class="fa fa-star"></i></span>
                                                        <span class="good"><i class="fa fa-star"></i></span>
                                                        <span class="good"><i class="fa fa-star"></i></span>
                                                        <span><i class="fa fa-star"></i></span>
                                                    </div>
                                                    <div class="post-author">
                                                        <p><span>admin -</span> 30 Nov, 2018</p>
                                                    </div>
                                                    <p>Aliquam fringilla euismod risus ac bibendum. Sed sit amet sem varius ante feugiat lacinia. Nunc ipsum nulla, vulputate ut venenatis vitae, malesuada ut mi. Quisque iaculis, dui congue placerat pretium, augue erat accumsan lacus</p>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col">
                                                    <label class="col-form-label"><span class="text-danger">*</span> Your Name</label>
                                                    <input type="text" class="form-control" required>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col">
                                                    <label class="col-form-label"><span class="text-danger">*</span> Your Email</label>
                                                    <input type="email" class="form-control" required>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col">
                                                    <label class="col-form-label"><span class="text-danger">*</span> Your Review</label>
                                                    <textarea class="form-control" required></textarea>
                                                    <div class="help-block pt-10"><span class="text-danger">Note:</span> HTML is not translated!</div>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col">
                                                    <label class="col-form-label"><span class="text-danger">*</span> Rating</label>
                                                    &nbsp;&nbsp;&nbsp; Bad&nbsp;
                                                    <input type="radio" value="1" name="rating">
                                                    &nbsp;
                                                    <input type="radio" value="2" name="rating">
                                                    &nbsp;
                                                    <input type="radio" value="3" name="rating">
                                                    &nbsp;
                                                    <input type="radio" value="4" name="rating">
                                                    &nbsp;
                                                    <input type="radio" value="5" name="rating" checked>
                                                    &nbsp;Good
                                                </div>
                                            </div>
                                            <div class="buttons">
                                                <button class="sqr-btn" type="submit">Continue</button>
                                            </div>
                                        </form> <!-- end of review-form -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>  --}}
                <!-- product details reviews end --> 

                <!-- related products area start -->
                <div class="related-products-area mt-34">
                    <div class="section-title mb-30">
                        <div class="title-icon">
                            <i class="fa fa-desktop"></i>
                        </div>
                        <h3>related products</h3>
                    </div> <!-- section title end -->
                    <!-- featured category start -->
                    <div class="featured-carousel-active slick-padding slick-arrow-style">
                        <!-- product single item start -->
                            @foreach ($related as $item)
                        <div class="product-item fix">
                            <div class="product-thumb">
                                <a href="{{url('forsale-detail/'.$item->id)}}">
                                    <img src="{{asset($item->image1??'')}}" class="img-pri" style="height: 200px;" alt="">
                                    <img src="{{asset($item->image2??'')}}" class="img-sec" style="height: 200px;" alt="">
                                </a>
                            </div>
                            <div class="product-content">
                                <h4><a href="{{url('forsale-detail/'.$item->id)}}">{{$item->name??''}}</a></h4>
                                <div class="pricebox">
                                    <span class="regular-price">Rs. {{$item->price??''}}</span>
                                    
                                </div>
                            </div>
                        </div>
                        @endforeach
                        <!-- product single item end -->
                    </div>
                    <!-- featured category end -->
                </div>
                <!-- related products area end -->
            </div>

            <!-- sidebar start -->
            <div class="col-lg-3">
                <div class="shop-sidebar-wrap fix mt-md-22 mt-sm-22">
                    <!-- featured category start -->
                    <div class="sidebar-widget mb-22">
                        <div class="section-title-2 d-flex justify-content-between mb-28">
                            <h3>featured</h3>
                            <div class="category-append"></div>
                        </div> <!-- section title end -->
                        <div class="category-carousel-active row" data-row="4">
                            @foreach ($feature as $item)
                            
                    @if ($item->expiry > Carbon::now())
                            <div class="col">
                                <div class="category-item">
                                    <div class="category-thumb">
                                        <a href="{{url('forsale-detail/'.$item->id)}}">
                                            <img src="{{asset($item->image1??'')}}" style="height: 100px;" alt="">
                                            
                                        </a>
                                    </div>
                                    <div class="category-content">
                                        <h4><a href="{{url('forsale-detail/'.$item->id)}}">{{$item->name??''}}</a></h4>
                                        <div class="price-box">
                                            <div class="regular-price">
                                                Rs. {{$item->price??''}}
                                            </div>
                                        </div>
                                        
                                    </div>
                                </div> <!-- end single item -->
                            </div> <!-- end single item column -->
                            @endif
                            @endforeach
                        </div>
                    </div>
                    <!-- featured category end -->

                    <!-- manufacturer start -->
                    <div class="sidebar-widget mb-22">
                        <div class="sidebar-title mb-10">
                            <h3>Categories</h3>
                        </div>
                        <div class="sidebar-widget-body">
                            <ul>
                                <li><i class="fa fa-angle-right"></i><a
                                        href="{{ url('category/vehicles') }}">Vehicles</a><span>({{ number_format($sale_product->where('category', 'vehicles')->count()) }})</span>
                                </li>
                                <li><i class="fa fa-angle-right"></i><a
                                        href="{{ url('category/crops') }}">Crops</a><span>({{ number_format($sale_product->where('category', 'crops')->count()) }})</span>
                                </li>
                                <li><i class="fa fa-angle-right"></i><a
                                        href="{{ url('category/fertilizers') }}">Fertilizers</a><span>({{ number_format($sale_product->where('category', 'fertilizers')->count()) }})</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!-- manufacturer end -->

                    <!-- product tag start -->
                    <div class="sidebar-widget mb-22">
                        <div class="sidebar-title mb-20">
                            <h3>Sub Categories</h3>
                        </div>
                        <div class="sidebar-widget-body">
                            <ul>
                                <li><i class="fa fa-angle-right"></i><a href="{{url('sub-category/tractor')}}">Tractors</a><span>({{number_format($sale_product->where('sub_category','tractor')->count())}})</span></li>
                                <li><i class="fa fa-angle-right"></i><a href="{{url('sub-category/dumper')}}">Dumpers</a><span>({{number_format($sale_product->where('sub_category','dumper')->count())}})</span></li>
                                <li><i class="fa fa-angle-right"></i><a href="{{url('sub-category/exivator')}}">Exivators</a><span>({{number_format($sale_product->where('sub_category','exivator')->count())}})</span></li>
                                <li><i class="fa fa-angle-right"></i><a href="{{url('sub-category/harvestor')}}">Harvestors</a><span>({{number_format($sale_product->where('sub_category','harvestor')->count())}})</span></li>
                                <li><i class="fa fa-angle-right"></i><a href="{{url('sub-category/fertilizer')}}">Fertilizers</a><span>({{number_format($sale_product->where('sub_category','fertilizer')->count())}})</span></li>
                                <li><i class="fa fa-angle-right"></i><a href="{{url('sub-category/fruit')}}">Fruits</a><span>({{number_format($sale_product->where('sub_category','fruit')->count())}})</span></li>
                                <li><i class="fa fa-angle-right"></i><a href="{{url('sub-category/vegitable')}}">Vegitables</a><span>({{number_format($sale_product->where('sub_category','vegitable')->count())}})</span></li>
                                <li><i class="fa fa-angle-right"></i><a href="{{url('sub-category/grain')}}">Grains</a><span>({{number_format($sale_product->where('sub_category','grain')->count())}})</span></li>
                                <li><i class="fa fa-angle-right"></i><a href="{{url('sub-category/other')}}">Others</a><span>({{number_format($sale_product->where('sub_category','other')->count())}})</span></li>
                            </ul>
                        </div>
                    </div>
                    <!-- product tag end -->

                    <!-- sidebar banner start -->
                    <div class="sidebar-widget mb-22">
                        <div class="img-container fix img-full mt-30">
                            <a href="#"><img src="assets/img/banner/banner_shop.jpg" alt=""></a>
                        </div>
                    </div>
                    <!-- sidebar banner end -->
                </div>
            </div>
            <!-- sidebar end -->
        </div>
    </div>
</div>
<!-- product details wrapper end -->
@endsection
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
                                <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                                <li class="breadcrumb-item"><a href="{{ url('shop') }}">shop</a></li>
                                <li class="breadcrumb-item active" aria-current="page">product details</li>
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
                    <div class="product-details-inner">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="product-large-slider mb-20 slick-arrow-style_2">
                                    @foreach ($product_image as $item)
                                        <div class="pro-large-img img-zoom" id="img1">
                                            <img src="{{ asset($item->image ?? '') }}" alt=""
                                                style="height: 460px;" />
                                        </div>
                                    @endforeach

                                </div>
                                {{-- <div class="pro-nav slick-padding2 slick-arrow-style_2">
                                    @foreach ($product_image as $item)
                                        <div class="pro-nav-thumb"><img src="{{ asset($item->image ?? '') }}" alt=""
                                                style="height: 90px;" /></div>
                                    @endforeach

                                </div> --}}
                            </div>
                            <div class="col-lg-6">
                                <div class="product-details-des mt-md-34 mt-sm-34">
                                    <h3><a
                                            href="{{ url('product-detail/' . $product_detail->id) }}">{{ $product_detail->name ?? '' }}</a>
                                    </h3>
                                    {{-- <div class="ratings">
                                    <span class="good"><i class="fa fa-star"></i></span>
                                    <span class="good"><i class="fa fa-star"></i></span>
                                    <span class="good"><i class="fa fa-star"></i></span>
                                    <span class="good"><i class="fa fa-star"></i></span>
                                    <span><i class="fa fa-star"></i></span>
                                    <div class="pro-review">
                                        <span>1 review(s)</span>
                                    </div>
                                </div>
                                <div class="customer-rev">
                                    <a href="#">(1 customer review)</a>
                                </div> --}}
                                    {{-- <div class="availability mt-10">
                                    <h5>Availability:</h5>
                                    <span>1 in stock</span>
                                </div> --}}
                                    {{-- <div class="pricebox">
                                    <span class="regular-price">Rs. {{$product_detail->price??''}}</span>
                                </div> --}}
                                    {{-- <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua.<br>
                                Phasellus id nisi quis justo tempus mollis sed et dui. In hac habitasse platea dictumst. Suspendisse ultrices mauris diam. Nullam sed aliquet elit. Mauris consequat nisi ut mauris efficitur lacinia.</p>
                                <div class="quantity-cart-box d-flex align-items-center">
                                    <div class="quantity">
                                        <div class="pro-qty"><input type="text" value="1"></div>
                                    </div>
                                    <div class="action_link">
                                        <a class="buy-btn" href="#">add to cart<i class="fa fa-shopping-cart"></i></a>
                                    </div>
                                </div>
                                <div class="useful-links mt-20">
                                    <a href="#" data-toggle="tooltip" data-placement="top" title="Compare"><i class="fa fa-refresh"></i>compare</a>
                                    <a href="#" data-toggle="tooltip" data-placement="top" title="Wishlist"><i class="fa fa-heart-o"></i>wishlist</a>
                                </div> --}}
                                    <div class="row">
                                        <div class="col-md-12">
                                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                                <li class="nav-item">
                                                    <a class="nav-link active" id="home-tab" data-toggle="tab"
                                                        href="#home" role="tab" aria-controls="home"
                                                        aria-selected="true">Featured</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile"
                                                        role="tab" aria-controls="profile"
                                                        aria-selected="false">Verified</a>
                                                </li>
                                            </ul>
                                            <div class="tab-content" id="myTabContent">
                                                <div class="tab-pane fade show active comment-section" id="home"
                                                    role="tabpanel" aria-labelledby="home-tab"
                                                    style="overflow-y: auto; max-height:500px; margin-top:20px; padding:10px;box-shadow: 0px 0px 5px 0px #4444;">
                                                    <ul>
                                                        @if ($user_product->where('product_id',$product_detail->id)->count() > 0)
                                                            @foreach ($user_product->where('product_id',$product_detail->id) as $item)
                                                                <li style="padding:4px; margin-bottom:10px;">
                                                                    <div class="author-avatar">
                                                                        <img src="{{ asset($item->image ?? 'assets/img/user.jpg') }}"
                                                                            style="border-radius:50%; height: 90px; max-width: 90px;"
                                                                            alt="">
                                                                    </div>
                                                                    <div class="comment-body"
                                                                        style="margin-left:5px; padding:4px;">
                                                                        <span class="reply-btn" style="margin-top: 42px;">
                                                                            @auth
                                                                                @if ($arti_fallow->where('user_id', Auth()->user()->id)->where('arti_id', $item->user_id)->count() > 0)
                                                                                    <a
                                                                                        style="background:#d8373e; color:#fff !important;">Followed</a>
                                                                                @else
                                                                                    <a style="cursor: pointer;"
                                                                                        id="artifallow{{ $item->user_id??'' }}">Follow</a>
                                                                                @endif
                                                                            @else
                                                                                <a style="cursor: pointer;"
                                                                                    id="artifallow{{ $item->user_id??'' }}">Follow</a>
                                                                            @endauth
                                                                            <br><i class="fa fa-feed"></i> {{ $arti_fallow->where('arti_id', $item->user_id)->count() ?? '0' }}
                                                                        </span>


                                                                        <b class="comment-author"><a
                                                                                href="{{ url('arti-detail/' . $item->id) }}">{{ $item->first_name }}
                                                                                {{ $item->last_name }}</a></b><br>
                                                                        <img src="{{ asset($item->image1 ?? '') }}"
                                                                            style="height: 50px;
                                                                            width: 50px;
                                                                            margin-left: 3px;"
                                                                            alt=""><b
                                                                            style="margin-left:10px;">Rs.
                                                                            {{ $item->price_low ?? '0' }}-{{ $item->price_high ?? '0' }}</b><br>
                                                                        <span
                                                                            class="comment-author">{{ $item->address ?? 'abc city state pakistan' }}</span>
                                                                        <div class="comment-post-date">

                                                                        </div>
                                                                    </div>
                                                                </li>
                                                            @endforeach
                                                        @else
                                                            <li>No Commession Agent Found</li>
                                                        @endif

                                                    </ul>
                                                </div>
                                                <div class="tab-pane fade comment-section" id="profile" role="tabpanel"
                                                    aria-labelledby="profile-tab"
                                                    style="overflow-y: auto; max-height:500px; padding:10px; box-shadow: 0px 0px 5px 0px #4444;">
                                                    <ul>
                                                        @if ($verify->where('product_id',$product_detail->id)->count() > 0)
                                                            @foreach ($verify->where('product_id',$product_detail->id) as $item)
                                                                <li style="padding:4px; margin-bottom:10px;">
                                                                    <div class="author-avatar">
                                                                        <img src="{{ asset($item->image ?? 'assets/img/user.jpg') }}"
                                                                            style="border-radius:50%; height: 90px; max-width: 90px;"
                                                                            alt="">
                                                                    </div>
                                                                    <div class="comment-body"
                                                                        style="margin-left:5px; padding:4px;">
                                                                        <span class="reply-btn" style="margin-top: 42px;">
                                                                            @auth
                                                                                @if ($arti_fallow->where('user_id', Auth()->user()->id)->where('arti_id', $item->user_id)->count() > 0)
                                                                                    <a
                                                                                        style="background:#d8373e; color:#fff !important;">Followed</a>
                                                                                @else
                                                                                    <a style="cursor: pointer;"
                                                                                        id="artifallow{{ $item->user_id??'' }}">Follow</a>
                                                                                @endif
                                                                            @else
                                                                                <a style="cursor: pointer;"
                                                                                    id="artifallow{{ $item->user_id??'' }}">Follow</a>
                                                                            @endauth
                                                                            <br><i class="fa fa-feed"></i> {{ $arti_fallow->where('arti_id', $item->user_id)->count() ?? '0' }} <i class="badge badge-success">Verify</i>
                                                                        </span>


                                                                        <b class="comment-author"><a
                                                                                href="{{ url('arti-detail/' . $item->id) }}">{{ $item->first_name }}
                                                                                {{ $item->last_name }}</a> <i class="fa fa-check-circle" style="color: blue;" aria-hidden="true"></i></b><br>
                                                                        <img src="{{ asset($item->image1 ?? '') }}"
                                                                            style="height: 50px;
                                                                            width: 50px;
                                                                            margin-left: 3px;"
                                                                            alt=""><b
                                                                            style="margin-left:10px;">Rs.
                                                                            {{ $item->price_low ?? '0' }}-{{ $item->price_high ?? '0' }}</b><br>
                                                                        <span
                                                                            class="comment-author">{{ $item->address ?? 'abc city state pakistan' }}</span>
                                                                        <div class="comment-post-date">

                                                                        </div>
                                                                    </div>
                                                                </li>
                                                            @endforeach
                                                        @else
                                                            <li>No Commession Agent Found</li>
                                                        @endif

                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    {{-- <div class="share-icon mt-20">
                                        <a class="facebook" href="#"><i class="fa fa-facebook"></i>like</a>
                                        <a class="twitter" href="#"><i class="fa fa-twitter"></i>tweet</a>
                                        <a class="pinterest" href="#"><i class="fa fa-pinterest"></i>save</a>
                                        <a class="google" href="#"><i class="fa fa-google-plus"></i>share</a>
                                    </div> --}}
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
                                            <a data-toggle="tab" href="#tab_three">reviews</a>
                                        </li>
                                    </ul>
                                    <div class="tab-content reviews-tab">
                                        <div class="tab-pane fade show active" id="tab_one">
                                            <div class="tab-one">
                                                <p>
                                                    {{ $product_detail->description ?? '' }}
                                                </p>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="tab_three">
                                            <h5>{{ $comment->count() ?? '0' }} review</h5>
                                            @foreach ($comment as $item)
                                                <div class="total-reviews">
                                                    <div class="rev-avatar">
                                                        <img src="{{ asset($item->user_name->image ?? 'assets/img/about/avatar.jpg') }}"
                                                            alt="">
                                                    </div>
                                                    <div class="review-box">
                                                        
                                                        <div class="post-author">
                                                            <p><span>{{ $item->user_name->name ?? 'User' }}</span>
                                                                {{ $item->created_at->diffForHumans() }}</p>
                                                        </div>
                                                        <p>{{ $item->comment ?? '' }}</p>
                                                    </div>
                                                </div>
                                            @endforeach
                                            
                                            <form action="{{ route('Product.Comment') }}" method="POST"
                                                class="review-form">
                                                @csrf
                                                <div class="form-group row">
                                                    <div class="col">
                                                        <label class="col-form-label"><span class="text-danger">*</span>
                                                            Your Review</label>
                                                        <input type="hidden" name="product_id"
                                                            value="{{ $product_detail->id ?? '' }}">
                                                        <textarea class="form-control" name="comment" required></textarea>
                                                        <div class="help-block pt-10"><span
                                                                class="text-danger">Note:</span> HTML is not translated!
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                                <div class="buttons">
                                                    <button class="sqr-btn" type="submit">Continue</button>
                                                </div>
                                            </form> 
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> --}}
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
                                @foreach ($feature_product->take(6) as $item)
                                    <div class="col">
                                        <div class="category-item">
                                            <div class="category-thumb">
                                                <a href="{{ url('product-detail/' . $item->id) }}">
                                                    @foreach ($related_product_image->where('product_id', $item->id)->take(1) as $item1)
                                                        <img src="{{ asset($item1->image ?? '') }}" alt="">
                                                    @endforeach
                                                </a>
                                            </div>
                                            <div class="category-content">
                                                <h4><a
                                                        href="{{ url('product-detail/' . $item->id) }}">{{ $item->name ?? '' }}({{ $item->type ?? '' }})</a>
                                                </h4>
                                                <div class="price-box">
                                                    <div class="regular-price">
                                                        Rs. {{ $item->price_low }}-{{ $item->price_high }}
                                                    </div>

                                                </div>
                                            </div>
                                        </div> <!-- end single item -->
                                    </div> <!-- end single item column -->
                                @endforeach
                            </div>
                        </div>
                        <!-- featured category end -->

                        <!-- product tag start -->
                        {{-- <div class="sidebar-widget mb-22">
                            <div class="sidebar-title mb-20">
                                <h3>tag</h3>
                            </div>
                            <div class="sidebar-widget-body">
                                <div class="product-tag">
                                    <a href="#">camera</a>
                                    <a href="#">computer</a>
                                    <a href="#">tablet</a>
                                    <a href="#">watch</a>
                                    <a href="#">smart phones</a>
                                    <a href="#">handbag</a>
                                    <a href="#">shoe</a>
                                    <a href="#">men</a>
                                </div>
                            </div>
                        </div> --}}
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
                <div class="col-md-12">
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
                            @foreach ($related_product as $item)
                                <div class="product-item fix">
                                    <div class="product-thumb">
                                        <a href="{{ url('product-detail/' . $item->id) }}">
                                            @foreach ($related_product_image->where('product_id', $item->id)->take(2) as $loop => $item2)
                                                @if ($loop->first)
                                                    <img src="{{ asset($item2->image ?? '') }}" class="img-pri"
                                                        style="height: 200px;" alt="">
                                                @else
                                                    <img src="{{ asset($item2->image ?? '') }}" class="img-sec"
                                                        style="height: 200px;" alt="">
                                                @endif
                                            @endforeach
                                        </a>
                                    </div>
                                    <div class="product-content">
                                        <h4><a
                                                href="{{ url('product-detail/' . $item->id) }}">{{ $item->name ?? '' }}({{ $item->type ?? '' }})</a>
                                        </h4>
                                        <div class="pricebox">
                                            <span class="regular-price">Rs.
                                                {{ $user_product->where('product_id', $item->id)->min('price_low') ?? $item->price_low }}-{{ $user_product->where('product_id', $item->id)->max('price_high') ?? $item->price_high }}</span>

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
            </div>
        </div>
    </div>
    <!-- product details wrapper end -->
@endsection
@section('script')
    <script>
        $(document).ready(function() {
            <?php
        foreach ($user_product->where('product_id', $product_detail->id) as $item) {
        ?>
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $('#artifallow<?php echo $item->user_id; ?>').click(function() {
                <?php if (auth()->user() != null) { ?>
                $.ajax({
                    type: 'POST',
                    url: "{{ route('ArtiFallow') }}",
                    data: {
                        _token: $('meta[name="csrf-token"]').attr('content'),
                        arti_id: <?php echo $item->user_id; ?>,
                        user_id: <?php echo auth()->user()->id; ?>
                    },

                    success: function(data) {
                        location.reload();
                    }
                });
                <?php } else { ?>
                alert('Please Login First!');
                <?php } ?>

            });
            <?php }?>
        });
    </script>
@endsection

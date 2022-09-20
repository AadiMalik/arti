@php
use Carbon\Carbon;
@endphp
@extends('layouts.app')
@section('content')
@section('style')
    <style>
        .main-header-inner .category-toggle-wrap nav.category-menu.hm-1 {
            display: none;
        }

        * {
            box-sizing: border-box
        }

        /* Slideshow container */
        .slideshow-container {
            max-width: 100%;
            height: 500px;
            position: relative;
            margin: auto;
        }

        /* Hide the images by default */
        .mySlides {
            display: none;
        }

        /* Next & previous buttons */
        .prev,
        .next {
            cursor: pointer;
            position: absolute;
            top: 50%;
            width: auto;
            margin-top: -22px;
            padding: 16px;
            color: white;
            font-weight: bold;
            font-size: 18px;
            transition: 0.6s ease;
            border-radius: 0 3px 3px 0;
            user-select: none;
        }

        /* Position the "next button" to the right */
        .next {
            right: 0;
            border-radius: 3px 0 0 3px;
        }

        /* On hover, add a black background color with a little bit see-through */
        .prev:hover,
        .next:hover {
            background-color: rgba(0, 0, 0, 0.8);
        }

        /* Caption text */
        .text {
            color: #f2f2f2;
            font-size: 15px;
            padding: 8px 12px;
            position: absolute;
            bottom: 8px;
            width: 100%;
            text-align: center;
        }

        /* Number text (1/3 etc) */
        .numbertext {
            color: #f2f2f2;
            font-size: 12px;
            padding: 8px 12px;
            position: absolute;
            top: 0;
        }

        /* The dots/bullets/indicators */
        .dot {
            cursor: pointer;
            height: 15px;
            width: 15px;
            margin: 0 2px;
            background-color: #bbb;
            border-radius: 50%;
            display: inline-block;
            transition: background-color 0.6s ease;
        }



        /* Fading animation */
        .fade {
            animation-name: fade;
            animation-duration: 1.5s;
        }

        @keyframes fade {
            from {
                opacity: .4
            }

            to {
                opacity: 1
            }
        }

        /* The ribbons */

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
    </style>
@endsection
<!-- hero slider start -->
<!-- Slideshow container -->
<div class="slideshow-container">

    <!-- Full-width images with number and caption text -->
    @foreach ($slider as $item)
        <div class="mySlides fade">
            <div class="numbertext"></div>
            <img src="{{ $item->image ?? '' }}" style="width:100%; height:500px;">
            <div class="text"></div>
        </div>
    @endforeach
    {{-- <div class="mySlides fade">
      <div class="numbertext">2 / 3</div>
      <img src="img2.jpg" style="width:100%">
      <div class="text">Caption Two</div>
    </div>
  
    <div class="mySlides fade">
      <div class="numbertext">3 / 3</div>
      <img src="img3.jpg" style="width:100%">
      <div class="text">Caption Three</div>
    </div> --}}

    <!-- Next and previous buttons -->
    <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
    <a class="next" onclick="plusSlides(1)">&#10095;</a>
</div>
<br>


<!-- page wrapper start -->
<div class="page-wrapper pt-6 pb-28 pb-md-6 pb-sm-6 pt-xs-36">
    <div class="container">
        <div class="row">
            <!-- start home sidebar -->
            <div class="col-lg-3">
                <div class="col-md-12">
                    <img src="{{ asset('3.jpg') }}" style="height: 300px; margin-bottom:20px;" alt="">
                </div>
                <div class="home-sidebar">
                    <!-- hot deals area start -->
                    <div class="main-sidebar hot-deals-wrap mb-30">
                        <div class="section-title-2 d-flex justify-content-between mb-28">
                            <h3>Hot deals</h3>
                            <div class="slick-append"></div>
                        </div> <!-- section title end -->
                        <div class="deals-carousel-active slick-padding slick-arrow-style">
                            <!-- product single item start -->
                            @foreach ($product as $item)
                                <div class="product-item fix">
                                    <div class="product-thumb">
                                        <a href="{{ url('product-detail/' . $item->id) }}">
                                            @foreach ($product_image->where('product_id', $item->id)->take(2) as $loop => $item2)
                                                @if ($loop->first)
                                                    <img src="{{ asset($item2->image ?? '') }}" class="img-pri"
                                                        style="height: 240px;" alt="">
                                                @else
                                                    <img src="{{ asset($item2->image ?? '') }}" class="img-sec"
                                                        style="height: 240px;" alt="">
                                                @endif
                                            @endforeach
                                        </a>

                                    </div>
                                    <div class="product-content">
                                        <h4><a
                                                href="{{ url('product-detail/' . $item->id) }}">{{ $item->name ?? '' }}</a>
                                        </h4>
                                        <div class="pricebox">
                                            <span class="regular-price">Rs.
                                                {{ $item->price_low ?? '' }}-{{ $item->price_high ?? '' }}</span>

                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <!-- hot deals area end -->

                    <!-- best seller area start -->
                    <div class="main-sidebar category-wrapper mb-24">
                        <div class="section-title-2 d-flex justify-content-between mb-28">
                            <h3>Best seller</h3>
                            <div class="category-append"></div>
                        </div> <!-- section title end -->
                        <div class="category-carousel-active row" data-row="4">
                            @foreach ($product->take(3) as $item)
                                <div class="col">
                                    <div class="category-item">
                                        <div class="category-thumb">
                                            <a href="{{ url('product-detail/' . $item->id) }}">
                                                @foreach ($product_image->where('product_id', $item->id)->take(1) as $item1)
                                                    <img src="{{ asset($item1->image) }}" style="height:75px;"
                                                        alt="">
                                                @endforeach
                                            </a>
                                        </div>
                                        <div class="category-content">
                                            <h4><a
                                                    href="{{ url('product-detail/' . $item->id) }}">{{ $item->name ?? '' }}</a>
                                            </h4>
                                            <div class="price-box">
                                                <div class="regular-price">
                                                    Rs. {{ $item->price_low ?? '' }}-{{ $item->price_high ?? '' }}
                                                </div>
                                            </div>

                                        </div>
                                    </div> <!-- end single item -->
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <!-- best seller area end -->

                    <!-- blog area start -->
                    <div class="main-sidebar blog-area mb-24">
                        <div class="section-title-2 d-flex justify-content-between mb-28">
                            <h3>latest blog</h3>
                            <div class="category-append"></div>
                        </div> <!-- section title end -->
                        <!-- blog wrapper start -->
                        <div class="blog-carousel-active">
                            @foreach ($blog->take(2) as $item)
                                <div class="blog-item">
                                    <div class="blog-thumb img-full fix">
                                        <a href="{{ url('blog-detail/' . $item->id) }}">
                                            <img src="{{ asset($item->image ?? '') }}" alt="">
                                        </a>
                                    </div>
                                    <div class="blog-content">
                                        <h3><a
                                                href="{{ url('blog-detail/' . $item->id) }}">{{ $item->name ?? '' }}</a>
                                        </h3>
                                        <div class="blog-meta">
                                            <span class="posted-author">by: admin</span>
                                            <span class="post-date">{{ $item->created_at->diffForHumans() }}</span>
                                        </div>
                                        <p>{!! Str::limit($item->description ?? '', 100) !!}</p>
                                    </div>
                                    <a href="{{ url('blog-detail/' . $item->id) }}">read more <i
                                            class="fa fa-long-arrow-right"></i></a>
                                </div> <!-- end single blog item -->
                            @endforeach
                        </div>
                        <!-- blog wrapper end -->
                    </div>
                    <!-- blog area end -->

                    <!-- testimonial area start -->
                    <div class="main-sidebar testimonial-area pb-sm-70">
                        <div class="section-title-2 mb-28">
                            <h3>Clients Say</h3>
                        </div> <!-- section title end -->
                        <div class="testimonial-carousel-active slick-dot-style">
                            @foreach ($review as $item)
                                <div class="testimonial-item text-center">
                                    <div class="testimonial-thumb">
                                        <img src="{{ asset($item->image ?? '') }}" style="height: 85px;"
                                            alt="">
                                    </div>
                                    <div class="testimonial-content">
                                        <h3><a href="#">{{ $item->name ?? '' }}</a></h3>
                                        <p>{!! $item->description ?? '' !!}</p>
                                    </div>
                                </div> <!-- end single testimonial item -->
                            @endforeach
                        </div>
                    </div>
                    <!-- testimonial area end -->

                </div>
            </div>

        </div>
    </div>
    <!-- end home sidebar -->

    <div class="col-lg-9">
        <!-- Hot Products area start -->
        <div class="feature-category-area mt-md-70">
            <div class="section-title mb-30">
                <div class="title-icon">
                    <i class="fa fa-bookmark"></i>
                </div>
                <h3>Hot Products</h3>

            </div> <!-- section title end -->
            <!-- featured category start -->
            <div class="featured-carousel-active slick-padding slick-arrow-style">
                <!-- product single item start -->
                @foreach ($product as $item1)
                    <div class="product-item fix">
                        <div class="product-thumb">
                            <a href="{{ url('product-detail/' . $item1->id) }}">
                                @foreach ($product_image->where('product_id', $item1->id)->take(2) as $loop => $item2)
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
                            <h4><a href="{{ url('product-detail/' . $item1->id) }}">{{ $item1->name ?? '' }}
                                    ({{ $item1->type ?? '' }})
                                </a></h4>
                            <div class="pricebox">
                                <span class="regular-price">Rs.
                                    {{ $user_product->where('product_id', $item1->id)->min('price_low') ?? $item1->price_low }}-{{ $user_product->where('product_id', $item1->id)->max('price_high') ?? $item1->price_high }}</span>

                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <!-- featured category end -->
        </div>
        <!-- Hot Products area end -->
        <!-- Verified Arti area start -->
        <div class="feature-category-area mt-md-70 mt-3">
            <div class="section-title mb-30">
                <div class="title-icon">
                    <i class="fa fa-users"></i>
                </div>
                <h3>Verified Commession Agents</h3>

            </div> <!-- section title end -->
            <!-- featured category start -->
            <div class="featured-carousel-active slick-padding slick-arrow-style">
                <!-- product single item start -->
                @foreach ($arti->where('verify', 0) as $item1)
                    @foreach ($item1->roles as $item2)
                        @if ($item2->title == 'Arti')
                            <div class="product-item fix">
                                <div class="product-thumb">
                                    <i class="ribbon">Verified</i>
                                    <a href="{{ url('arti-detail/' . $item1->id) }}">
                                        <img src="{{ asset($item1->image ?? 'assets/img/user.jpg') }}"
                                            class="img-pri" style="height: 200px; border-radius:50%;" alt="">

                                    </a>

                                </div>
                                <div class="product-content">
                                    <h4><a href="{{ url('arti-detail/' . $item1->id) }}">{{ $item1->first_name ?? '' }}
                                            {{ $item1->last_name ?? '' }}
                                        </a><i class="fa fa-check-circle" style="color: blue;"
                                            aria-hidden="true"></i></h4>

                                    <div class="pricebox">
                                        <span class="reply-btn">
                                            @auth
                                                @if ($arti_fallow->where('user_id', Auth()->user()->id)->where('arti_id', $item1->id)->count() > 0)
                                                    <a class="btn btn-danger"
                                                        style="background:#d8373e; color:#fff !important;">Followed</a>
                                                @else
                                                    <a class="btn btn-primary" style="cursor: pointer;"
                                                        id="artifallow{{ $item1->id }}">Follow</a>
                                                @endif
                                            @else
                                                <a class="btn btn-primary" style="cursor: pointer;"
                                                    id="artifallow{{ $item1->id }}">Follow</a>
                                            @endauth
                                            <i class="fa fa-feed"></i>
                                            {{ $arti_fallow->where('arti_id', $item1->id)->count() ?? '0' }}
                                        </span>
                                        <div class="ratings">
                                            @if ($rating->where('arti_id', $item1->id)->count() == 0.0)
                                                <span class="good"><i class="fa fa-star-o"></i></span>
                                                <span class="good"><i class="fa fa-star-o"></i></span>
                                                <span class="good"><i class="fa fa-star-o"></i></span>
                                                <span class="good"><i class="fa fa-star-o"></i></span>
                                                <span class="good"><i class="fa fa-star-o"></i></span>
                                            @endif
                                            @if (ceil($rating->where('arti_id', $item1->id)->avg('rate')) >= 1.0 &&
                                                ceil($rating->where('arti_id', $item1->id)->avg('rate')) < 2.0)
                                                <span class="good"><i class="fa fa-star"></i></span>
                                                <span class="good"><i class="fa fa-star-o"></i></span>
                                                <span class="good"><i class="fa fa-star-o"></i></span>
                                                <span class="good"><i class="fa fa-star-o"></i></span>
                                                <span class="good"><i class="fa fa-star-o"></i></span>
                                            @elseif(ceil($rating->where('arti_id', $item1->id)->avg('rate')) >= 2.0 &&
                                                ceil($rating->where('arti_id', $item1->id)->avg('rate')) < 3.0)
                                                <span class="good"><i class="fa fa-star"></i></span>
                                                <span class="good"><i class="fa fa-star"></i></span>
                                                <span class="good"><i class="fa fa-star-o"></i></span>
                                                <span class="good"><i class="fa fa-star-o"></i></span>
                                                <span class="good"><i class="fa fa-star-o"></i></span>
                                            @elseif(ceil($rating->where('arti_id', $item1->id)->avg('rate')) >= 3.0 &&
                                                ceil($rating->where('arti_id', $item1->id)->avg('rate')) < 4.0)
                                                <span class="good"><i class="fa fa-star"></i></span>
                                                <span class="good"><i class="fa fa-star"></i></span>
                                                <span class="good"><i class="fa fa-star"></i></span>
                                                <span class="good"><i class="fa fa-star-o"></i></span>
                                                <span class="good"><i class="fa fa-star-o"></i></span>
                                            @elseif(ceil($rating->where('arti_id', $item1->id)->avg('rate')) >= 4.0 &&
                                                ceil($rating->where('arti_id', $item1->id)->avg('rate')) < 5.0)
                                                <span class="good"><i class="fa fa-star"></i></span>
                                                <span class="good"><i class="fa fa-star"></i></span>
                                                <span class="good"><i class="fa fa-star"></i></span>
                                                <span class="good"><i class="fa fa-star"></i></span>
                                                <span class="good"><i class="fa fa-star-o"></i></span>
                                            @elseif(ceil($rating->where('arti_id', $item1->id)->avg('rate')) == 5.0)
                                                <span class="good"><i class="fa fa-star"></i></span>
                                                <span class="good"><i class="fa fa-star"></i></span>
                                                <span class="good"><i class="fa fa-star"></i></span>
                                                <span class="good"><i class="fa fa-star"></i></span>
                                                <span><i class="fa fa-star"></i></span>
                                            @endif
                                            <div class="pro-review">
                                                <span>{{ $rating->where('arti_id', $item1->id)->count() }}
                                                    Review(s)</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endforeach
                @endforeach
            </div>
            <!-- featured category end -->
        </div>
        <!-- Verified Arti area end -->
        <!-- Arti area start -->
        <div class="feature-category-area mt-md-70 mt-3">
            <div class="section-title mb-30">
                <div class="title-icon">
                    <i class="fa fa-users"></i>
                </div>
                <h3>Commession Agents</h3>

            </div> <!-- section title end -->
            <!-- featured category start -->
            <div class="featured-carousel-active slick-padding slick-arrow-style">
                <!-- product single item start -->
                @foreach ($arti->where('verify', 1) as $item1)
                    @foreach ($item1->roles as $item2)
                        @if ($item2->title == 'Arti')
                            <div class="product-item fix">
                                <div class="product-thumb">
                                    <a href="{{ url('arti-detail/' . $item1->id) }}">
                                        <img src="{{ asset($item1->image ?? 'assets/img/user.jpg') }}"
                                            class="img-pri" style="height: 200px; border-radius:50%;" alt="">

                                    </a>

                                </div>
                                <div class="product-content">
                                    <h4><a href="{{ url('arti-detail/' . $item1->id) }}">{{ $item1->first_name ?? '' }}
                                            {{ $item1->last_name ?? '' }}
                                        </a></h4>

                                    <div class="pricebox">
                                        <span class="reply-btn">
                                            @auth
                                                @if ($arti_fallow->where('user_id', Auth()->user()->id)->where('arti_id', $item1->id)->count() > 0)
                                                    <a class="btn btn-danger"
                                                        style="background:#d8373e; color:#fff !important;">Followed</a>
                                                @else
                                                    <a class="btn btn-primary" style="cursor: pointer;"
                                                        id="artifallow{{ $item1->id }}">Follow</a>
                                                @endif
                                            @else
                                                <a class="btn btn-primary" style="cursor: pointer;"
                                                    id="artifallow{{ $item1->id }}">Follow</a>
                                            @endauth
                                            <i class="fa fa-feed"></i>
                                            {{ $arti_fallow->where('arti_id', $item1->id)->count() ?? '0' }}
                                        </span>
                                        <div class="ratings">
                                            @if ($rating->where('arti_id', $item1->id)->count() == 0.0)
                                                <span class="good"><i class="fa fa-star-o"></i></span>
                                                <span class="good"><i class="fa fa-star-o"></i></span>
                                                <span class="good"><i class="fa fa-star-o"></i></span>
                                                <span class="good"><i class="fa fa-star-o"></i></span>
                                                <span class="good"><i class="fa fa-star-o"></i></span>
                                            @endif
                                            @if (ceil($rating->where('arti_id', $item1->id)->avg('rate')) >= 1.0 &&
                                                ceil($rating->where('arti_id', $item1->id)->avg('rate')) < 2.0)
                                                <span class="good"><i class="fa fa-star"></i></span>
                                                <span class="good"><i class="fa fa-star-o"></i></span>
                                                <span class="good"><i class="fa fa-star-o"></i></span>
                                                <span class="good"><i class="fa fa-star-o"></i></span>
                                                <span class="good"><i class="fa fa-star-o"></i></span>
                                            @elseif(ceil($rating->where('arti_id', $item1->id)->avg('rate')) >= 2.0 &&
                                                ceil($rating->where('arti_id', $item1->id)->avg('rate')) < 3.0)
                                                <span class="good"><i class="fa fa-star"></i></span>
                                                <span class="good"><i class="fa fa-star"></i></span>
                                                <span class="good"><i class="fa fa-star-o"></i></span>
                                                <span class="good"><i class="fa fa-star-o"></i></span>
                                                <span class="good"><i class="fa fa-star-o"></i></span>
                                            @elseif(ceil($rating->where('arti_id', $item1->id)->avg('rate')) >= 3.0 &&
                                                ceil($rating->where('arti_id', $item1->id)->avg('rate')) < 4.0)
                                                <span class="good"><i class="fa fa-star"></i></span>
                                                <span class="good"><i class="fa fa-star"></i></span>
                                                <span class="good"><i class="fa fa-star"></i></span>
                                                <span class="good"><i class="fa fa-star-o"></i></span>
                                                <span class="good"><i class="fa fa-star-o"></i></span>
                                            @elseif(ceil($rating->where('arti_id', $item1->id)->avg('rate')) >= 4.0 &&
                                                ceil($rating->where('arti_id', $item1->id)->avg('rate')) < 5.0)
                                                <span class="good"><i class="fa fa-star"></i></span>
                                                <span class="good"><i class="fa fa-star"></i></span>
                                                <span class="good"><i class="fa fa-star"></i></span>
                                                <span class="good"><i class="fa fa-star"></i></span>
                                                <span class="good"><i class="fa fa-star-o"></i></span>
                                            @elseif(ceil($rating->where('arti_id', $item1->id)->avg('rate')) == 5.0)
                                                <span class="good"><i class="fa fa-star"></i></span>
                                                <span class="good"><i class="fa fa-star"></i></span>
                                                <span class="good"><i class="fa fa-star"></i></span>
                                                <span class="good"><i class="fa fa-star"></i></span>
                                                <span><i class="fa fa-star"></i></span>
                                            @endif
                                            <div class="pro-review">
                                                <span>{{ $rating->where('arti_id', $item1->id)->count() }}
                                                    Review(s)</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endforeach
                @endforeach
            </div>
            <!-- featured category end -->
        </div>
        <!-- Arti area end -->
        <!-- For Sale area start -->
        <div class="feature-category-area mt-md-70">
            <div class="section-title mb-30">
                <div class="title-icon">
                    <i class="fa fa-bookmark"></i>
                </div>
                <h3>For Sale Products</h3>

            </div> <!-- section title end -->
            <!-- featured category start -->
            <div class="featured-carousel-active slick-padding slick-arrow-style">
                <!-- product single item start -->
                @foreach ($sale_product as $item1)
                    @if ($item1->expiry > Carbon::now())
                        <div class="product-item fix">
                            <div class="product-thumb">
                                <i class="ribbon">Featured</i>
                                <a href="{{ url('forsale-detail/' . $item1->id) }}">
                                    <img src="{{ asset($item1->image1 ?? '') }}" class="img-pri"
                                        style="height: 200px;" alt="">
                                    {{-- <img src="{{ asset($item1->image2 ?? '') }}" class="img-sec"
                                        style="height: 200px;" alt=""> --}}

                                </a>

                            </div>
                            <div class="product-content">
                                <h4><a href="{{ url('forsale-detail/' . $item1->id) }}">{{ $item1->name ?? '' }}
                                    </a></h4>
                                <div class="pricebox">
                                    <span class="regular-price">Rs.
                                        {{ $item1->price ?? '' }}</span>

                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach
                @foreach ($sale_product as $item1)
                    @if ($item1->expiry < Carbon::now() || ($item->expiry = null))
                        <div class="product-item fix">
                            <div class="product-thumb">
                                <a href="{{ url('forsale-detail/' . $item1->id) }}">
                                    <img src="{{ asset($item1->image1 ?? '') }}" class="img-pri"
                                        style="height: 200px;" alt="">
                                    <img src="{{ asset($item1->image2 ?? '') }}" class="img-sec"
                                        style="height: 200px;" alt="">

                                </a>

                            </div>
                            <div class="product-content">
                                <h4><a href="{{ url('forsale-detail/' . $item1->id) }}">{{ $item1->name ?? '' }}
                                    </a></h4>
                                <div class="pricebox">
                                    <span class="regular-price">Rs.
                                        {{ $item1->price ?? '' }}</span>

                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
            <!-- featured category end -->
        </div>
        <!-- For Sale area end -->
        <!-- Video area start -->
        <div class="feature-category-area mt-md-70 mt-3">
            <div class="section-title mb-30">
                <div class="title-icon">
                    <i class="fa fa-video-camera"></i>
                </div>
                <h3>Videos</h3>

            </div> <!-- section title end -->
            <!-- featured category start -->
            <div class="featured-carousel-active slick-padding slick-arrow-style">
                <!-- product single item start -->
                @foreach ($admin_videos as $item)
                    <div class="col-md-6">
                        <iframe style="width:100%; height:250px;" src="{{ $item->link ?? '' }}"
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                            allowfullscreen></iframe>
                        <br><span class="caption" title="{{ $item->name ?? '' }}">{!! Str::limit($item->name ?? '', 20) !!}</span>
                    </div>
                @endforeach
            </div>
            <!-- featured category end -->
        </div>
        <!-- For Sale area end -->

        <!-- banner statistic start -->
        <div class="banner-statistic pt-28 pb-36">
            <div class="img-container fix img-full">
                <a href="#">
                    <img src="{{ asset('1.jpg') }}" style="height: 300px;" alt="">
                </a>
            </div>
        </div>
        <!-- banner statistic end -->
    </div>
</div>
</div>
</div>
<!-- page wrapper end -->
@endsection
@section('script')
<script>
    $(document).ready(function() {
        <?php
    foreach ($arti as $item) {
    ?>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $('#artifallow<?php echo $item->id; ?>').click(function() {
            <?php if (auth()->user() != null) { ?>
            $.ajax({
                type: 'POST',
                url: "{{ route('ArtiFallow') }}",
                data: {
                    _token: $('meta[name="csrf-token"]').attr('content'),
                    arti_id: <?php echo $item->id; ?>,
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
<script>
    let slideIndex = 0;
    showSlides();

    function showSlides() {
        let i;
        let slides = document.getElementsByClassName("mySlides");
        for (i = 0; i < slides.length; i++) {
            slides[i].style.display = "none";
        }
        slideIndex++;
        if (slideIndex > slides.length) {
            slideIndex = 1
        }
        slides[slideIndex - 1].style.display = "block";
        setTimeout(showSlides, 2000); // Change image every 2 seconds
    }
</script>
@endsection

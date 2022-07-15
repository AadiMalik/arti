@extends('layouts.app')
@section('content')
@section('style')
    <style>
        .main-header-inner .category-toggle-wrap nav.category-menu.hm-1 {
            display: none;
        }
        * {box-sizing:border-box}

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
.prev, .next {
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
.prev:hover, .next:hover {
  background-color: rgba(0,0,0,0.8);
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
  from {opacity: .4}
  to {opacity: 1}
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
      <img src="{{$item->image??''}}" style="width:100%; height:500px;">
      <div class="text"></div>
    </div>
    @endforeach
{{--   
    <div class="mySlides fade">
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
  
  <!-- The dots/circles -->
  {{-- <div style="text-align:center">
    <span class="dot" onclick="currentSlide(1)"></span>
    <span class="dot" onclick="currentSlide(2)"></span>
    <span class="dot" onclick="currentSlide(3)"></span>
  </div> --}}
{{-- <div class="container">
    <div class="row">
        <div class="col-lg-12">
            <div class="slider-wrapper-area">
                <div class="hero-slider-active hero__1 slick-dot-style hero-dot">
                    @foreach ($slider as $item)
                        <div class="single-slider" style="background-image: url({{ asset($item->image ?? '') }});">
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div> --}}
<!-- hero slider end -->

<!-- home banner area start -->
{{-- <div class="banner-area mt-30">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-3 col-sm-6 order-1">
                <div class="img-container img-full fix imgs-res mb-sm-30">
                    <a href="#">
                        <img src="{{asset('assets/img/banner/banner_left.jpg')}}" alt="">
                    </a>
                </div>
            </div>
            <div class="col-lg-5 col-md-5 order-sm-3">
                <div class="img-container img-full fix mb-30">
                    <a href="#">
                        <img src="{{asset('assets/img/banner/banner_static_top1.jpg')}}" alt="">
                    </a>
                </div>
                <div class="img-container img-full fix mb-30">
                    <a href="#">
                        <img src="{{asset('assets/img/banner/banner_static_top2.jpg')}}" alt="">
                    </a>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-6 order-2 order-md-3">
                <div class="img-container img-full fix">
                    <a href="#">
                        <img src="{{asset('assets/img/banner/banner_static_top3.jpg')}}" alt="">
                    </a>
                </div>
            </div>
        </div>
    </div>
</div> --}}
<!-- home banner area end -->

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
                                        {{-- <div class="product-label">
                                        <span>hot</span>
                                    </div> --}}
                                        {{-- <div class="product-action-link">
                                        <a href="#" data-toggle="modal" data-target="#quick_view"> <span
                                                data-toggle="tooltip" data-placement="left" title="Quick view"><i
                                                    class="fa fa-search"></i></span> </a>
                                        <a href="#" data-toggle="tooltip" data-placement="left" title="Wishlist"><i
                                                class="fa fa-heart-o"></i></a>
                                        <a href="#" data-toggle="tooltip" data-placement="left" title="Compare"><i
                                                class="fa fa-refresh"></i></a>
                                        <a href="#" data-toggle="tooltip" data-placement="left" title="Add to cart"><i
                                                class="fa fa-shopping-cart"></i></a>
                                    </div> --}}
                                    </div>
                                    <div class="product-content">
                                        <h4><a
                                                href="{{ url('product-detail/' . $item->id) }}">{{ $item->name ?? '' }}</a>
                                        </h4>
                                        <div class="pricebox">
                                            <span class="regular-price">Rs.
                                                {{ $item->price_low ?? '' }}-{{ $item->price_high ?? '' }}</span>
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
                                                {{-- <div class="old-price">
                                                <del>$180.00</del>
                                            </div> --}}
                                            </div>
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
                            {{-- <div class="product-label">
                                    <span>hot</span>
                                </div> --}}
                            {{-- <div class="product-action-link">
                                    <a href="#" data-toggle="modal" data-target="#quick_view"> <span
                                            data-toggle="tooltip" data-placement="left" title="Quick view"><i
                                                class="fa fa-search"></i></span> </a>
                                    <a href="#" data-toggle="tooltip" data-placement="left" title="Wishlist"><i
                                            class="fa fa-heart-o"></i></a>
                                    <a href="#" data-toggle="tooltip" data-placement="left" title="Compare"><i
                                            class="fa fa-refresh"></i></a>
                                    <a href="#" data-toggle="tooltip" data-placement="left" title="Add to cart"><i
                                            class="fa fa-shopping-cart"></i></a>
                                </div> --}}
                        </div>
                        <div class="product-content">
                            <h4><a href="{{ url('product-detail/' . $item1->id) }}">{{ $item1->name ?? '' }}
                                    ({{ $item1->type ?? '' }})
                                </a></h4>
                            <div class="pricebox">
                                <span class="regular-price">Rs.
                                    {{ $user_product->where('product_id', $item1->id)->min('price_low') ?? $item1->price_low }}-{{ $user_product->where('product_id', $item1->id)->max('price_high') ?? $item1->price_high }}</span>
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
                                    <a href="{{ url('arti-detail/' . $item1->id) }}">
                                        <img src="{{ asset($item1->image ?? 'assets/img/user.jpg') }}"
                                            class="img-pri" style="height: 200px; border-radius:50%;" alt="">

                                    </a>
                                    {{-- <div class="product-label">
                                    <span>hot</span>
                                </div> --}}
                                    {{-- <div class="product-action-link">
                                    <a href="#" data-toggle="modal" data-target="#quick_view"> <span
                                            data-toggle="tooltip" data-placement="left" title="Quick view"><i
                                                class="fa fa-search"></i></span> </a>
                                    <a href="#" data-toggle="tooltip" data-placement="left" title="Wishlist"><i
                                            class="fa fa-heart-o"></i></a>
                                    <a href="#" data-toggle="tooltip" data-placement="left" title="Compare"><i
                                            class="fa fa-refresh"></i></a>
                                    <a href="#" data-toggle="tooltip" data-placement="left" title="Add to cart"><i
                                            class="fa fa-shopping-cart"></i></a>
                                </div> --}}
                                </div>
                                <div class="product-content">
                                    <h4><a href="{{ url('arti-detail/' . $item1->id) }}">{{ $item1->first_name ?? '' }}
                                            {{ $item1->last_name ?? '' }}
                                        </a></h4>
                                    <div class="pricebox">

                                        <div class="ratings">
                                            @if ($rating->where('arti_id', $item1->id)->count() == 0.0)
                                                <span class="good"><i class="fa fa-star-o"></i></span>
                                                <span class="good"><i class="fa fa-star-o"></i></span>
                                                <span class="good"><i class="fa fa-star-o"></i></span>
                                                <span class="good"><i class="fa fa-star-o"></i></span>
                                                <span class="good"><i class="fa fa-star-o"></i></span>
                                            @endif
                                            @if (ceil($rating->where('arti_id', $item1->id)->avg('rate')) >= 1.0 && ceil($rating->where('arti_id', $item1->id)->avg('rate')) < 2.0 )
                                                <span class="good"><i class="fa fa-star"></i></span>
                                                <span class="good"><i class="fa fa-star-o"></i></span>
                                                <span class="good"><i class="fa fa-star-o"></i></span>
                                                <span class="good"><i class="fa fa-star-o"></i></span>
                                                <span class="good"><i class="fa fa-star-o"></i></span>
                                            @elseif(ceil($rating->where('arti_id', $item1->id)->avg('rate')) >= 2.0 && ceil($rating->where('arti_id', $item1->id)->avg('rate')) < 3.0)
                                                <span class="good"><i class="fa fa-star"></i></span>
                                                <span class="good"><i class="fa fa-star"></i></span>
                                                <span class="good"><i class="fa fa-star-o"></i></span>
                                                <span class="good"><i class="fa fa-star-o"></i></span>
                                                <span class="good"><i class="fa fa-star-o"></i></span>
                                            @elseif(ceil($rating->where('arti_id', $item1->id)->avg('rate')) >= 3.0  && ceil($rating->where('arti_id', $item1->id)->avg('rate')) < 4.0)
                                                <span class="good"><i class="fa fa-star"></i></span>
                                                <span class="good"><i class="fa fa-star"></i></span>
                                                <span class="good"><i class="fa fa-star"></i></span>
                                                <span class="good"><i class="fa fa-star-o"></i></span>
                                                <span class="good"><i class="fa fa-star-o"></i></span>
                                            @elseif(ceil($rating->where('arti_id', $item1->id)->avg('rate')) >= 4.0  && ceil($rating->where('arti_id', $item1->id)->avg('rate')) < 5.0)
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
                                    {{-- <div class="product-label">
                                    <span>hot</span>
                                </div> --}}
                                    {{-- <div class="product-action-link">
                                    <a href="#" data-toggle="modal" data-target="#quick_view"> <span
                                            data-toggle="tooltip" data-placement="left" title="Quick view"><i
                                                class="fa fa-search"></i></span> </a>
                                    <a href="#" data-toggle="tooltip" data-placement="left" title="Wishlist"><i
                                            class="fa fa-heart-o"></i></a>
                                    <a href="#" data-toggle="tooltip" data-placement="left" title="Compare"><i
                                            class="fa fa-refresh"></i></a>
                                    <a href="#" data-toggle="tooltip" data-placement="left" title="Add to cart"><i
                                            class="fa fa-shopping-cart"></i></a>
                                </div> --}}
                                </div>
                                <div class="product-content">
                                    <h4><a href="{{ url('arti-detail/' . $item1->id) }}">{{ $item1->first_name ?? '' }}
                                            {{ $item1->last_name ?? '' }}
                                        </a></h4>
                                    <div class="pricebox">

                                        <div class="ratings">
                                            @if ($rating->where('arti_id', $item1->id)->count() == 0.0)
                                                <span class="good"><i class="fa fa-star-o"></i></span>
                                                <span class="good"><i class="fa fa-star-o"></i></span>
                                                <span class="good"><i class="fa fa-star-o"></i></span>
                                                <span class="good"><i class="fa fa-star-o"></i></span>
                                                <span class="good"><i class="fa fa-star-o"></i></span>
                                            @endif
                                            @if (ceil($rating->where('arti_id', $item1->id)->avg('rate')) >= 1.0 && ceil($rating->where('arti_id', $item1->id)->avg('rate')) < 2.0 )
                                                <span class="good"><i class="fa fa-star"></i></span>
                                                <span class="good"><i class="fa fa-star-o"></i></span>
                                                <span class="good"><i class="fa fa-star-o"></i></span>
                                                <span class="good"><i class="fa fa-star-o"></i></span>
                                                <span class="good"><i class="fa fa-star-o"></i></span>
                                            @elseif(ceil($rating->where('arti_id', $item1->id)->avg('rate')) >= 2.0 && ceil($rating->where('arti_id', $item1->id)->avg('rate')) < 3.0)
                                                <span class="good"><i class="fa fa-star"></i></span>
                                                <span class="good"><i class="fa fa-star"></i></span>
                                                <span class="good"><i class="fa fa-star-o"></i></span>
                                                <span class="good"><i class="fa fa-star-o"></i></span>
                                                <span class="good"><i class="fa fa-star-o"></i></span>
                                            @elseif(ceil($rating->where('arti_id', $item1->id)->avg('rate')) >= 3.0  && ceil($rating->where('arti_id', $item1->id)->avg('rate')) < 4.0)
                                                <span class="good"><i class="fa fa-star"></i></span>
                                                <span class="good"><i class="fa fa-star"></i></span>
                                                <span class="good"><i class="fa fa-star"></i></span>
                                                <span class="good"><i class="fa fa-star-o"></i></span>
                                                <span class="good"><i class="fa fa-star-o"></i></span>
                                            @elseif(ceil($rating->where('arti_id', $item1->id)->avg('rate')) >= 4.0  && ceil($rating->where('arti_id', $item1->id)->avg('rate')) < 5.0)
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
                    <div class="product-item fix">
                        <div class="product-thumb">
                            <a href="{{ url('forsale-detail/' . $item1->id) }}">
                                @foreach ($sale_product_image->where('other_id', $item1->id)->take(2) as $loop => $item2)
                                    @if ($loop->first)
                                        <img src="{{ asset($item2->image ?? '') }}" class="img-pri"
                                            style="height: 200px;" alt="">
                                    @else
                                        <img src="{{ asset($item2->image ?? '') }}" class="img-sec"
                                            style="height: 200px;" alt="">
                                    @endif
                                @endforeach

                            </a>
                            {{-- <div class="product-label">
                            <span>hot</span>
                        </div> --}}
                            {{-- <div class="product-action-link">
                            <a href="#" data-toggle="modal" data-target="#quick_view"> <span
                                    data-toggle="tooltip" data-placement="left" title="Quick view"><i
                                        class="fa fa-search"></i></span> </a>
                            <a href="#" data-toggle="tooltip" data-placement="left" title="Wishlist"><i
                                    class="fa fa-heart-o"></i></a>
                            <a href="#" data-toggle="tooltip" data-placement="left" title="Compare"><i
                                    class="fa fa-refresh"></i></a>
                            <a href="#" data-toggle="tooltip" data-placement="left" title="Add to cart"><i
                                    class="fa fa-shopping-cart"></i></a>
                        </div> --}}
                        </div>
                        <div class="product-content">
                            <h4><a href="{{ url('forsale-detail/' . $item1->id) }}">{{ $item1->name ?? '' }}
                                </a></h4>
                            <div class="pricebox">
                                <span class="regular-price">Rs.
                                    {{ $item1->price ?? '' }}</span>
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

<!-- latest product start -->
{{-- <div class="latest-product">
    <div class="container">
        <div class="section-title mb-30">
            <div class="title-icon">
                <i class="fa fa-flash"></i>
            </div>
            <h3>latest product</h3>
        </div> <!-- section title end -->
        <!-- featured category start -->
        <div class="latest-product-active slick-padding slick-arrow-style">
            <!-- product single item start -->
            <div class="product-item fix">
                <div class="product-thumb">
                    <a href="#">
                        <img src="{{asset('assets/img/product/product-img1.jpg')}}" class="img-pri" alt="">
                        <img src="{{asset('assets/img/product/product-img2.jpg')}}" class="img-sec" alt="">
                    </a>
                    <div class="product-label">
                        <span>hot</span>
                    </div>
                    <div class="product-action-link">
                        <a href="#" data-toggle="modal" data-target="#quick_view"> <span data-toggle="tooltip"
                                data-placement="left" title="Quick view"><i class="fa fa-search"></i></span>
                        </a>
                        <a href="#" data-toggle="tooltip" data-placement="left" title="Wishlist"><i class="fa fa-heart-o"></i></a>
                        <a href="#" data-toggle="tooltip" data-placement="left" title="Compare"><i class="fa fa-refresh"></i></a>
                        <a href="#" data-toggle="tooltip" data-placement="left" title="Add to cart"><i class="fa fa-shopping-cart"></i></a>
                    </div>
                </div>
                <div class="product-content">
                    <h4><a href="#">vertual product 01</a></h4>
                    <div class="pricebox">
                        <span class="regular-price">$70.00</span>
                        <div class="ratings">
                            <span class="good"><i class="fa fa-star"></i></span>
                            <span class="good"><i class="fa fa-star"></i></span>
                            <span class="good"><i class="fa fa-star"></i></span>
                            <span class="good"><i class="fa fa-star"></i></span>
                            <span><i class="fa fa-star"></i></span>
                            <div class="pro-review">
                                <span>1 review(s)</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- product single item end -->
            <!-- product single item start -->
            <div class="product-item fix">
                <div class="product-thumb">
                    <a href="#">
                        <img src="{{asset('assets/img/product/product-img3.jpg')}}" class="img-pri" alt="">
                        <img src="{{asset('assets/img/product/product-img4.jpg')}}" class="img-sec" alt="">
                    </a>
                    <div class="product-label">
                        <span>hot</span>
                    </div>
                    <div class="product-action-link">
                        <a href="#" data-toggle="modal" data-target="#quick_view"> <span data-toggle="tooltip"
                                data-placement="left" title="Quick view"><i class="fa fa-search"></i></span>
                        </a>
                        <a href="#" data-toggle="tooltip" data-placement="left" title="Wishlist"><i class="fa fa-heart-o"></i></a>
                        <a href="#" data-toggle="tooltip" data-placement="left" title="Compare"><i class="fa fa-refresh"></i></a>
                        <a href="#" data-toggle="tooltip" data-placement="left" title="Add to cart"><i class="fa fa-shopping-cart"></i></a>
                    </div>
                </div>
                <div class="product-content">
                    <h4><a href="#">simple product 04</a></h4>
                    <div class="pricebox">
                        <span class="regular-price">$80.00</span>
                        <div class="ratings">
                            <span class="good"><i class="fa fa-star"></i></span>
                            <span class="good"><i class="fa fa-star"></i></span>
                            <span class="good"><i class="fa fa-star"></i></span>
                            <span class="good"><i class="fa fa-star"></i></span>
                            <span><i class="fa fa-star"></i></span>
                            <div class="pro-review">
                                <span>1 review(s)</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- product single item end -->
            <!-- product single item start -->
            <div class="product-item fix">
                <div class="product-thumb">
                    <a href="#">
                        <img src="{{asset('assets/img/product/product-img5.jpg')}}" class="img-pri" alt="">
                        <img src="{{asset('assets/img/product/product-img6.jpg')}}" class="img-sec" alt="">
                    </a>
                    <div class="product-label">
                        <span>hot</span>
                    </div>
                    <div class="product-action-link">
                        <a href="#" data-toggle="modal" data-target="#quick_view"> <span data-toggle="tooltip"
                                data-placement="left" title="Quick view"><i class="fa fa-search"></i></span>
                        </a>
                        <a href="#" data-toggle="tooltip" data-placement="left" title="Wishlist"><i class="fa fa-heart-o"></i></a>
                        <a href="#" data-toggle="tooltip" data-placement="left" title="Compare"><i class="fa fa-refresh"></i></a>
                        <a href="#" data-toggle="tooltip" data-placement="left" title="Add to cart"><i class="fa fa-shopping-cart"></i></a>
                    </div>
                </div>
                <div class="product-content">
                    <h4><a href="#">grouped product 05</a></h4>
                    <div class="pricebox">
                        <span class="regular-price">$70.00</span>
                        <div class="ratings">
                            <span class="good"><i class="fa fa-star"></i></span>
                            <span class="good"><i class="fa fa-star"></i></span>
                            <span class="good"><i class="fa fa-star"></i></span>
                            <span class="good"><i class="fa fa-star"></i></span>
                            <span><i class="fa fa-star"></i></span>
                            <div class="pro-review">
                                <span>1 review(s)</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- product single item end -->
            <!-- product single item start -->
            <div class="product-item fix">
                <div class="product-thumb">
                    <a href="#">
                        <img src="{{asset('assets/img/product/product-img7.jpg')}}" class="img-pri" alt="">
                        <img src="{{asset('assets/img/product/product-img8.jpg')}}" class="img-sec" alt="">
                    </a>
                    <div class="product-label">
                        <span>hot</span>
                    </div>
                    <div class="product-action-link">
                        <a href="#" data-toggle="modal" data-target="#quick_view"> <span data-toggle="tooltip"
                                data-placement="left" title="Quick view"><i class="fa fa-search"></i></span>
                        </a>
                        <a href="#" data-toggle="tooltip" data-placement="left" title="Wishlist"><i class="fa fa-heart-o"></i></a>
                        <a href="#" data-toggle="tooltip" data-placement="left" title="Compare"><i class="fa fa-refresh"></i></a>
                        <a href="#" data-toggle="tooltip" data-placement="left" title="Add to cart"><i class="fa fa-shopping-cart"></i></a>
                    </div>
                </div>
                <div class="product-content">
                    <h4><a href="#">affiliate product 06</a></h4>
                    <div class="pricebox">
                        <span class="regular-price">$100.00</span>
                        <div class="ratings">
                            <span class="good"><i class="fa fa-star"></i></span>
                            <span class="good"><i class="fa fa-star"></i></span>
                            <span class="good"><i class="fa fa-star"></i></span>
                            <span class="good"><i class="fa fa-star"></i></span>
                            <span><i class="fa fa-star"></i></span>
                            <div class="pro-review">
                                <span>1 review(s)</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- product single item end -->
            <!-- product single item start -->
            <div class="product-item fix">
                <div class="product-thumb">
                    <a href="#">
                        <img src="{{asset('assets/img/product/product-img9.jpg')}}" class="img-pri" alt="">
                        <img src="{{asset('assets/img/product/product-img10.jpg')}}" class="img-sec" alt="">
                    </a>
                    <div class="product-label">
                        <span>hot</span>
                    </div>
                    <div class="product-action-link">
                        <a href="#" data-toggle="modal" data-target="#quick_view"> <span data-toggle="tooltip"
                                data-placement="left" title="Quick view"><i class="fa fa-search"></i></span>
                        </a>
                        <a href="#" data-toggle="tooltip" data-placement="left" title="Wishlist"><i class="fa fa-heart-o"></i></a>
                        <a href="#" data-toggle="tooltip" data-placement="left" title="Compare"><i class="fa fa-refresh"></i></a>
                        <a href="#" data-toggle="tooltip" data-placement="left" title="Add to cart"><i class="fa fa-shopping-cart"></i></a>
                    </div>
                </div>
                <div class="product-content">
                    <h4><a href="#">vertual product 01</a></h4>
                    <div class="pricebox">
                        <span class="regular-price">$70.00</span>
                        <div class="ratings">
                            <span class="good"><i class="fa fa-star"></i></span>
                            <span class="good"><i class="fa fa-star"></i></span>
                            <span class="good"><i class="fa fa-star"></i></span>
                            <span class="good"><i class="fa fa-star"></i></span>
                            <span><i class="fa fa-star"></i></span>
                            <div class="pro-review">
                                <span>1 review(s)</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- product single item end -->
            <!-- product single item start -->
            <div class="product-item fix">
                <div class="product-thumb">
                    <a href="#">
                        <img src="{{asset('assets/img/product/product-img11.jpg')}}" class="img-pri" alt="">
                        <img src="{{asset('assets/img/product/product-img12.jpg')}}" class="img-sec" alt="">
                    </a>
                    <div class="product-label">
                        <span>hot</span>
                    </div>
                    <div class="product-action-link">
                        <a href="#" data-toggle="modal" data-target="#quick_view"> <span data-toggle="tooltip"
                                data-placement="left" title="Quick view"><i class="fa fa-search"></i></span>
                        </a>
                        <a href="#" data-toggle="tooltip" data-placement="left" title="Wishlist"><i class="fa fa-heart-o"></i></a>
                        <a href="#" data-toggle="tooltip" data-placement="left" title="Compare"><i class="fa fa-refresh"></i></a>
                        <a href="#" data-toggle="tooltip" data-placement="left" title="Add to cart"><i class="fa fa-shopping-cart"></i></a>
                    </div>
                </div>
                <div class="product-content">
                    <h4><a href="#">simple product 01</a></h4>
                    <div class="pricebox">
                        <span class="regular-price">$50.00</span>
                        <div class="ratings">
                            <span class="good"><i class="fa fa-star"></i></span>
                            <span class="good"><i class="fa fa-star"></i></span>
                            <span class="good"><i class="fa fa-star"></i></span>
                            <span class="good"><i class="fa fa-star"></i></span>
                            <span><i class="fa fa-star"></i></span>
                            <div class="pro-review">
                                <span>1 review(s)</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- product single item end -->
        </div>
        <!-- featured category end -->
    </div>
</div> --}}
<!-- latest product end -->
@endsection
@section('script')
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
  if (slideIndex > slides.length) {slideIndex = 1}
  slides[slideIndex-1].style.display = "block";
  setTimeout(showSlides, 2000); // Change image every 2 seconds
}
</script>
@endsection

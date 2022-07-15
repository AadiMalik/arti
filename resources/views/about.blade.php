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
                            <li class="breadcrumb-item active" aria-current="page">about us</li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- breadcrumb area end -->

<!-- about wrapper start -->
<div class="about-us-wrapper pt-4">
    <div class="container">
        <div class="row">
            <!-- About Text Start -->
            <div class="col-lg-6">
                <div class="about-text-wrap">
                    <h2><span>Provide Best</span>Product For You</h2>
                    <p>We provide the best Beard oile all over the world. We are the worldd best store in indi for Beard Oil. You can buy our product without any hegitation because they truste us and buy our product without any hagitation because they belive and always happy buy our product.</p>
                    <p>Some of our customer say’s that they trust us and buy our product without any hagitation because they belive us and always happy to buy our product.</p>
                    <p>We provide the beshat they trusted us and buy our product without any hagitation because they belive us and always happy to buy.</p>
                </div>
            </div>
            <!-- About Text End -->
            <!-- About Image Start -->
            <div class="col-lg-5 ml-auto">
                <div class="about-image-wrap mt-md-26 mt-sm-26">
                    <img src="assets/img/about/about.jpg" alt="About" />
                </div>
            </div>
            <!-- About Image End -->
        </div>
    </div>
</div>
<!-- about wrapper end -->

<!-- team area start -->
<div class="team-area pt-28">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="title-box text-center mb-10">
                    <h3>our team</h3>
                </div>
            </div>
        </div> <!-- section title end -->
        <div class="row">
            @foreach ($team as $item)
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="team-member mb-30">
                    <div class="team-thumb img-full">
                        <img src="{{asset($item->image??'')}}" alt="">
                        <div class="team-social">
                            <a href="{{$item->facebook??''}}"><i class="fa fa-facebook"></i></a>
                            <a href="{{$item->twitter??''}}"><i class="fa fa-twitter"></i></a>
                            <a href="{{$item->linkedin??''}}"><i class="fa fa-linkedin"></i></a>
                            <a href="{{$item->google??''}}"><i class="fa fa-google-plus"></i></a>
                        </div>
                    </div>
                    <div class="team-content text-center">
                        <h3>{{$item->name??''}}</h3>
                        <h6>{{$item->profession??''}}</h6>
                        <p>{!!$item->bio??''!!}</p>
                    </div>
                </div>
            </div> <!-- end single team member -->
            @endforeach
        </div>
    </div>
</div>
<!-- team area end -->

<!-- testimonial area start -->
<div class="testimonial-area2">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="testimonial-title text-center mb-28">
                    <h3>happy customer</h3>
                </div> <!-- section title end -->
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="testimonial-carousel-active testimonial-style-2 slick-dot-style">
                    @foreach ($review as $item)
                    <div class="testimonial-item text-center">
                        <div class="testimonial-thumb">
                            <img src="{{asset($item->image??'')}}" style="height: 85px;" alt="">
                        </div>
                        <div class="testimonial-content">
                            <p>{!!$item->description??''!!}</p>
                            <h3><a href="#">{{$item->name??''}}</a></h3>
                        </div>
                    </div> <!-- end single testimonial item -->
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
<!-- testimonial area end -->

<!-- choosing area start -->
<div class="choosing-area pt-28">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="title-box text-center mb-30">
                    <h3>why choose us</h3>
                </div>
            </div>
        </div> <!-- section title end -->
        <div class="row">
            <div class="col-lg-4">
                <div class="single-choose-item text-center mb-md-30 mb-sm-30">
                    <i class="fa fa-globe"></i>
                    <h4>free shipping</h4>
                    <p>Amadea Shop is a very slick and clean e-commerce template with endless possibilities.</p>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="single-choose-item text-center mb-md-30 mb-sm-30">
                    <i class="fa fa-plane"></i>
                    <h4>fast delivery</h4>
                    <p>Amadea Shop is a very slick and clean e-commerce template with endless possibilities.</p>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="single-choose-item text-center mb-md-30 mb-sm-30">
                    <i class="fa fa-comments"></i>
                    <h4>customers support</h4>
                    <p>Amadea Shop is a very slick and clean e-commerce template with endless possibilities.</p>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- choosing area end -->

@endsection
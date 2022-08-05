@php
    $data = content();
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
                                <li class="breadcrumb-item active" aria-current="page">contact us</li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb area end -->

    <!-- contact area start -->
    <div class="contact-area pb-34 pb-md-18 pb-sm-0">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="contact-message">
                        <h2>tell us your project</h2>
                        <div class="col-12">
                            @if (session('success'))
                                <div class="alert alert-success">
                                    {{ session('success') }}
                                </div>
                            @endif
                        </div>
                        <form action="{{ route('Send_Message') }}" method="post" class="contact-form">
                            @csrf
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-6">
                                    <input name="name" placeholder="Name *" type="text" required>
                                    {!! $errors->first('name', "<span class='text-danger'>:message</span>") !!}
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6">
                                    <input name="phone" placeholder="Phone *" type="text" required>
                                    {!! $errors->first('phone', "<span class='text-danger'>:message</span>") !!}
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6">
                                    <input name="email" placeholder="Email *" type="email" required>
                                    {!! $errors->first('email', "<span class='text-danger'>:message</span>") !!}
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6">
                                    <input name="subject" placeholder="Subject *" type="text">
                                    {!! $errors->first('subject', "<span class='text-danger'>:message</span>") !!}
                                </div>
                                <div class="col-12">
                                    <div class="contact2-textarea text-center">
                                        <textarea placeholder="Message *" name="message" class="form-control2" required=""></textarea>
                                        {!! $errors->first('message', "<span class='text-danger'>:message</span>") !!}
                                    </div>
                                    <div class="contact-btn">
                                        <button class="sqr-btn" type="submit">Send Message</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                        
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="contact-info mt-md-28 mt-sm-28">
                        <h2>{{$data['#contact']['heading']??''}}</h2>
                        {!!$data['#contact']['description']??''!!}
                        <ul>
                            <li><i class="fa fa-fax"></i> Address : {{$data['#address']['heading']??''}}</li>
                            <li><i class="fa fa-phone"></i> {{$data['#email']['heading']??''}}</li>
                            <li><i class="fa fa-envelope-o"></i> {{$data['#phone']['heading']??''}}</li>
                        </ul>
                        {{-- <div class="working-time">
                            <h3>Working hours</h3>
                            <p><span>Monday – Saturday:</span>08AM – 22PM</p>
                        </div> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- contact area end -->

    <!-- map area start -->
    <div class="map-area-wrapper">
        <div class="container">
            <div id="map_content" data-lat="23.763491" data-lng="90.431167" data-zoom="8" data-maptitle="HasTech"
                data-mapaddress="Floor# 4, House# 5, Block# C     </br> Banasree Main Rd, Dhaka">
            </div>
        </div>
    </div>
    <!-- map area end -->
@endsection

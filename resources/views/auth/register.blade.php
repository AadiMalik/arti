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
                            <li class="breadcrumb-item active" aria-current="page">Register</li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- breadcrumb area end -->
<div class="login-register-wrapper">
    <div class="container">
        <div class="member-area-from-wrap">
            <div class="row">
                <!-- Register Content Start -->
                <div class="col-md-6 offset-md-3">
                    <div class="login-reg-form-wrap mt-md-34 mt-sm-34">
                        <h2 style="margin-bottom: 0px;">Register</h2>
                        <form action="{{ route('register') }}" method="POST">
                            @csrf
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="single-input-item">
                                    <select name="role" id="" class="form-control">
                                        <option value="2">User</option>
                                        <option value="3">Arti</option>
                                    </select>
                                    </div>
                                </div>
                            </div>
                            <div class="single-input-item">
                                <input type="text" name="username" value="{{old('username')}}" placeholder="Enter Username" required />
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="single-input-item">
                                        <input type="text" name="first_name" value="{{ old('first_name') }}" placeholder="First Name" required />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="single-input-item">
                                        <input type="text" name="last_name" value="{{ old('last_name') }}" placeholder="Last Name" required />
                                    </div>
                                </div>
                            </div>
                            <div class="single-input-item">
                                <input type="email" name="email" value="{{old('email')}}" placeholder="Enter your Email" required />
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="single-input-item">
                                        <input type="password" name="password" placeholder="Enter your Password" required />
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="single-input-item">
                                        <input type="password" name="password_confirmation" placeholder="Repeat your Password" required />
                                    </div>
                                </div>
                            </div>
                            <div class="single-input-item">
                                <button type="submit" class="sqr-btn">Register</button>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- Register Content End -->
            </div>
        </div>
    </div>
</div>
@endsection

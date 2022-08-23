@php
$category = category();
$brand = brand();
$media = media();
$data = content();
$notifications = notification();
use Carbon\Carbon;
use Alkoumi\LaravelHijriDate\Hijri;
@endphp
<!DOCTYPE html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="meta description">
    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <!-- Site title -->
    <title>Sabzi Mandi</title>
    <!-- Favicon -->
    <!-- Bootstrap CSS -->
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet">
    <!-- Font-Awesome CSS -->
    <link href="{{ asset('assets/css/font-awesome.min.css') }}" rel="stylesheet">
    <!-- helper class css -->
    <link href="{{ asset('assets/css/helper.min.css') }}" rel="stylesheet">
    <!-- Plugins CSS -->
    <link href="{{ asset('assets/css/plugins.css') }}" rel="stylesheet">
    <!-- Slider CSS -->
    <link href="{{ asset('assets/css/slider.css') }}" rel="stylesheet">
    <!-- Main Style CSS -->
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets_data/bundles/select2/dist/css/select2.min.css') }}">
    <link href="{{ asset('assets/css/skin-default.css') }}" rel="stylesheet" id="galio-skin">
    <link rel="stylesheet" href="https://ZulNs.github.io/libs/calendar.css">
    <style>
        .calendar .header-row,
        .calendar .month-field,
        .calendar .year-field {
            background: #0c8b51;
        }
    </style>
    @yield('style')
</head>

<body>

    <!-- color switcher start -->
    <div class="color-switcher">
        <div class="color-switcher-inner">
            <div class="switcher-icon">
                <i class="fa fa-cog fa-spin"></i>
            </div>
            <div class="addthis_inline_share_toolbox"></div>
            <div class="switcher-panel-item">
                <h3>Color Schemes</h3>
                <ul class="nav flex-wrap colors">
                    <li class="default active" data-color="default" data-toggle="tooltip" data-placement="top"
                        title="Red"></li>
                    <li class="green" data-color="green" data-toggle="tooltip" data-placement="top" title="Green">
                    </li>
                    <li class="soft-green" data-color="soft-green" data-toggle="tooltip" data-placement="top"
                        title="Soft-Green"></li>
                    <li class="sky-blue" data-color="sky-blue" data-toggle="tooltip" data-placement="top"
                        title="Sky-Blue"></li>
                    <li class="orange" data-color="orange" data-toggle="tooltip" data-placement="top" title="Orange">
                    </li>
                    <li class="violet" data-color="violet" data-toggle="tooltip" data-placement="top" title="Violet">
                    </li>
                </ul>
            </div>

            <div class="switcher-panel-item">
                <h3>Layout Style</h3>
                <ul class="nav layout-changer">
                    <li><button class="btn-layout-changer active" data-layout="wide">Wide</button></li>
                    <li><button class="btn-layout-changer" data-layout="boxed">Boxed</button></li>
                </ul>
            </div>

            <div class="switcher-panel-item bg">
                <h3>Background Pattern</h3>
                <ul class="nav flex-wrap bgbody-style bg-pattern">
                    <li><img src="{{ asset('assets/img/bg-panel/bg-pettern/1.png') }}" alt="Pettern"></li>
                    <li><img src="{{ asset('assets/img/bg-panel/bg-pettern/2.png') }}" alt="Pettern"></li>
                    <li><img src="{{ asset('assets/img/bg-panel/bg-pettern/3.png') }}" alt="Pettern"></li>
                    <li><img src="{{ asset('assets/img/bg-panel/bg-pettern/4.png') }}" alt="Pettern"></li>
                    <li><img src="{{ asset('assets/img/bg-panel/bg-pettern/5.png') }}" alt="Pettern"></li>
                    <li><img src="{{ asset('assets/img/bg-panel/bg-pettern/6.png') }}" alt="Pettern"></li>
                </ul>
            </div>

            <div class="switcher-panel-item bg">
                <h3>Background Image</h3>
                <ul class="nav flex-wrap bgbody-style bg-img">
                    <li><img src="{{ asset('assets/img/bg-panel/bg-img/01.jpg') }}" alt="Images"></li>
                    <li><img src="{{ asset('assets/img/bg-panel/bg-img/02.jpg') }}" alt="Images"></li>
                    <li><img src="{{ asset('assets/img/bg-panel/bg-img/03.jpg') }}" alt="Images"></li>
                    <li><img src="{{ asset('assets/img/bg-panel/bg-img/04.jpg') }}" alt="Images"></li>
                    <li><img src="{{ asset('assets/img/bg-panel/bg-img/05.jpg') }}" alt="Images"></li>
                    <li><img src="{{ asset('assets/img/bg-panel/bg-img/06.jpg') }}" alt="Images"></li>
                </ul>
            </div>
        </div>
    </div>
    <!-- color switcher end -->

    <div class="wrapper">

        <!-- header area start -->
        <header>

            <!-- header top start -->
            <div class="header-top-area bg-gray text-center text-md-left">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6 col-md-5">
                            <div class="header-call-action">
                                <a href="mailto:{{ $data['#email']['heading'] ?? '' }}">
                                    <i class="fa fa-envelope"></i>
                                    {{ $data['#email']['heading'] ?? '' }}
                                </a>
                                <a href="tel:{{ $data['#phone']['heading'] ?? '' }}">
                                    <i class="fa fa-phone"></i>
                                    {{ $data['#phone']['heading'] ?? '' }}
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-7">
                            <div class="header-top-right float-md-right float-none">
                                <nav>
                                    <ul>
                                        @auth


                                            <li>
                                                <div class="dropdown header-top-dropdown">
                                                    @foreach (Auth()->user()->roles as $item)
                                                        @if ($item->title == 'Arti')
                                                            <a href="{{ url('arti-detail/' . Auth()->user()->id) }}">
                                                                <img src="{{ asset(Auth()->user()->image ?? 'assets\img\user.jpg') }}"
                                                                    style="height: 23px; border-radius:50%;"
                                                                    alt="">
                                                            </a>
                                                            <a class="dropdown-toggle" id="myaccount"
                                                                data-toggle="dropdown" aria-haspopup="true"
                                                                aria-expanded="false">

                                                                {{ Auth()->user()->username ?? Auth()->user()->first_name }}
                                                                <i class="fa fa-angle-down"></i>
                                                            </a>
                                                        @else
                                                            <a class="dropdown-toggle" id="myaccount"
                                                                data-toggle="dropdown" aria-haspopup="true"
                                                                aria-expanded="false">
                                                                <img src="{{ asset(Auth()->user()->image ?? 'assets\img\user.jpg') }}"
                                                                    style="height: 23px; border-radius:50%;"
                                                                    alt="">

                                                                {{ Auth()->user()->username ?? Auth()->user()->first_name }}
                                                                <i class="fa fa-angle-down"></i>
                                                            </a>
                                                        @endif
                                                    @endforeach
                                                    <div class="dropdown-menu" aria-labelledby="myaccount">
                                                        @if (Auth()->user()->is_Admin)
                                                            <a class="dropdown-item"
                                                                href="{{ url('admin/admin') }}">Admin Panel</a>
                                                        @else
                                                            @foreach (Auth()->user()->roles as $item)
                                                                @if ($item->title == 'Arti')
                                                                    <a class="dropdown-item"
                                                                        href="{{ url('arti-detail/' . Auth()->user()->id) }}">Profile</a>
                                                                @else
                                                                    <a class="dropdown-item"
                                                                        href="{{ url('dashboard') }}">Profile</a>
                                                                @endif
                                                            @endforeach
                                                            <a class="dropdown-item" href="{{ url('profile') }}">Edit
                                                                Profile</a>
                                                        @endif
                                                        <a class="dropdown-item" href="javascript:void(0);"
                                                            onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                                                            Logout</a>
                                                        <form id="logout-form" action="{{ route('logout') }}"
                                                            method="POST" style="display: none;">
                                                            @csrf
                                                        </form>
                                                    </div>
                                                </div>
                                            </li>
                                            @foreach (Auth()->user()->roles as $item)
                                                @if ($item->title == 'Arti')
                                                    <li class="dropdown header-top-dropdown"><a href="#"
                                                            data-toggle="dropdown" class="notification-toggle"><i
                                                                class="fa fa-bell" style="font-size:18px;"></i>
                                                            @if ($notifications->count() > 0)
                                                                <i
                                                                    class="badge badge-dark">{{ $notifications->count() ?? '0' }}</i>
                                                            @endif
                                                        </a>
                                                        <div
                                                            class="dropdown-menu dropdown-list dropdown-menu-right pullDown">
                                                            <div class="dropdown-header">
                                                                Notifications
                                                                <div class="float-right">
                                                                    <a href="#" id="mark-all">Mark All As Read</a>
                                                                </div>
                                                            </div>
                                                            <div class="dropdown-list-content dropdown-list-icons">

                                                                @foreach ($notifications as $notification)
                                                                    <div class="notification">
                                                                        <a href="#"
                                                                            class="dropdown-item dropdown-item-unread  mark-as-read"
                                                                            data-id="{{ $notification->id ?? '' }}"> <span style="padding: 2px;
                                                                            margin: 4px;"
                                                                                class="dropdown-item-icon bg-primary text-white">
                                                                                <i
                                                                                    class="fas
                                                                            fa-bell"></i>
                                                                            </span> <span class="dropdown-item-desc">
                                                                                {{ $notification->data['name'] }} {{ $notification->data['message'] }}
                                                                                <span
                                                                                    class="time">{{ $notification->created_at->diffForHumans() }}</span>
                                                                            </span>
                                                                        </a>

                                                                    </div>
                                                                @endforeach
                                                            </div>
                                                        </div>
                                                    </li>
                                                @endif
                                            @endforeach
                                        @else
                                            <li>
                                                <a href="{{ route('login') }}">{{ __('sentence.Login') }}</a>
                                            </li>
                                            <li>
                                                <a href="{{ route('register') }}">{{ __('sentence.Register') }}</a>
                                            </li>
                                        @endauth
                                        {{-- <li>
                                            <a class="dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <span class="flag-icon flag-icon-{{Config::get('languages')[App::getLocale()]['flag-icon']}}"></span> {{ Config::get('languages')[App::getLocale()]['display'] }}
                                            </a>
                                            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                                @foreach (Config::get('languages') as $lang => $language)
                                                @if ($lang != App::getLocale())
                                                        <a class="dropdown-item" href="{{ route('lang.switch', $lang) }}"><span class="flag-icon flag-icon-{{$language['flag-icon']}}"></span> {{$language['display']}}</a>
                                                @endif
                                            @endforeach
                                            </div>
                                        </li> --}}
                                        {{-- <li>
                                            <a href="#">checkout</a>
                                        </li> --}}
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- header top end -->

            <!-- header middle start -->
            <div class="header-middle-area pt-20 pb-20">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-3">
                            <div style="text-align: center;">
                                <a href="{{ url('/') }}">
                                    {{-- <h2
                                        style="font-size: 45px;
                                    color: #b90e0e;
                                    font-weight: bold;">
                                        Subzi <br> Mandi</h2> --}}
                                    <img src="{{ asset($data['#logo']['image'] ?? 'Images/logo2.png') }}"
                                        style="height: 100px;" alt="brand logo">
                                </a>
                            </div>
                        </div> <!-- end logo area -->
                        <div class="col-lg-9">
                            <div class="header-middle-right">
                                <div class="header-middle-shipping mb-20">
                                    {{-- <div class="single-block-shipping">
                                        <div class="shipping-icon">
                                            <i class="fa fa-clock-o"></i>
                                        </div>
                                        <div class="shipping-content">

                                            <h5>{{ carbon::now()->format('d M Y') }}</h5>
                                            <h5>{{ Hijri::Date('l ، j F ، Y') }}</h5>
                                        </div>
                                    </div> --}}
                                    {{-- <div class="single-block-shipping">
                                        <div class="shipping-icon">
                                            <i class="fa fa-truck"></i>
                                        </div>
                                        <div class="shipping-content">
                                            <h5>Support</h5>
                                            <span>24/7</span>
                                        </div>
                                    </div> <!-- end single shipping -->
                                    <div class="single-block-shipping">
                                        <div class="shipping-icon">
                                            <i class="fa fa-money"></i>
                                        </div>
                                        <div class="shipping-content">
                                            <h5>Money back 100%</h5>
                                            <span>Within 30 Days</span>
                                        </div>
                                    </div> --}}
                                    <!-- end single shipping -->
                                </div>
                                <div class="header-middle-block">
                                    <div class="header-middle-searchbox">
                                        <form action="{{ url('search') }}" method="GET">
                                            @csrf
                                            <input type="text" name="search" placeholder="Search...">
                                            <button class="search-btn"><i class="fa fa-search"></i></button>
                                        </form>
                                    </div>
                                    <a href="{{ url('sell') }}">
                                        <div class="form-control"
                                            style="display: block; height:52px; line-height:38px; background: #0c8b51; color:#fff; font-weight: bold; width: 100%;border-radius: 10%;">
                                            Sell +
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- header middle end -->

            <!-- main menu area start -->
            <div class="main-header-wrapper bdr-bottom1">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="main-header-inner">
                                <div class="category-toggle-wrap">
                                    <div class="category-toggle">
                                        category
                                        <div class="cat-icon">
                                            <i class="fa fa-angle-down"></i>
                                        </div>
                                    </div>
                                    <nav class="category-menu hm-1">
                                        <ul>
                                            @foreach ($category as $item)
                                                <li><a href="{{ url('shop-category/' . $item->id) }}"><i
                                                            class="fa fa-desktop"></i>
                                                        {{ $item->name ?? '' }}</a></li>
                                            @endforeach

                                            {{-- <li class="menu-item-has-children"><a href="shop-grid-left-sidebar.html"><i
                                                        class="fa fa-camera"></i> camera</a>
                                                <!-- Mega Category Menu Start -->
                                                <ul class="category-mega-menu">
                                                    <li class="menu-item-has-children">
                                                        <a href="shop-grid-left-sidebar.html">Smartphone</a>
                                                        <ul>
                                                            <li><a href="shop-grid-left-sidebar.html">Samsome</a></li>
                                                            <li><a href="shop-grid-left-sidebar.html">GL Stylus</a></li>
                                                            <li><a href="shop-grid-left-sidebar.html">Uawei</a></li>
                                                            <li><a href="shop-grid-left-sidebar.html">Cherry Berry</a>
                                                            </li>
                                                        </ul>
                                                    </li>
                                                    <li class="menu-item-has-children">
                                                        <a href="shop-grid-left-sidebar.html">headphone</a>
                                                        <ul>
                                                            <li><a href="shop-grid-left-sidebar.html">Desktop
                                                                    Headphone</a></li>
                                                            <li><a href="shop-grid-left-sidebar.html">Mobile
                                                                    Headphone</a></li>
                                                            <li><a href="shop-grid-left-sidebar.html">Wireless
                                                                    Headphone</a></li>
                                                            <li><a href="shop-grid-left-sidebar.html">LED Headphone</a>
                                                            </li>
                                                        </ul>
                                                    </li>
                                                    <li class="menu-item-has-children">
                                                        <a href="shop-grid-left-sidebar.html">accessories</a>
                                                        <ul>
                                                            <li><a href="shop-grid-left-sidebar.html">Power Bank</a>
                                                            </li>
                                                            <li><a href="shop-grid-left-sidebar.html">Data Cable</a>
                                                            </li>
                                                            <li><a href="shop-grid-left-sidebar.html">Power Cable</a>
                                                            </li>
                                                            <li><a href="shop-grid-left-sidebar.html">Battery</a></li>
                                                        </ul>
                                                    </li>
                                                    <li class="menu-item-has-children">
                                                        <a href="shop-grid-left-sidebar.html">headphone</a>
                                                        <ul>
                                                            <li><a href="shop-grid-left-sidebar.html">Desktop
                                                                    Headphone</a></li>
                                                            <li><a href="shop-grid-left-sidebar.html">Mobile
                                                                    Headphone</a></li>
                                                            <li><a href="shop-grid-left-sidebar.html">Wireless
                                                                    Headphone</a></li>
                                                            <li><a href="shop-grid-left-sidebar.html">LED Headphone</a>
                                                            </li>
                                                        </ul>
                                                    </li>
                                                </ul><!-- Mega Category Menu End -->
                                            </li>
                                            <li class="menu-item-has-children"><a href="shop-grid-left-sidebar.html"><i
                                                        class="fa fa-book"></i> smart phones</a>
                                                <!-- Mega Category Menu Start -->
                                                <ul class="category-mega-menu">
                                                    <li class="menu-item-has-children">
                                                        <a href="shop-grid-left-sidebar.html">Smartphone</a>
                                                        <ul>
                                                            <li><a href="shop-grid-left-sidebar.html">Samsome</a></li>
                                                            <li><a href="shop-grid-left-sidebar.html">GL Stylus</a></li>
                                                            <li><a href="shop-grid-left-sidebar.html">Uawei</a></li>
                                                            <li><a href="shop-grid-left-sidebar.html">Cherry Berry</a>
                                                            </li>
                                                            <li><a href="shop-grid-left-sidebar.html">uPhone</a></li>
                                                        </ul>
                                                    </li>
                                                    <li class="menu-item-has-children">
                                                        <a href="shop-grid-left-sidebar.html">headphone</a>
                                                        <ul>
                                                            <li><a href="shop-grid-left-sidebar.html">Desktop
                                                                    Headphone</a></li>
                                                            <li><a href="shop-grid-left-sidebar.html">Mobile
                                                                    Headphone</a></li>
                                                            <li><a href="shop-grid-left-sidebar.html">Wireless
                                                                    Headphone</a></li>
                                                            <li><a href="shop-grid-left-sidebar.html">LED Headphone</a>
                                                            </li>
                                                            <li><a href="shop-grid-left-sidebar.html">Over-ear</a></li>
                                                        </ul>
                                                    </li>
                                                    <li class="menu-item-has-children">
                                                        <a href="shop-grid-left-sidebar.html">accessories</a>
                                                        <ul>
                                                            <li><a href="shop-grid-left-sidebar.html">Power Bank</a>
                                                            </li>
                                                            <li><a href="shop-grid-left-sidebar.html">Data Cable</a>
                                                            </li>
                                                            <li><a href="shop-grid-left-sidebar.html">Power Cable</a>
                                                            </li>
                                                            <li><a href="shop-grid-left-sidebar.html">Battery</a></li>
                                                            <li><a href="shop-grid-left-sidebar.html">OTG Cable</a></li>
                                                        </ul>
                                                    </li>
                                                    <li class="menu-item-has-children">
                                                        <a href="shop-grid-left-sidebar.html">accessories</a>
                                                        <ul>
                                                            <li><a href="shop-grid-left-sidebar.html">Power Bank</a>
                                                            </li>
                                                            <li><a href="shop-grid-left-sidebar.html">Data Cable</a>
                                                            </li>
                                                            <li><a href="shop-grid-left-sidebar.html">Power Cable</a>
                                                            </li>
                                                            <li><a href="shop-grid-left-sidebar.html">Battery</a></li>
                                                            <li><a href="shop-grid-left-sidebar.html">OTG Cable</a></li>
                                                        </ul>
                                                    </li>
                                                </ul><!-- Mega Category Menu End -->
                                            </li>
                                            <li><a href="shop-grid-left-sidebar.html"><i class="fa fa-clock-o"></i>
                                                    watch</a></li>
                                            <li><a href="shop-grid-left-sidebar.html"><i class="fa fa-television"></i>
                                                    electronic</a></li>
                                            <li><a href="shop-grid-left-sidebar.html"><i class="fa fa-tablet"></i>
                                                    tablet</a></li>
                                            <li><a href="shop-grid-left-sidebar.html"><i class="fa fa-book"></i>
                                                    books</a></li>
                                            <li><a href="shop-grid-left-sidebar.html"><i class="fa fa-microchip"></i>
                                                    microchip</a></li>
                                            <li><a href="shop-grid-left-sidebar.html"><i class="fa fa-bullhorn"></i>
                                                    bullhorn</a></li> --}}
                                        </ul>
                                    </nav>
                                </div>
                                <div class="main-menu">
                                    <nav id="mobile-menu">
                                        <ul>
                                            <li class="active"><a href="{{ url('/') }}"><i
                                                        class="fa fa-home"></i>Home</a>
                                            </li>
                                            <li class="static"><a href="{{ url('about-us') }}">About Us</a>
                                            </li>
                                            <li><a href="{{ url('newfeeds') }}">New Feed</a>
                                            <li><a href="#">Products <i class="fa fa-angle-down"></i></a>
                                                <ul class="dropdown">
                                                    <li><a href="{{ url('shop') }}">Shop</a></li>
                                                    <li><a href="{{ url('zamidar') }}">For Sale</a></li>

                                                </ul>
                                            </li>
                                            <li><a href="{{ url('blog') }}">Blog</a>
                                            </li>
                                            <li><a href="{{ url('contact-us') }}">Contact us</a></li>
                                            <li class="static"><a href="#">Calendar <i
                                                        class="fa fa-angle-down"></i></a>
                                                <ul class="megamenu dropdown" style="right:0px; width:70%;">
                                                    <div id="calendar-converter" style="margin-left:25px;">
                                                    </div>
                                                </ul>
                                            </li>

                                        </ul>
                                    </nav>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 d-block d-lg-none">
                            <div class="mobile-menu"></div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- main menu area end -->

        </header>
        <!-- header area end -->
        @yield('content')

        <!-- brand area start -->
        <div class="brand-area pt-34 pb-30">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="section-title mb-30">
                            <div class="title-icon">
                                <i class="fa fa-crop"></i>
                            </div>
                            <h3>Popular Brand</h3>
                        </div> <!-- section title end -->
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="brand-active slick-padding slick-arrow-style">
                            @foreach ($brand as $item)
                                <div class="brand-item text-center">
                                    <a href="#"><img src="{{ asset($item->image ?? '') }}" alt=""></a>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- brand area end -->
        <!-- footer area start -->
        <footer>
            <!-- footer top start -->
            <div class="footer-top bg-black pt-14 pb-14">
                <div class="container">
                    <div class="footer-top-wrapper">
                        <div class="newsletter__wrap">
                            <div class="newsletter__title">
                                <div class="newsletter__icon">
                                    <i class="fa fa-envelope"></i>
                                </div>
                                <div class="newsletter__content">
                                    <h3>sign up for newsletter</h3>
                                    <p>Duis autem vel eum iriureDuis autem vel eum</p>
                                </div>
                            </div>
                            <div class="newsletter__box">
                                {!! $errors->first('email', "<span class='text-danger'>:message</span>") !!}
                                <form action="{{ route('newsletter') }}" method="POST">
                                    @csrf

                                    <input type="email" name="email" autocomplete="off" placeholder="Email"
                                        required>
                                    <button type="submit" id="mc-submit">subscribe!</button>

                                </form>
                            </div>
                            <!-- mailchimp-alerts Start -->
                            <div class="mailchimp-alerts">
                                <div class="mailchimp-submitting"></div><!-- mailchimp-submitting end -->
                                <div class="mailchimp-success"></div><!-- mailchimp-success end -->
                                <div class="mailchimp-error"></div><!-- mailchimp-error end -->
                            </div>
                            <!-- mailchimp-alerts end -->
                        </div>
                        <div class="social-icons">
                            @foreach ($media as $item)
                                <a href="{{ $item->link ?? '' }}" data-toggle="tooltip" data-placement="top"
                                    title="{{ $item->name ?? '' }}"><i class="{{ $item->icon ?? '' }}"></i></a>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            <!-- footer top end -->

            <!-- footer main start -->
            <div class="footer-widget-area pt-40 pb-38 pb-sm-10">
                <div class="container">
                    <div class="row">
                        <div class="col-md-3 col-sm-6">
                            <div class="footer-widget mb-sm-30">
                                <div class="widget-title mb-10 mb-sm-6">
                                    <h4>contact us</h4>
                                </div>
                                <div class="widget-body">
                                    <ul class="location">
                                        <li><i class="fa fa-envelope"></i>{{ $data['#email']['heading'] ?? '' }}</li>
                                        <li><i class="fa fa-phone"></i>{{ $data['#phone']['heading'] ?? '' }}</li>
                                        <li><i class="fa fa-map-marker"></i>Address:
                                            {{ $data['#address']['heading'] ?? '' }}</li>
                                    </ul>
                                </div>
                            </div> <!-- single widget end -->
                        </div> <!-- single widget column end -->
                        <div class="col-md-3 col-sm-6">
                            <div class="footer-widget mb-sm-30">
                                <div class="widget-title mb-10 mb-sm-6">
                                    <h4>my account</h4>
                                </div>
                                <div class="widget-body">
                                    <ul>
                                        @auth
                                            @if (Auth()->user()->is_admin)
                                                <li><a href="{{ url('admin/admin') }}">Admin Panel</a></li>
                                            @else
                                                <li><a href="{{ url('dashboard') }}">Dashboard</a></li>
                                            @endif
                                        @else
                                            <li><a href="{{ route('login') }}">Login</a></li>
                                            <li><a href="{{ route('register') }}">Signup</a></li>
                                        @endauth
                                        <li><a href="{{ url('faq') }}">FAQ's</a></li>
                                        <li><a href="{{ url('term') }}">Terms & Conditions</a></li>
                                    </ul>
                                </div>
                            </div> <!-- single widget end -->
                        </div> <!-- single widget column end -->
                        <div class="col-md-3 col-sm-6">
                            <div class="footer-widget mb-sm-30">
                                <div class="widget-title mb-10 mb-sm-6">
                                    <h4>Links</h4>
                                </div>
                                <div class="widget-body">
                                    <ul>
                                        <li><a href="{{ url('home') }}">Home</a></li>
                                        <li><a href="{{ url('about-us') }}">about Us</a></li>
                                        <li><a href="{{ url('contact-us') }}">Contact us</a></li>
                                        <li><a href="{{ url('blog') }}">Blogs</a></li>
                                        <li><a href="{{ url('package') }}">Packages</a></li>
                                    </ul>
                                </div>
                            </div> <!-- single widget end -->
                        </div> <!-- single widget column end -->
                        <div class="col-md-3 col-sm-6">
                            <div class="footer-widget mb-sm-30">
                                <div class="widget-title mb-10 mb-sm-6">
                                    <h4>Other Links</h4>
                                </div>
                                <div class="widget-body">
                                    <ul>
                                        <li><a href="{{ url('shop') }}">Products</a></li>
                                        <li><a href="{{ url('zamidar') }}">For Sale</a></li>
                                        <li><a href="{{ url('sell') }}">Sell</a></li>
                                        <li><a href="{{ url('newfeeds') }}">New Feed</a></li>
                                    </ul>
                                </div>
                            </div> <!-- single widget end -->
                        </div> <!-- single widget column end -->
                    </div>
                </div>
            </div>
            <!-- footer main end -->

            <!-- footer bootom start -->
            <div class="footer-bottom-area bg-gray pt-20 pb-20">
                <div class="container">
                    <div class="footer-bottom-wrap">
                        <div class="copyright-text">
                            <p>Develope by <a target="_blank" href="http://redbrickssolution.com/">Red Bricks
                                    Solution</a></p>
                        </div>
                        <div class="payment-method-img">
                            <img src="{{ asset('assets/img/payment.png') }}" alt="">
                        </div>
                    </div>
                </div>
            </div>
            <!-- footer bootom end -->

        </footer>
        <!-- footer area end -->

    </div>

    <!-- Scroll to top start -->
    <div class="scroll-top not-visible">
        <i class="fa fa-angle-up"></i>
    </div>
    <!-- Scroll to Top End -->



    <!--All jQuery, Third Party Plugins & Activation (main.js) Files-->
    <script src="{{ asset('assets/js/vendor/modernizr-3.6.0.min.js') }}"></script>
    <!-- Jquery Min Js -->
    <script src="{{ asset('assets/js/vendor/jquery-3.3.1.min.js') }}"></script>
    <!-- Popper Min Js -->
    <script src="{{ asset('assets/js/vendor/popper.min.js') }}"></script>
    <!-- Bootstrap Min Js -->
    <script src="{{ asset('assets/js/vendor/bootstrap.min.js') }}"></script>
    <!-- Plugins Js-->
    <script src="{{ asset('assets/js/plugins.js') }}"></script>
    <!-- Ajax Mail Js -->
    <script src="{{ asset('assets/js/ajax-mail.js') }}"></script>
    <!-- Active Js -->
    <script src="{{ asset('assets/js/main.js') }}"></script>
    <!-- Switcher JS [Please Remove this when Choose your Final Projct] -->
    <script src="{{ asset('assets/js/switcher.js') }}"></script>
    <script src="{{ asset('assets_data/bundles/select2/dist/js/select2.full.min.js') }}"></script>
    <script type="text/javascript" src="https://ZulNs.github.io/libs/hijri-date.js"></script>
    <script type="text/javascript" src="https://ZulNs.github.io/libs/calendar.js"></script>

    <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-62b2b574b5b86e45"></script>
    <script>
        function sendMarkRequest(id = null) {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            return $.ajax("{{ url('mark-as-read') }}", {
                method: 'POST',
                data: {
                    _token:$('meta[name="csrf-token"]').attr('content'),
                    id
                }
            });
        }
        $(function() {
            $('.mark-as-read').click(function() {
                let request = sendMarkRequest($(this).data('id'));
                request.done(() => {
                    $(this).parents('div.notification').remove();
                });
            });
            $('#mark-all').click(function() {
                let request = sendMarkRequest();
                request.done(() => {
                    $('div.notification').remove();
                })
            });
        });
        </script>
    <script>
        var cal1 = new Calendar(false, 1, false, true),
            cal2 = new Calendar(true, 0, false, true),
            cal1Mode = cal1.isHijriMode(),
            cal2Mode = cal2.isHijriMode();
        document.getElementById("calendar-converter").appendChild(cal1.getElement());
        document.getElementById("calendar-converter").appendChild(cal2.getElement());
        cal1.setDisplayStyle("inline-block");
        cal2.setDisplayStyle("inline-block");
        cal2.getElement().style.marginLeft = "20px";
        cal1.show();
        cal2.show();

        cal1.callback = function() {
            if (cal1Mode !== cal1.isHijriMode()) {
                cal2.disableCallback(true);
                cal2.changeDateMode();
                cal2.disableCallback(false);
                cal1Mode = cal1.isHijriMode();
                cal2Mode = cal2.isHijriMode();
            } else cal2.setTime(cal1.getTime());
        };

        cal2.callback = function() {
            if (cal2Mode !== cal2.isHijriMode()) {
                cal1.disableCallback(true);
                cal1.changeDateMode();
                cal1.disableCallback(false);
                cal1Mode = cal1.isHijriMode();
                cal2Mode = cal2.isHijriMode();
            } else cal1.setTime(cal2.getTime());
        };

        cal1.onHide = function() {
            cal1.show();
        };

        cal2.onHide = function() {
            cal2.show();
        };
    </script>
    @yield('script')
</body>

</html>

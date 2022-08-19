@php
$data = content();
$notifications = notification();
@endphp
<!DOCTYPE html>
<html lang="en">


<!-- export-table.html  21 Nov 2019 03:55:25 GMT -->

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>Arti Dashboard</title>
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <!-- General CSS Files -->
    <link rel="stylesheet" href="{{ asset('assets_data/css/app.min.css') }}">
    <!-- Template CSS -->
    <link rel="stylesheet" href="{{ asset('assets_data/bundles/datatables/datatables.min.css') }}">
    <link rel="stylesheet"
        href="{{ asset('assets_data/bundles/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets_data/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets_data/css/components.css') }}">
    <link rel="stylesheet" href="{{ asset('assets_data/bundles/bootstrap-tagsinput/dist/bootstrap-tagsinput.css') }}">
    <!-- Custom style CSS -->
    <link rel="stylesheet" href="{{ asset('assets_data/css/custom.css') }}">

    <link rel="stylesheet" href="{{ asset('assets_data/bundles/bootstrap-daterangepicker/daterangepicker.css') }}">
    <link rel="stylesheet"
        href="{{ asset('assets_data/bundles/bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets_data/bundles/select2/dist/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets_data/bundles/jquery-selectric/selectric.css') }}">
    <link rel="stylesheet"
        href="{{ asset('assets_data/bundles/bootstrap-timepicker/css/bootstrap-timepicker.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets_data/bundles/bootstrap-tagsinput/dist/bootstrap-tagsinput.css') }}">
    <link rel="stylesheet" href="{{ asset('assets_data/bundles/summernote/summernote-bs4.css') }}">
    <link rel="stylesheet" href="{{ asset('assets_data/bundles/codemirror/lib/codemirror.css') }}">
    <link rel="stylesheet" href="{{ asset('assets_data/bundles/codemirror/theme/duotone-dark.css') }}">
    <link rel='shortcut icon' type='image/x-icon' href="{{ asset('assets_data/img/favicon.ico') }}" />

    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <link href="//cdnjs.cloudflare.com/ajax/libs/x-editable/1.5.0/jquery-editable/css/jquery-editable.css"
        rel="stylesheet" />
    <script>
        $.fn.poshytip = {
            defaults: null
        }
    </script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/x-editable/1.5.0/jquery-editable/js/jquery-editable-poshytip.min.js">
    </script>

    @yield('style')
</head>

<body>
    <div class="loader"></div>
    <div id="app">
        <div class="main-wrapper main-wrapper-1">
            <div class="navbar-bg"></div>
            <nav class="navbar navbar-expand-lg main-navbar sticky">
                <div class="form-inline mr-auto">
                    <ul class="navbar-nav mr-3">
                        <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg
									collapse-btn">
                                <i data-feather="align-justify"></i></a></li>
                        <li><a href="#" class="nav-link nav-link-lg fullscreen-btn">
                                <i data-feather="maximize"></i>
                            </a></li>
                        <li>
                            <form class="form-inline mr-auto">
                                <div class="search-element">
                                    <input class="form-control" type="search" placeholder="Search" aria-label="Search"
                                        data-width="200">
                                    <button class="btn" type="submit">
                                        <i class="fas fa-search"></i>
                                    </button>
                                </div>
                            </form>
                        </li>
                    </ul>
                </div>
                <ul class="navbar-nav navbar-right">
                    <li class="dropdown dropdown-list-toggle"><a href="#" data-toggle="dropdown"
                            class="nav-link nav-link-lg message-toggle"><i data-feather="mail"></i>
                            <span class="badge headerBadge1">
                                6 </span> </a>
                        <div class="dropdown-menu dropdown-list dropdown-menu-right pullDown">
                            <div class="dropdown-header">
                                Messages
                                <div class="float-right">
                                    <a href="#">Mark All As Read</a>
                                </div>
                            </div>
                            <div class="dropdown-list-content dropdown-list-message">
                                <a href="#" class="dropdown-item"> <span
                                        class="dropdown-item-avatar
											text-white"> <img alt="image"
                                            src="{{ asset('assets_data/img/users/user-1.png') }}"
                                            class="rounded-circle">
                                    </span> <span class="dropdown-item-desc"> <span class="message-user">John
                                            Deo</span>
                                        <span class="time messege-text">Please check your mail !!</span>
                                        <span class="time">2 Min Ago</span>
                                    </span>
                                </a> <a href="#" class="dropdown-item"> <span
                                        class="dropdown-item-avatar text-white">
                                        <img alt="image" src="{{ asset('assets_data/img/users/user-2.png') }}"
                                            class="rounded-circle">
                                    </span> <span class="dropdown-item-desc"> <span class="message-user">Sarah
                                            Smith</span> <span class="time messege-text">Request for leave
                                            application</span>
                                        <span class="time">5 Min Ago</span>
                                    </span>
                                </a> <a href="#" class="dropdown-item"> <span
                                        class="dropdown-item-avatar text-white">
                                        <img alt="image" src="{{ asset('assets_data/img/users/user-5.png') }}"
                                            class="rounded-circle">
                                    </span> <span class="dropdown-item-desc"> <span class="message-user">Jacob
                                            Ryan</span> <span class="time messege-text">Your payment invoice is
                                            generated.</span> <span class="time">12 Min Ago</span>
                                    </span>
                                </a> <a href="#" class="dropdown-item"> <span
                                        class="dropdown-item-avatar text-white">
                                        <img alt="image" src="{{ asset('assets_data/img/users/user-4.png') }}"
                                            class="rounded-circle">
                                    </span> <span class="dropdown-item-desc"> <span class="message-user">Lina
                                            Smith</span> <span class="time messege-text">hii John, I have upload
                                            doc
                                            related to task.</span> <span class="time">30
                                            Min Ago</span>
                                    </span>
                                </a> <a href="#" class="dropdown-item"> <span
                                        class="dropdown-item-avatar text-white">
                                        <img alt="image" src="{{ asset('assets_data/img/users/user-3.png') }}"
                                            class="rounded-circle">
                                    </span> <span class="dropdown-item-desc"> <span class="message-user">Jalpa
                                            Joshi</span> <span class="time messege-text">Please do as specify.
                                            Let me
                                            know if you have any query.</span> <span class="time">1
                                            Days Ago</span>
                                    </span>
                                </a> <a href="#" class="dropdown-item"> <span
                                        class="dropdown-item-avatar text-white">
                                        <img alt="image" src="{{ asset('assets_data/img/users/user-2.png') }}"
                                            class="rounded-circle">
                                    </span> <span class="dropdown-item-desc"> <span class="message-user">Sarah
                                            Smith</span> <span class="time messege-text">Client Requirements</span>
                                        <span class="time">2 Days Ago</span>
                                    </span>
                                </a>
                            </div>
                            <div class="dropdown-footer text-center">
                                <a href="#">View All <i class="fas fa-chevron-right"></i></a>
                            </div>
                        </div>
                    </li>
                    <li class="dropdown dropdown-list-toggle"><a href="#" data-toggle="dropdown"
                            class="nav-link  message-toggle nav-link-lg"><i data-feather="bell"
                                class="bell"></i>@if($notifications->count()>0)<span class="badge headerBadge1" style="border-radius: 50%;
                                height: 11px;
                                background: red;"></span>
                                     @endif  </a>
                        </a>
                        <div class="dropdown-menu dropdown-list dropdown-menu-right pullDown">
                            <div class="dropdown-header">
                                Notifications
                                <div class="float-right">
                                    <a href="#" id="mark-all">Mark All As Read</a>
                                </div>
                            </div>
                            <div class="dropdown-list-content dropdown-list-icons">
                                @if (auth()->user()->is_admin)
                                    @foreach ($notifications as $notification)
                                    <div class="alert">
                                        <a href="#" class="dropdown-item dropdown-item-unread  mark-as-read"  data-id="{{ $notification->id??'' }}"> <span
                                                class="dropdown-item-icon bg-primary text-white"> <i
                                                    class="fas
												fa-bell"></i>
                                            </span> <span class="dropdown-item-desc">New User
                                                {{ $notification->data['name'] }} ({{ $notification->data['email'] }})
                                                registered.
                                                <span
                                                    class="time">{{ $notification->created_at->diffForHumans() }}</span>
                                            </span>
                                        </a>
                                    </div>
                                    @endforeach
                                @if($notifications->count()==0)
                                    <a href="#" class="dropdown-item dropdown-item-unread">
                                        <span class="dropdown-item-desc">No Notification found
                                        </span>
                                    </a>
                                @endif
                            @endif
                        </div>
                        {{-- <div class="dropdown-footer text-center">
                            <a href="#">View All <i class="fas fa-chevron-right"></i></a>
                        </div> --}}
                    </div>
                </li>
                <li class="dropdown"><a href="#" data-toggle="dropdown"
                        class="nav-link dropdown-toggle nav-link-lg nav-link-user has-dropdown"> <img
                            alt="image" src="{{ asset(Auth()->user()->image ?? 'assets_data/img/user.png') }}"
                            class="user-img-radious-style"><i class="fas fa-angle-down"
                            style="color:#000; padding:5px; margin-top:-7px;"></i></a>
                    <div class="dropdown-menu dropdown-menu-right pullDown">
                        <div class="dropdown-title">Hello {{ Auth()->user()->username }}</div>
                        <a @if (Auth()->user()->is_admin) href="{{ url('admin/profile') }}" @else href="{{ url('profile') }}" @endif
                            class="dropdown-item has-icon"> <i class="far
										fa-user"></i> Edit Profile
                        </a>
                        {{-- <a href="timeline.html" class="dropdown-item has-icon"> <i
                                    class="fas fa-bolt"></i>
                                Activities
                            </a> --}}
                        <a href="#" class="dropdown-item has-icon"> <i class="fas fa-cog"></i>
                            Settings
                        </a>
                        <div class="dropdown-divider"></div>
                        {{-- <a href="auth-login.html" class="dropdown-item has-icon text-danger"> <i
                                    class="fas fa-sign-out-alt"></i>
                                Logout
                            </a> --}}
                        <a class="dropdown-item has-icon text-danger" href="javascript:void(0);"
                            onclick="event.preventDefault();document.getElementById('logout-form').submit();"><span
                                class="ms-2"><i class="fas fa-sign-out-alt"></i>
                                Logout </span></a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST"
                            style="display: none;">
                            @csrf
                        </form>
                    </div>
                </li>
            </ul>
        </nav>
        <div class="main-sidebar sidebar-style-2">
            <aside id="sidebar-wrapper">
                <div class="sidebar-brand">
                    <a
                        @if (auth()->user()->is_admin) href="{{ route('admin.home') }}" @else href="{{ route('client.home') }}" @endif>
                        <img alt="image" src="{{ asset($data['#logo']['image'] ?? 'Images/logo2.png') }}"
                            style="height: 60px;" class="header-logo" />

                        {{-- <span class="logo-name">Subzi Mandi</span> --}}
                    </a>
                </div>
                <ul class="sidebar-menu">
                    <li class="menu-header">Main</li>
                    <li class="dropdown">
                        <a @if (auth()->user()->is_admin) href="{{ route('admin.home') }}" @else href="{{ route('client.home') }}" @endif
                            class="nav-link"><i data-feather="monitor"></i><span>Dashboard</span></a>
                    </li>
                    <li class="dropdown">
                        <a href="{{ route('/') }}" class="nav-link"><i data-feather="monitor"></i><span>Home
                                Page</span></a>
                    </li>
                    @can('user_management_access')
                        <li class="dropdown">
                            <a href="#" class='menu-toggle nav-link has-dropdown'><i data-feather="user"></i>
                                <span>Users Management</span> </a>
                            <ul class="dropdown-menu ">
                                <li class="nav-link "> <a href="/admin/permissions">Permissions</a> </li>
                                <li class="nav-link "> <a href="/admin/roles">Roles</a> </li>
                                <li class="nav-link "> <a href="/admin/users">Users</a> </li>

                            </ul>
                        </li>
                        @endif
                        @can('category_access')
                            <li class="dropdown">
                                <a href="{{ url('admin/category') }}" class="nav-link"><i
                                        data-feather="monitor"></i><span>Categories</span></a>
                            </li>
                        @endcan
                        @can('product_access')
                            <li class="dropdown">
                                <a href="{{ url('admin/product') }}" class="nav-link"><i
                                        data-feather="monitor"></i><span>Products</span></a>
                            </li>
                        @endcan

                        @can('user_product_access')
                            <li class="dropdown">
                                <a href="{{ url('user-product') }}" class="nav-link"><i
                                        data-feather="monitor"></i><span>Add Products</span></a>
                            </li>
                        @endcan
                        @can('product_image_access')
                            <li class="dropdown">
                                <a href="{{ url('admin/product-image') }}" class="nav-link"><i
                                        data-feather="monitor"></i><span>Product Images</span></a>
                            </li>
                        @endcan
                        @can('user_product_access')
                            <li class="dropdown">
                                <a href="{{ route('client.user-product.edit', Auth()->user()->id) }}" class="nav-link"><i
                                        data-feather="monitor"></i><span>Edit Products</span></a>
                            </li>
                        @endcan
                        @can('forsale_product_access')
                            <li class="dropdown">
                                <a href="{{ url('forsale') }}" class="nav-link"><i data-feather="monitor"></i><span>For
                                        Sale Products</span></a>
                            </li>
                        @endcan
                        @can('user_product_post_access')
                            <li class="dropdown">
                                <a href="{{ url('post') }}" class="nav-link"><i
                                        data-feather="monitor"></i><span>Delete Post</span></a>
                            </li>
                        @endcan
                        @can('user_product_post_access')
                            <li class="dropdown">
                                <a href="{{ url('arti-detail/' . Auth()->user()->id) }}" class="nav-link"><i
                                        data-feather="monitor"></i><span>Profile</span></a>
                            </li>
                        @endcan
                        @can('user_gallery_access')
                            <li class="dropdown">
                                <a href="{{ url('user-gallery') }}" class="nav-link"><i
                                        data-feather="monitor"></i><span>Gallery</span></a>
                            </li>
                        @endcan
                        @can('user_video_access')
                            <li class="dropdown">
                                <a href="{{ url('user-video') }}" class="nav-link"><i
                                        data-feather="monitor"></i><span>Videos</span></a>
                            </li>
                        @endcan
                        @if (!Auth()->user()->is_Admin)
                            <li class="dropdown">
                                <a href="{{ url('package') }}" class="nav-link"><i
                                        data-feather="monitor"></i><span>Packages</span></a>
                            </li>
                        @endif
                        @can('video_access')
                            <li class="dropdown">
                                <a href="{{ url('admin/video') }}" class="nav-link"><i
                                        data-feather="monitor"></i><span>Videos</span></a>
                            </li>
                        @endcan
                        @can('admin_user_product_access')
                            <li class="dropdown">
                                <a href="{{ url('admin/user-product') }}" class="nav-link"><i
                                        data-feather="monitor"></i><span>Arti Products</span></a>
                            </li>
                        @endcan
                        @can('arti_post_access')
                            <li class="dropdown">
                                <a href="{{ url('admin/arti-post') }}" class="nav-link"><i
                                        data-feather="monitor"></i><span>Arti Posts</span></a>
                            </li>
                        @endcan
                        @can('admin_user_gallery_access')
                            <li class="dropdown">
                                <a href="{{ url('admin/user-gallery') }}" class="nav-link"><i
                                        data-feather="monitor"></i><span>Arti Gallery</span></a>
                            </li>
                        @endcan
                        @can('admin_user_video_access')
                            <li class="dropdown">
                                <a href="{{ url('admin/user-video') }}" class="nav-link"><i
                                        data-feather="monitor"></i><span>Arti Videos</span></a>
                            </li>
                        @endcan
                        @can('setting_access')
                            <li class="dropdown">
                                <a href="#" class='menu-toggle nav-link has-dropdown'> <i
                                        data-feather="shield"></i> <span>Settings</span> </a>
                                <ul class="dropdown-menu ">
                                    @can('content_access')
                                        <li class="nav-link "> <a href="/admin/content">Website Content</a> </li>
                                    @endcan
                                    @can('package_access')
                                        <li class="nav-link "> <a href="/admin/package">Packages</a> </li>
                                    @endcan
                                    @can('package_history_access')
                                        <li class="nav-link "> <a href="/admin/package-history">Package Histories</a> </li>
                                    @endcan
                                    @can('contact_access')
                                        <li class="nav-link "> <a href="/admin/contact">Contact Mail</a> </li>
                                    @endcan
                                    @can('review_access')
                                        <li class="nav-link "> <a href="/admin/review">Review</a> </li>
                                    @endcan
                                    @can('slider_access')
                                        <li class="nav-link "> <a href="/admin/slider">Slider</a> </li>
                                    @endcan
                                    @can('blog_access')
                                        <li class="nav-link "> <a href="/admin/blog">Blogs</a> </li>
                                    @endcan
                                    @can('district_access')
                                        <li class="nav-link "> <a href="{{ url('admin/district') }}">District</a> </li>
                                    @endcan
                                    @can('tehsil_access')
                                        <li class="nav-link "> <a href="{{ url('admin/tehsil') }}">Tehsil</a> </li>
                                    @endcan
                                    @can('brand_access')
                                        <li class="nav-link "> <a href="/admin/brand">Brand</a> </li>
                                    @endcan
                                    @can('media_access')
                                        <li class="nav-link "> <a href="/admin/media">Social Media</a> </li>
                                    @endcan
                                    @can('faq_access')
                                        <li class="nav-link "> <a href="/admin/faq">FAQ's</a> </li>
                                    @endcan
                                    @can('team_access')
                                        <li class="nav-link "> <a href="/admin/team">Team</a> </li>
                                    @endcan
                                    @can('term_access')
                                        <li class="nav-link "> <a href="/admin/term">Term & Conditions</a> </li>
                                    @endcan
                                    @can('newsletter_access')
                                        <li class="nav-link "> <a href="/admin/newsletter">Newsletter</a> </li>
                                    @endcan


                                </ul>
                            </li>
                        @endcan
                        {{-- <li class="dropdown">
                            <a href="#" class="menu-toggle nav-link has-dropdown"><i
                                    data-feather="briefcase"></i><span>Widgets</span></a>
                            <ul class="dropdown-menu">
                                <li><a class="nav-link" href="widget-chart.html">Chart Widgets</a></li>
                                <li><a class="nav-link" href="widget-data.html">Data Widgets</a></li>
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="menu-toggle nav-link has-dropdown"><i
                                    data-feather="command"></i><span>Apps</span></a>
                            <ul class="dropdown-menu">
                                <li><a class="nav-link" href="chat.html">Chat</a></li>
                                <li><a class="nav-link" href="portfolio.html">Portfolio</a></li>
                                <li><a class="nav-link" href="blog.html">Blog</a></li>
                                <li><a class="nav-link" href="calendar.html">Calendar</a></li>
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="menu-toggle nav-link has-dropdown"><i
                                    data-feather="mail"></i><span>Email</span></a>
                            <ul class="dropdown-menu">
                                <li><a class="nav-link" href="email-inbox.html">Inbox</a></li>
                                <li><a class="nav-link" href="email-compose.html">Compose</a></li>
                                <li><a class="nav-link" href="email-read.html">read</a></li>
                            </ul>
                        </li>
                        <li class="menu-header">UI Elements</li>
                        <li class="dropdown">
                            <a href="#" class="menu-toggle nav-link has-dropdown"><i
                                    data-feather="copy"></i><span>Basic
                                    Components</span></a>
                            <ul class="dropdown-menu">
                                <li><a class="nav-link" href="alert.html">Alert</a></li>
                                <li><a class="nav-link" href="badge.html">Badge</a></li>
                                <li><a class="nav-link" href="breadcrumb.html">Breadcrumb</a></li>
                                <li><a class="nav-link" href="buttons.html">Buttons</a></li>
                                <li><a class="nav-link" href="collapse.html">Collapse</a></li>
                                <li><a class="nav-link" href="dropdown.html">Dropdown</a></li>
                                <li><a class="nav-link" href="checkbox-and-radio.html">Checkbox &amp; Radios</a>
                                </li>
                                <li><a class="nav-link" href="list-group.html">List Group</a></li>
                                <li><a class="nav-link" href="media-object.html">Media Object</a></li>
                                <li><a class="nav-link" href="navbar.html">Navbar</a></li>
                                <li><a class="nav-link" href="pagination.html">Pagination</a></li>
                                <li><a class="nav-link" href="popover.html">Popover</a></li>
                                <li><a class="nav-link" href="progress.html">Progress</a></li>
                                <li><a class="nav-link" href="tooltip.html">Tooltip</a></li>
                                <li><a class="nav-link" href="flags.html">Flag</a></li>
                                <li><a class="nav-link" href="typography.html">Typography</a></li>
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="menu-toggle nav-link has-dropdown"><i
                                    data-feather="shopping-bag"></i><span>Advanced</span></a>
                            <ul class="dropdown-menu">
                                <li><a class="nav-link" href="avatar.html">Avatar</a></li>
                                <li><a class="nav-link" href="card.html">Card</a></li>
                                <li><a class="nav-link" href="modal.html">Modal</a></li>
                                <li><a class="nav-link" href="sweet-alert.html">Sweet Alert</a></li>
                                <li><a class="nav-link" href="toastr.html">Toastr</a></li>
                                <li><a class="nav-link" href="empty-state.html">Empty State</a></li>
                                <li><a class="nav-link" href="multiple-upload.html">Multiple Upload</a></li>
                                <li><a class="nav-link" href="pricing.html">Pricing</a></li>
                                <li><a class="nav-link" href="tabs.html">Tab</a></li>
                            </ul>
                        </li>
                        <li><a class="nav-link" href="blank.html"><i data-feather="file"></i><span>Blank
                                    Page</span></a></li>
                        <li class="menu-header">Otika</li>
                        <li class="dropdown">
                            <a href="#" class="menu-toggle nav-link has-dropdown"><i
                                    data-feather="layout"></i><span>Forms</span></a>
                            <ul class="dropdown-menu">
                                <li><a class="nav-link" href="basic-form.html">Basic Form</a></li>
                                <li><a class="nav-link" href="forms-advanced-form.html">Advanced Form</a></li>
                                <li><a class="nav-link" href="forms-editor.html">Editor</a></li>
                                <li><a class="nav-link" href="forms-validation.html">Validation</a></li>
                                <li><a class="nav-link" href="form-wizard.html">Form Wizard</a></li>
                            </ul>
                        </li>
                        <li class="dropdown active">
                            <a href="#" class="menu-toggle nav-link has-dropdown"><i
                                    data-feather="grid"></i><span>Tables</span></a>
                            <ul class="dropdown-menu">
                                <li><a class="nav-link" href="basic-table.html">Basic Tables</a></li>
                                <li><a class="nav-link" href="advance-table.html">Advanced Table</a></li>
                                <li><a class="nav-link" href="datatables.html">Datatable</a></li>
                                <li class="active"><a class="nav-link" href="export-table.html">Export
                                        Table</a></li>
                                <li><a class="nav-link" href="editable-table.html">Editable Table</a></li>
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="menu-toggle nav-link has-dropdown"><i
                                    data-feather="pie-chart"></i><span>Charts</span></a>
                            <ul class="dropdown-menu">
                                <li><a class="nav-link" href="chart-amchart.html">amChart</a></li>
                                <li><a class="nav-link" href="chart-apexchart.html">apexchart</a></li>
                                <li><a class="nav-link" href="chart-echart.html">eChart</a></li>
                                <li><a class="nav-link" href="chart-chartjs.html">Chartjs</a></li>
                                <li><a class="nav-link" href="chart-sparkline.html">Sparkline</a></li>
                                <li><a class="nav-link" href="chart-morris.html">Morris</a></li>
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="menu-toggle nav-link has-dropdown"><i
                                    data-feather="feather"></i><span>Icons</span></a>
                            <ul class="dropdown-menu">
                                <li><a class="nav-link" href="icon-font-awesome.html">Font Awesome</a></li>
                                <li><a class="nav-link" href="icon-material.html">Material Design</a></li>
                                <li><a class="nav-link" href="icon-ionicons.html">Ion Icons</a></li>
                                <li><a class="nav-link" href="icon-feather.html">Feather Icons</a></li>
                                <li><a class="nav-link" href="icon-weather-icon.html">Weather Icon</a></li>
                            </ul>
                        </li>
                        <li class="menu-header">Media</li>
                        <li class="dropdown">
                            <a href="#" class="menu-toggle nav-link has-dropdown"><i
                                    data-feather="image"></i><span>Gallery</span></a>
                            <ul class="dropdown-menu">
                                <li><a class="nav-link" href="light-gallery.html">Light Gallery</a></li>
                                <li><a href="gallery1.html">Gallery 2</a></li>
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="menu-toggle nav-link has-dropdown"><i
                                    data-feather="flag"></i><span>Sliders</span></a>
                            <ul class="dropdown-menu">
                                <li><a href="carousel.html">Bootstrap Carousel.html</a></li>
                                <li><a class="nav-link" href="owl-carousel.html">Owl Carousel</a></li>
                            </ul>
                        </li>
                        <li><a class="nav-link" href="timeline.html"><i
                                    data-feather="sliders"></i><span>Timeline</span></a></li>
                        <li class="menu-header">Maps</li>
                        <li class="dropdown">
                            <a href="#" class="menu-toggle nav-link has-dropdown"><i
                                    data-feather="map"></i><span>Google
                                    Maps</span></a>
                            <ul class="dropdown-menu">
                                <li><a href="gmaps-advanced-route.html">Advanced Route</a></li>
                                <li><a href="gmaps-draggable-marker.html">Draggable Marker</a></li>
                                <li><a href="gmaps-geocoding.html">Geocoding</a></li>
                                <li><a href="gmaps-geolocation.html">Geolocation</a></li>
                                <li><a href="gmaps-marker.html">Marker</a></li>
                                <li><a href="gmaps-multiple-marker.html">Multiple Marker</a></li>
                                <li><a href="gmaps-route.html">Route</a></li>
                                <li><a href="gmaps-simple.html">Simple</a></li>
                            </ul>
                        </li>
                        <li><a class="nav-link" href="vector-map.html"><i data-feather="map-pin"></i><span>Vector
                                    Map</span></a></li>
                        <li class="menu-header">Pages</li>
                        <li class="dropdown">
                            <a href="#" class="menu-toggle nav-link has-dropdown"><i
                                    data-feather="user-check"></i><span>Auth</span></a>
                            <ul class="dropdown-menu">
                                <li><a href="auth-login.html">Login</a></li>
                                <li><a href="auth-register.html">Register</a></li>
                                <li><a href="auth-forgot-password.html">Forgot Password</a></li>
                                <li><a href="auth-reset-password.html">Reset Password</a></li>
                                <li><a href="subscribe.html">Subscribe</a></li>
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="menu-toggle nav-link has-dropdown"><i
                                    data-feather="alert-triangle"></i><span>Errors</span></a>
                            <ul class="dropdown-menu">
                                <li><a class="nav-link" href="errors-503.html">503</a></li>
                                <li><a class="nav-link" href="errors-403.html">403</a></li>
                                <li><a class="nav-link" href="errors-404.html">404</a></li>
                                <li><a class="nav-link" href="errors-500.html">500</a></li>
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="menu-toggle nav-link has-dropdown"><i
                                    data-feather="anchor"></i><span>Other
                                    Pages</span></a>
                            <ul class="dropdown-menu">
                                <li><a class="nav-link" href="create-post.html">Create Post</a></li>
                                <li><a class="nav-link" href="posts.html">Posts</a></li>
                                <li><a class="nav-link" href="profile.html">Profile</a></li>
                                <li><a class="nav-link" href="contact.html">Contact</a></li>
                                <li><a class="nav-link" href="invoice.html">Invoice</a></li>
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="menu-toggle nav-link has-dropdown"><i
                                    data-feather="chevrons-down"></i><span>Multilevel</span></a>
                            <ul class="dropdown-menu">
                                <li><a href="#">Menu 1</a></li>
                                <li class="dropdown">
                                    <a href="#" class="has-dropdown">Menu 2</a>
                                    <ul class="dropdown-menu">
                                        <li><a href="#">Child Menu 1</a></li>
                                        <li class="dropdown">
                                            <a href="#" class="has-dropdown">Child Menu 2</a>
                                            <ul class="dropdown-menu">
                                                <li><a href="#">Child Menu 1</a></li>
                                                <li><a href="#">Child Menu 2</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="#"> Child Menu 3</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </li> --}}
                    </ul>
                </aside>
            </div>
            <!-- Main Content -->

            <div class="main-content">
                @yield('content')
                <div class="settingSidebar">
                    <a href="javascript:void(0)" class="settingPanelToggle"> <i class="fa fa-spin fa-cog"></i>
                    </a>
                    <div class="settingSidebar-body ps-container ps-theme-default">
                        <div class=" fade show active">
                            <div class="setting-panel-header">Setting Panel
                            </div>
                            <div class="p-15 border-bottom">
                                <h6 class="font-medium m-b-10">Select Layout</h6>
                                <div class="selectgroup layout-color w-50">
                                    <label class="selectgroup-item">
                                        <input type="radio" name="value" value="1"
                                            class="selectgroup-input-radio select-layout" checked>
                                        <span class="selectgroup-button">Light</span>
                                    </label>
                                    <label class="selectgroup-item">
                                        <input type="radio" name="value" value="2"
                                            class="selectgroup-input-radio select-layout">
                                        <span class="selectgroup-button">Dark</span>
                                    </label>
                                </div>
                            </div>
                            <div class="p-15 border-bottom">
                                <h6 class="font-medium m-b-10">Sidebar Color</h6>
                                <div class="selectgroup selectgroup-pills sidebar-color">
                                    <label class="selectgroup-item">
                                        <input type="radio" name="icon-input" value="1"
                                            class="selectgroup-input select-sidebar">
                                        <span class="selectgroup-button selectgroup-button-icon" data-toggle="tooltip"
                                            data-original-title="Light Sidebar"><i class="fas fa-sun"></i></span>
                                    </label>
                                    <label class="selectgroup-item">
                                        <input type="radio" name="icon-input" value="2"
                                            class="selectgroup-input select-sidebar" checked>
                                        <span class="selectgroup-button selectgroup-button-icon" data-toggle="tooltip"
                                            data-original-title="Dark Sidebar"><i class="fas fa-moon"></i></span>
                                    </label>
                                </div>
                            </div>
                            <div class="p-15 border-bottom">
                                <h6 class="font-medium m-b-10">Color Theme</h6>
                                <div class="theme-setting-options">
                                    <ul class="choose-theme list-unstyled mb-0">
                                        <li title="white" class="active">
                                            <div class="white"></div>
                                        </li>
                                        <li title="cyan">
                                            <div class="cyan"></div>
                                        </li>
                                        <li title="black">
                                            <div class="black"></div>
                                        </li>
                                        <li title="purple">
                                            <div class="purple"></div>
                                        </li>
                                        <li title="orange">
                                            <div class="orange"></div>
                                        </li>
                                        <li title="green">
                                            <div class="green"></div>
                                        </li>
                                        <li title="red">
                                            <div class="red"></div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="p-15 border-bottom">
                                <div class="theme-setting-options">
                                    <label class="m-b-0">
                                        <input type="checkbox" name="custom-switch-checkbox"
                                            class="custom-switch-input" id="mini_sidebar_setting">
                                        <span class="custom-switch-indicator"></span>
                                        <span class="control-label p-l-10">Mini Sidebar</span>
                                    </label>
                                </div>
                            </div>
                            <div class="p-15 border-bottom">
                                <div class="theme-setting-options">
                                    <label class="m-b-0">
                                        <input type="checkbox" name="custom-switch-checkbox"
                                            class="custom-switch-input" id="sticky_header_setting">
                                        <span class="custom-switch-indicator"></span>
                                        <span class="control-label p-l-10">Sticky Header</span>
                                    </label>
                                </div>
                            </div>
                            <div class="mt-4 mb-4 p-3 align-center rt-sidebar-last-ele">
                                <a href="#" class="btn btn-icon icon-left btn-primary btn-restore-theme">
                                    <i class="fas fa-undo"></i> Restore Default
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <footer class="main-footer">
                <div class="footer-left">
                    Develope by <a href="http://redbrickssolution.com">Red Bricks Solution</a>
                </div>
                <div class="footer-right">
                </div>
            </footer>
        </div>
    </div>
    <!-- General JS Scripts -->
    <script src="{{ asset('assets_data/js/app.min.js') }}"></script>
    <!-- JS Libraies -->
    <!-- Page Specific JS File -->
    <script src="{{ asset('assets_data/bundles/datatables/datatables.min.js') }}"></script>
    <script src="{{ asset('assets_data/bundles/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js') }}">
    </script>
    <script src="{{ asset('assets_data/bundles/datatables/export-tables/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('assets_data/bundles/datatables/export-tables/buttons.flash.min.js') }}"></script>
    <script src="{{ asset('assets_data/bundles/datatables/export-tables/jszip.min.js') }}"></script>
    <script src="{{ asset('assets_data/bundles/datatables/export-tables/pdfmake.min.js') }}"></script>
    <script src="{{ asset('assets_data/bundles/datatables/export-tables/vfs_fonts.js') }}"></script>
    <script src="{{ asset('assets_data/bundles/datatables/export-tables/buttons.print.min.js') }}"></script>
    <script src="{{ asset('assets_data/js/page/datatables.js') }}"></script>

    <script src="{{ asset('assets_data/bundles/cleave-js/dist/cleave.min.js') }}"></script>
    <script src="{{ asset('assets_data/bundles/cleave-js/dist/addons/cleave-phone.us.js') }}"></script>
    <script src="{{ asset('assets_data/bundles/jquery-pwstrength/jquery.pwstrength.min.js') }}"></script>
    <script src="{{ asset('assets_data/bundles/bootstrap-daterangepicker/daterangepicker.js') }}"></script>
    <script src="{{ asset('assets_data/bundles/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js') }}"></script>
    <script src="{{ asset('assets_data/bundles/bootstrap-timepicker/js/bootstrap-timepicker.min.js') }}"></script>
    <script src="{{ asset('assets_data/bundles/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js') }}"></script>
    <script src="{{ asset('assets_data/bundles/select2/dist/js/select2.full.min.js') }}"></script>
    <script src="{{ asset('assets_data/bundles/jquery-selectric/jquery.selectric.min.js') }}"></script>
    <script src="{{ asset('assets_data/bundles/summernote/summernote-bs4.js') }}"></script>
    <script src="{{ asset('assets_data/bundles/codemirror/lib/codemirror.js') }}"></script>
    <script src="{{ asset('assets_data/bundles/codemirror/mode/javascript/javascript.js') }}"></script>
    <script src="{{ asset('assets_data/bundles/ckeditor/ckeditor.js') }}"></script>
    <!-- Page Specific JS File -->
    <script src="{{ asset('js/page/ckeditor.js') }}"></script>
    <!-- Template JS File -->
    <script src="{{ asset('assets_data/js/scripts.js') }}"></script>
    <!-- Custom JS File -->
    <script src="{{ asset('assets_data/js/custom.js') }}"></script>

    <!-- JS Libraies -->
    <script src="{{ asset('assets/bundles/editable-table/mindmup-editabletable.js') }}"></script>
    <!-- Page Specific JS File -->
    <script src="{{ asset('assets/js/page/editable-table.js') }}"></script>
    @if(auth()->user()->is_admin)
    <script>
    function sendMarkRequest(id = null) {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        return $.ajax("{{ route('admin.markNotification') }}", {
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
                $(this).parents('div.alert').remove();
            });
        });
        $('#mark-all').click(function() {
            let request = sendMarkRequest();
            request.done(() => {
                $('div.alert').remove();
            })
        });
    });
    </script>
@endif
    @yield('script')
</body>


<!-- export-table.html  21 Nov 2019 03:56:01 GMT -->

</html>

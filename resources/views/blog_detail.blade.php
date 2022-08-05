@extends('layouts.app')
@section('style')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
        integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        .blog-sharing ul li {
            display: inline-block;
        }
    </style>
@endsection
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
                                <li class="breadcrumb-item active" aria-current="page">blog details</li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb area end -->

    <!-- blog main wrapper start -->
    <div class="blog-main-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 order-2">
                    <div class="blog-sidebar-wrapper mt-md-34 mt-sm-30">
                        <div class="blog-sidebar mb-30">
                            <div class="sidebar-serch-form">
                                <form action="{{url('blog-search')}}" method="GET">
                                    @csrf
                                    <input type="text" name="search" class="search-field" placeholder="search here">
                                    <button type="submit" class="search-btn"><i class="fa fa-search"></i></button>
                                </form>
                            </div>
                        </div> <!-- single sidebar end -->
                        {{-- <div class="blog-sidebar mb-24">
                        <h4 class="title mb-20">categories</h4>
                        <ul class="blog-archive">
                            <li><a href="#">dry food (10)</a></li>
                            <li><a href="#">wet food (08)</a></li>
                            <li><a href="#">reach (07)</a></li>
                            <li><a href="#">organic (14)</a></li>
                            <li><a href="#">capcicum (10)</a></li>
                        </ul>
                    </div> --}}
                        <!-- single sidebar end -->
                        {{-- <div class="blog-sidebar mb-24">
                            <h4 class="title mb-20">Blog Archives</h4>
                            <ul class="blog-archive">
                                <li><a href="#">January (10)</a></li>
                                <li><a href="#">February (08)</a></li>
                                <li><a href="#">March (07)</a></li>
                                <li><a href="#">April (14)</a></li>
                                <li><a href="#">May (10)</a></li>
                            </ul>
                        </div> --}}
                         <!-- single sidebar end -->
                        <div class="blog-sidebar mb-24">
                            <h4 class="title mb-30">recent post</h4>
                            @foreach ($blog->take(3) as $item)
                                <div class="recent-post mb-20">
                                    <div class="recent-post-thumb">
                                        <a href="{{ url('blog-detail/' . $item->id) }}">
                                            <img src="{{ asset($item->image ?? '') }}" alt="">
                                        </a>
                                    </div>
                                    <div class="recent-post-des">
                                        <span><a href="{{ url('blog-detail/' . $item->id) }}">{{ $item->name ?? '' }}</a></span>
                                        <span class="post-date">{{ $item->created_at->diffForHumans() }}</span>
                                    </div>
                                </div>
                            @endforeach
                        </div> <!-- single sidebar end -->
                        {{-- <div class="blog-sidebar mb-24">
                            <h4 class="title mb-30">Tags</h4>
                            <ul class="blog-tags">
                                <li><a href="#">camera</a></li>
                                <li><a href="#">computer</a></li>
                                <li><a href="#">watch</a></li>
                                <li><a href="#">smartphone</a></li>
                                <li><a href="#">bag</a></li>
                                <li><a href="#">shoes</a></li>
                            </ul>
                        </div> --}}
                         <!-- single sidebar end -->
                    </div>
                </div>
                <div class="col-lg-9 order-1">
                    <div class="blog-wrapper-inner">
                        <div class="row blog-content-wrap">
                            <!-- start single blog item -->
                            <div class="col-lg-12">
                                <div class="blog-item mb-30">
                                    <div class="blog-thumb img-full fix">
                                        <img src="{{ asset($blog_detail->image ?? '') }}" alt="">
                                    </div>
                                    <div class="blog-content">
                                        <div class="blog-details">
                                            <h3 class="blog-heading">{{ $blog_detail->name ?? '' }}</h3>
                                            <div class="blog-meta">
                                                <a class="author" href="#"><i class="icon-people"></i> Admin</a>
                                                <a class="comment" href="#"><i class="icon-bubbles"></i>
                                                    {{ $comment->count() ?? '0' }} comment</a>
                                                <a class="post-time" href="#"><i class="icon-calendar"></i>
                                                    {{ $item->created_at->diffForHumans() }}</a>
                                            </div>
                                            <blockquote>
                                                <p>{!! $blog_detail->description ?? '' !!}</p>
                                            </blockquote>

                                        </div>
                                    </div>
                                    <div class="tag-line">
                                        {{-- <h4>tag:</h4>
                                    <a href="#">dry food</a>,
                                    <a href="#">wet food</a>,
                                    <a href="#">reach food</a>, --}}
                                    </div>
                                    <div class="blog-sharing text-center mt-34 mt-sm-34">
                                        <h4>share this post:</h4>
                                        
                                        {{-- <div class="addthis_inline_share_toolbox"></div> --}}
                                        {!! $socialShare !!}
                                    </div>
                                </div>
                                <div class="comment-section">
                                    <h3>{{ $comment->count() ?? '' }} comment</h3>
                                    <ul>
                                        @foreach ($comment as $item)
                                            <li>
                                                <div class="author-avatar" style="margin-right:5px;">
                                                    <img src="{{ asset($item->user_name->image ?? '') }}"
                                                        style="border-radius: :20%; height:50px;" alt="">
                                                </div>
                                                <div class="comment-body">
                                                    {{-- <span class="reply-btn"><a href="#">reply</a></span> --}}
                                                    <h5 class="comment-author">{{ $item->user_name->name ?? 'User' }}</h5>
                                                    <div class="comment-post-date">
                                                        {{ $item->created_at->diffForHumans() }}
                                                    </div>
                                                    <p>{{ $item->comment ?? '' }}</p>
                                                </div>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                                <!-- comment area start -->
                                <!-- start blog comment box -->
                                <div class="blog-comment-wrapper mb-sm-6">
                                    <h3>leave a Comment</h3>
                                    <p>Your email address will not be published. Required fields are marked *</p>
                                    <form action="{{ route('Blog.Comment') }}" method="POST">
                                        @csrf
                                        <div class="comment-post-box">
                                            <div class="row">
                                                <div class="col-12">
                                                    <input type="hidden" name="blog_id"
                                                        value="{{ $blog_detail->id ?? '' }}">
                                                    <label>comment</label>
                                                    <textarea name="comment" placeholder="Write a comment"></textarea>
                                                </div>
                                                {{-- <div class="col-lg-4 col-md-4 col-sm-4 mb-sm-20">
                                                <label>Name</label>
                                                <input type="text" class="coment-field" placeholder="Name">
                                            </div>
                                            <div class="col-lg-4 col-md-4 col-sm-4 mb-sm-20">
                                                <label>Email</label>
                                                <input type="text" class="coment-field" placeholder="Email">
                                            </div>
                                            <div class="col-lg-4 col-md-4 col-sm-4 mb-sm-20">
                                                <label>Website</label>
                                                <input type="text" class="coment-field" placeholder="Website">
                                            </div> --}}
                                                <div class="col-12">
                                                    <div class="coment-btn mt-20">
                                                        <input class="sqr-btn" type="submit" name="submit"
                                                            value="post comment">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <!-- start blog comment box -->
                            </div>
                            <!-- end single blog item -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- blog main wrapper end -->
@endsection
@section('script')
@endsection

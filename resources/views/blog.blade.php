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
                            <li class="breadcrumb-item active" aria-current="page">Blogs</li>
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
            <div class="col-lg-12">
                <div class="blog-wrapper-inner">
                    <div class="row">
                        @foreach ($blog as $item)
                        <!-- start single blog item -->
                        <div class="col-lg-12 col-md-12">
                            <hr>
                            <div class="row blog-item mb-26">
                                <div class="col-md-4 blog-thumb img-full fix">
                                    <a href="{{url('blog-detail/'.$item->id)}}">
                                        <img src="{{asset($item->image??'')}}" style="height: 220px;" alt="">
                                    </a>
                                </div>
                                <div class="col-md-8 blog-content">
                                    <h3><a href="{{url('blog-detail/'.$item->id)}}">{{$item->name??''}}</a></h3>
                                    <div class="blog-meta">
                                        <span class="posted-author">by: admin</span>
                                        <span class="post-date">{{$item->created_at->diffForHumans()}}</span>
                                    </div>
                                    <p>{!!Str::limit($item->description??'',500)!!}</p><a href="{{url('blog-detail/'.$item->id)}}">read more <i class="fa fa-long-arrow-right"></i></a>
                                </div>
                                
                            </div>
                        </div>
                        <!-- end single blog item -->
                        @endforeach
                    </div>
                </div>
                <!-- start pagination area -->
                <div class="paginatoin-area text-center pt-30 pb-30">
                    <div class="row">
                        <div class="col-12">
                            {{$blog->links()}}
                        </div>
                    </div>
                </div>
                <!-- end pagination area -->
            </div>
        </div>
    </div>
</div>
<!-- blog main wrapper end -->

@endsection
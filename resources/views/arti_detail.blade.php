@extends('layouts.app')
@section('content')
@section('style')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
        integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        .main-header-inner .category-toggle-wrap nav.category-menu.hm-1 {
            display: none;
        }

        .card-body li {
            list-style: none;
            background: #e2e2e2;
            margin-left: 5px;
            text-align: center;
            border-radius: 5px;
        }

        .card-body li span {
            font-size: 20px;
        }

        .card-body ul li {
            display: inline-block;
            padding: 10px 10px 5px;
        }

        #social-links {
            float: left;
        }



        .rating {
            display: flex;
            width: 100%;
            justify-content: center;
            overflow: hidden;
            flex-direction: row-reverse;
            height: 150px;
            position: relative;
        }

        .rating-0 {
            filter: grayscale(100%);
        }

        .rating>input {
            display: none;
        }

        .rating>label {
            cursor: pointer;
            width: 40px;
            height: 40px;
            margin-top: auto;
            background-image: url("data:image/svg+xml;charset=UTF-8,%3csvg xmlns='http://www.w3.org/2000/svg' width='126.729' height='126.73'%3e%3cpath fill='%23e3e3e3' d='M121.215 44.212l-34.899-3.3c-2.2-.2-4.101-1.6-5-3.7l-12.5-30.3c-2-5-9.101-5-11.101 0l-12.4 30.3c-.8 2.1-2.8 3.5-5 3.7l-34.9 3.3c-5.2.5-7.3 7-3.4 10.5l26.3 23.1c1.7 1.5 2.4 3.7 1.9 5.9l-7.9 32.399c-1.2 5.101 4.3 9.3 8.9 6.601l29.1-17.101c1.9-1.1 4.2-1.1 6.1 0l29.101 17.101c4.6 2.699 10.1-1.4 8.899-6.601l-7.8-32.399c-.5-2.2.2-4.4 1.9-5.9l26.3-23.1c3.8-3.5 1.6-10-3.6-10.5z'/%3e%3c/svg%3e");
            background-repeat: no-repeat;
            background-position: center;
            background-size: 76%;
            transition: .3s;
        }

        .rating>input:checked~label,
        .rating>input:checked~label~label {
            background-image: url("data:image/svg+xml;charset=UTF-8,%3csvg xmlns='http://www.w3.org/2000/svg' width='126.729' height='126.73'%3e%3cpath fill='%23fcd93a' d='M121.215 44.212l-34.899-3.3c-2.2-.2-4.101-1.6-5-3.7l-12.5-30.3c-2-5-9.101-5-11.101 0l-12.4 30.3c-.8 2.1-2.8 3.5-5 3.7l-34.9 3.3c-5.2.5-7.3 7-3.4 10.5l26.3 23.1c1.7 1.5 2.4 3.7 1.9 5.9l-7.9 32.399c-1.2 5.101 4.3 9.3 8.9 6.601l29.1-17.101c1.9-1.1 4.2-1.1 6.1 0l29.101 17.101c4.6 2.699 10.1-1.4 8.899-6.601l-7.8-32.399c-.5-2.2.2-4.4 1.9-5.9l26.3-23.1c3.8-3.5 1.6-10-3.6-10.5z'/%3e%3c/svg%3e");
        }


        .rating>input:not(:checked)~label:hover,
        .rating>input:not(:checked)~label:hover~label {
            background-image: url("data:image/svg+xml;charset=UTF-8,%3csvg xmlns='http://www.w3.org/2000/svg' width='126.729' height='126.73'%3e%3cpath fill='%23d8b11e' d='M121.215 44.212l-34.899-3.3c-2.2-.2-4.101-1.6-5-3.7l-12.5-30.3c-2-5-9.101-5-11.101 0l-12.4 30.3c-.8 2.1-2.8 3.5-5 3.7l-34.9 3.3c-5.2.5-7.3 7-3.4 10.5l26.3 23.1c1.7 1.5 2.4 3.7 1.9 5.9l-7.9 32.399c-1.2 5.101 4.3 9.3 8.9 6.601l29.1-17.101c1.9-1.1 4.2-1.1 6.1 0l29.101 17.101c4.6 2.699 10.1-1.4 8.899-6.601l-7.8-32.399c-.5-2.2.2-4.4 1.9-5.9l26.3-23.1c3.8-3.5 1.6-10-3.6-10.5z'/%3e%3c/svg%3e");
        }

        .emoji-wrapper {
            width: 100%;
            text-align: center;
            height: 100px;
            overflow: hidden;
            position: absolute;
            top: 0;
            left: 0;
        }

        .emoji-wrapper:before,
        .emoji-wrapper:after {
            content: "";
            height: 15px;
            width: 100%;
            position: absolute;
            left: 0;
            z-index: 1;
        }

        .emoji-wrapper:before {
            top: 0;
            background: linear-gradient(to bottom, rgba(255, 255, 255, 1) 0%, rgba(255, 255, 255, 1) 35%, rgba(255, 255, 255, 0) 100%);
        }

        .emoji-wrapper:after {
            bottom: 0;
            background: linear-gradient(to top, rgba(255, 255, 255, 1) 0%, rgba(255, 255, 255, 1) 35%, rgba(255, 255, 255, 0) 100%);
        }

        .emoji {
            display: flex;
            flex-direction: column;
            align-items: center;
            transition: .3s;
        }

        .emoji>svg {
            margin: 15px 0;
            width: 70px;
            height: 70px;
            flex-shrink: 0;
        }

        #rating-1:checked~.emoji-wrapper>.emoji {
            transform: translateY(-100px);
        }

        #rating-2:checked~.emoji-wrapper>.emoji {
            transform: translateY(-200px);
        }

        #rating-3:checked~.emoji-wrapper>.emoji {
            transform: translateY(-300px);
        }

        #rating-4:checked~.emoji-wrapper>.emoji {
            transform: translateY(-400px);
        }

        #rating-5:checked~.emoji-wrapper>.emoji {
            transform: translateY(-500px);
        }

        .feedback {
            background-color: #fff;
            width: 100%;
            padding: 30px;
            border-radius: 8px;
            display: flex;
            flex-direction: column;
            flex-wrap: wrap;
            align-items: center;
        }
    </style>
@endsection
<!-- breadcrumb area start -->
<div class="breadcrumb-area">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="breadcrumb-wrap">
                    <nav aria-label="breadcrumb">
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Arti Detail</li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- breadcrumb area end -->

<!-- my account wrapper start -->
<div class="my-account-wrapper">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <!-- My Account Page Start -->
                <div class="myaccount-page-wrapper">
                    <!-- My Account Tab Menu Start -->
                    <div class="row">
                        <div class="col-lg-3 col-md-4">
                            <div class="myaccount-tab-menu nav" role="tablist">
                                <a href="#dashboad" class="active" data-toggle="tab"><i class="fa fa-bars"></i>
                                    Timeline</a>
                                <a href="#gallery" data-toggle="tab"><i class="fa fa-picture-o"></i>Gallery</a>
                                <a href="#videos" data-toggle="tab"><i class="fa fa-play"></i> Videos</a>
                                <a href="#ratings" data-toggle="tab"><i class="fa fa-star"></i> Ratings</a>
                                @auth
                                    @if (Auth()->user()->id == $arti->id)
                                        <a href="{{ url('dashboard') }}"><i class="fa fa-line-chart"></i>Dashboard</a>
                                        <a href="{{ url('user-product') }}"><i class="fa fa-truck"></i>My Products</a>
                                        <a href="{{ url('profile') }}"><i class="fa fa-edit"></i>Edit Profile</a>
                                        <a href="javascript:void(0);"
                                                            onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                                                           <i class="fa fa-lock"></i> Logout</a>
                                                        <form id="logout-form" action="{{ route('logout') }}"
                                                            method="POST" style="display: none;">
                                                            @csrf
                                                        </form>
                                    @endif
                                @endauth
                                {{-- <a href="#download" data-toggle="tab"><i class="fa fa-cloud-download"></i> Download</a>
                                <a href="#payment-method" data-toggle="tab"><i class="fa fa-credit-card"></i> Payment
                                    Method</a>
                                <a href="#address-edit" data-toggle="tab"><i class="fa fa-map-marker"></i> address</a>
                                <a href="#account-info" data-toggle="tab"><i class="fa fa-user"></i> Account Details</a>
                                <a href="login-register.html"><i class="fa fa-sign-out"></i> Logout</a> --}}
                            </div>
                        </div>
                        <!-- My Account Tab Menu End -->

                        <!-- My Account Tab Content Start -->
                        <div class="col-lg-9 col-md-8">
                            <div class="tab-content" id="myaccountContent">
                                <!-- Single Tab Content Start -->
                                <div class="tab-pane fade show active" id="dashboad" role="tabpanel">
                                    <div class="myaccount-content">
                                        <div class="row">
                                            <div class="col-md-2">
                                                <img src="{{ asset($arti->image ?? 'assets/img/user.jpg') }}"
                                                    style="border-radius: 50%; height:115px;" alt="">
                                            </div>
                                            <div class="col-md-8" style="padding-top: 30px;">
                                                <h4>{{ $arti->first_name ?? '' }} {{ $arti->last_name ?? '' }}</h4>
                                                <b>{{ $arti->address ?? '' }}</b>
                                                <h5>{{ $arti->email ?? '' }}</h5>
                                                <h5>{{ $arti->phone ?? '' }}</h5>

                                            </div>

                                            <div class="col-md-2">
                                                <div class="ratings">
                                                    @if ($rating->count() == 0.0)
                                                        <span class="good"><i class="far fa-star"></i></span>
                                                        <span class="good"><i class="far fa-star"></i></span>
                                                        <span class="good"><i class="far fa-star"></i></span>
                                                        <span class="good"><i class="far fa-star"></i></span>
                                                        <span class="good"><i class="far fa-star"></i></span>
                                                    @endif
                                                    @if (ceil($rating->avg('rate')) >= 1.0 && ceil($rating->avg('rate')) < 2.0)
                                                        <span class="good"><i class="fas fa-star"></i></span>
                                                        <span class="good"><i class="far fa-star"></i></span>
                                                        <span class="good"><i class="far fa-star"></i></span>
                                                        <span class="good"><i class="far fa-star"></i></span>
                                                        <span class="good"><i class="far fa-star"></i></span>
                                                    @elseif(ceil($rating->avg('rate')) >= 2.0 && ceil($rating->avg('rate')) < 3.0)
                                                        <span class="good"><i class="fas fa-star"></i></span>
                                                        <span class="good"><i class="fas fa-star"></i></span>
                                                        <span class="good"><i class="far fa-star"></i></span>
                                                        <span class="good"><i class="far fa-star"></i></span>
                                                        <span class="good"><i class="far fa-star"></i></span>
                                                    @elseif(ceil($rating->avg('rate')) >= 3.0 && ceil($rating->avg('rate')) < 4.0)
                                                        <span class="good"><i class="fas fa-star"></i></span>
                                                        <span class="good"><i class="fas fa-star"></i></span>
                                                        <span class="good"><i class="fas fa-star"></i></span>
                                                        <span class="good"><i class="far fa-star"></i></span>
                                                        <span class="good"><i class="far fa-star"></i></span>
                                                    @elseif(ceil($rating->avg('rate')) >= 4.0 && ceil($rating->avg('rate')) < 5.0)
                                                        <span class="good"><i class="fas fa-star"></i></span>
                                                        <span class="good"><i class="fas fa-star"></i></span>
                                                        <span class="good"><i class="fas fa-star"></i></span>
                                                        <span class="good"><i class="fas fa-star"></i></span>
                                                        <span class="good"><i class="far fa-star"></i></span>
                                                    @elseif(ceil($rating->avg('rate')) == 5.0)
                                                        <span class="good"><i class="fas fa-star"></i></span>
                                                        <span class="good"><i class="fas fa-star"></i></span>
                                                        <span class="good"><i class="fas fa-star"></i></span>
                                                        <span class="good"><i class="fas fa-star"></i></span>
                                                        <span><i class="fas fa-star"></i></span>
                                                    @endif
                                                    <div class="pro-review">
                                                        <span>{{ ceil($rating->avg('rate')) }}</span>
                                                    </div>
                                                </div><br>
                                                <span class="reply-btn ">
                                                    @auth
                                                        @if ($arti_fallow->where('user_id', Auth()->user()->id)->where('arti_id', $arti->id)->count() > 0)
                                                            <a class="btn btn-danger form-control"
                                                                style="background:#d8373e; color:#fff !important;">Followed</a>
                                                        @else
                                                            <a class="btn btn-primary form-control" style="cursor: pointer;"
                                                                id="artifallow{{ $arti->id }}">Follow</a>
                                                        @endif
                                                    @else
                                                        <a class="btn btn-primary form-control" style="cursor: pointer;"
                                                            id="artifallow{{ $arti->id }}">Follow</a>
                                                    @endauth
                                                    <i class="fa fa-feed"></i> {{ $arti_fallow->where('arti_id', $arti->id)->count() ?? '0' }}
                                                </span>
                                            </div>
                                            <div class="col-md-12 mt-2">
                                                <b>Description:</b>
                                                <p style="text-align: justify;">
                                                    {!! $arti->bio ?? 'No description' !!}
                                                </p>

                                                <hr>
                                                <hr>
                                            </div>
                                            @foreach ($post as $index => $item)
                                                <div class="col-lg-12 col-md-12 col-sm-12">
                                                    <div style="float: left;">
                                                        {{ $item->created_at->diffForHumans() }}
                                                    </div>
                                                    @auth()
                                                        @if ($item->user_id == Auth()->user()->id)
                                                            <div class="dropdown" style="float: right;">
                                                                <a id="dropdownMenuButton" data-toggle="dropdown"
                                                                    aria-haspopup="true" aria-expanded="false">
                                                                    <i class="fa fa-ellipsis-h" aria-hidden="true"></i>
                                                                </a>
                                                                <div class="dropdown-menu" style="min-width: 100%;"
                                                                    aria-labelledby="dropdownMenuButton">
                                                                    <a class="dropdown-item"
                                                                        onclick="artipostDelete{{ $item->id }}({{ $item->id }})">Delete</a>
                                                                </div>
                                                            </div>
                                                        @endif
                                                    @endauth
                                                    <table class="table table-striped table-hover">
                                                        <thead>
                                                            <tr style="background:#239B56 ; color:#fff;">
                                                                <th>Name</th>
                                                                <th>Picture</th>
                                                                <th>Type</th>
                                                                <th>Price Low</th>
                                                                <th>Price High</th>
                                                                <th>Weight</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @php
                                                                $product_name = json_decode($item->name, true);
                                                                $product_image = json_decode($item->image, true);
                                                                $product_type = json_decode($item->type, true);
                                                                $product_price_low = json_decode($item->price_low, true);
                                                                $product_price_high = json_decode($item->price_high, true);
                                                                $product_weight = json_decode($item->weight, true);
                                                            @endphp
                                                            @foreach ($product_name as $index => $item1)
                                                                <tr>
                                                                    <td>{{ $product_name[$index] ?? '' }}</td>
                                                                    <td><img src="{{ asset($product_image[$index] ?? '') }}"
                                                                            style="height: 70px; width:100px;"
                                                                            alt=""></td>
                                                                    <td>{{ $product_type[$index] ?? '' }}</td>
                                                                    <td>{{ $product_price_low[$index] ?? '' }}</td>
                                                                    <td>{{ $product_price_high[$index] ?? '' }}</td>
                                                                    <td>{{ $product_weight[$index] ?? '' }}</td>
                                                                </tr>
                                                            @endforeach
                                                        </tbody>
                                                        <tfoot style="text-align:center;">
                                                            <tr style="border-top:2px solid #239B56 ">
                                                                <th colspan="2" @auth
                                                                        @if ($comment->where('post_id', $item->id)->where('user_id', Auth()->user()->id)->count() > 0) style="color:blue;" @endif
                                                                    @endauth>
                                                                    <input type="hidden"
                                                                        id="post{{ $item->id }}"
                                                                        value="{{ $item->id }}">
                                                                    {{-- {{dd($comment->where('post_id', $item->id)->where('user_id', Auth()->user()->id)->count())}} --}}
                                                                    @auth
                                                                        @if ($comment->where('post_id', $item->id)->where('user_id', Auth()->user()->id)->count() == 0)
                                                                            <a id="likepost{{ $item->id }}"
                                                                                style="cursor: pointer;">Like <i
                                                                                    class="fa fa-thumbs-up"></i></a>
                                                                        @else
                                                                            Like <i class="fa fa-thumbs-up"></i>
                                                                        @endif
                                                                    @else
                                                                        Like <i class="fa fa-thumbs-up"></i>
                                                                    @endauth
                                                                    ({{ $comment->where('post_id', $item->id)->where('comment', null)->count() }})
                                                                </th>
                                                                <th colspan="2"><a data-toggle="modal"
                                                                        style="cursor: pointer;"
                                                                        data-target="#comment{{ $item->id }}">Comments
                                                                        <i class="fa fa-comment"></i>
                                                                        ({{ $comment->where('post_id', $item->id)->where('comment', '!=', null)->count() }})</a>
                                                                </th>
                                                                <th colspan="2"><a data-toggle="modal"
                                                                        style="cursor: pointer;"
                                                                        data-target="#exampleModalCenter"> Share <i
                                                                            class="fa fa-share"></i></a></th>
                                                            </tr>
                                                        </tfoot>
                                                    </table>
                                                    <hr>
                                                </div> <!-- product single column end -->
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                                <!-- Single Tab Content End -->
                                <!-- Button trigger modal -->

                                <!--Share Modal -->
                                <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
                                    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="card">
                                                    <div class="card-header bg-info text-white">
                                                        <h5>Share Post</h5>
                                                    </div>
                                                    <div class="card-body">
                                                        <div class="addthis_inline_share_toolbox"></div>
                                                        {{-- {!! $socialShare !!} --}}
                                                    </div>
                                                </div>
                                            </div>
                                            {{-- <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-dismiss="modal">Close</button>
                                                <button type="button" class="btn btn-primary">Save changes</button>
                                            </div> --}}
                                        </div>
                                    </div>
                                </div>
                                <!--Comment Modal -->
                                @foreach ($post as $item)
                                    <div class="modal fade" id="comment{{ $item->id }}" tabindex="-1"
                                        role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLongTitle">Post Comment
                                                    </h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body" id="comment_section">

                                                    <div class="row">
                                                        <div class="col-12">
                                                            <input type="hidden" name="post_id" id="post_id"
                                                                value="{{ $item->id ?? '' }}">
                                                            <label>Comment</label>
                                                            <input name="comment" id="comment" class="form-control"
                                                                placeholder="Write a comment">
                                                        </div>
                                                        <div class="col-12">
                                                            <div class="coment-btn mt-20">
                                                                <input class="sqr-btn" id="comment_send"
                                                                    type="submit" name="submit"
                                                                    value="post comment">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <hr>
                                                    <div class="comment-section"
                                                        style="overflow-y: auto; height:350px;">
                                                        <ul>
                                                            @foreach ($comment->where('post_id', $item->id)->where('comment', '!=', null) as $item)
                                                                <li style="text-align: left;">
                                                                    <div class="author-avatar"
                                                                        style="margin-right:5px;">
                                                                        <img src="{{ asset($item->user_name->image ?? '') }}"
                                                                            style="border-radius:20%; height:50px;"
                                                                            alt="">
                                                                    </div>
                                                                    <div class="comment-body">
                                                                        {{-- <span class="reply-btn"><a href="#">reply</a></span> --}}
                                                                        <h5 class="comment-author">
                                                                            {{ $item->user_name->name ?? 'User' }}
                                                                        </h5>
                                                                        <div class="comment-post-date">
                                                                            {{ $item->created_at->diffForHumans() }}
                                                                        </div>
                                                                        <p>{{ $item->comment ?? '' }}</p>
                                                                    </div>
                                                                </li>
                                                            @endforeach
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                                <!-- Single Tab Content Start -->
                                <div class="tab-pane fade" id="gallery" role="tabpanel">
                                    <div class="myaccount-content">
                                        <div class="row">
                                            @foreach ($gallery as $item)
                                                <div class="col-md-3">
                                                    @auth()
                                                        @if ($item->user_id == Auth()->user()->id)
                                                            <div class="dropdown" style="float: right;">
                                                                <a id="dropdownMenuButton" data-toggle="dropdown"
                                                                    aria-haspopup="true" aria-expanded="false">
                                                                    <i class="fa fa-ellipsis-h" aria-hidden="true"></i>
                                                                </a>
                                                                <div class="dropdown-menu" style="min-width: 100%;"
                                                                    aria-labelledby="dropdownMenuButton">
                                                                    <a class="dropdown-item"
                                                                        onclick="user_galleryDelete{{ $item->id }}({{ $item->id }})">Delete</a>
                                                                </div>
                                                            </div>
                                                        @endif
                                                    @endauth
                                                    <a class="thumbnail"
                                                        href="{{ asset($item->image ?? '') }}"><img
                                                            src="{{ asset($item->image ?? '') }}"
                                                            alt=""></a>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                                <!-- Single Tab Content End -->

                                <!-- Single Tab Content Start -->
                                <div class="tab-pane fade" id="videos" role="tabpanel">
                                    <div class="myaccount-content">
                                        <div class="row">
                                            @foreach ($videos as $item)
                                                <div class="col-md-6">
                                                    @auth()
                                                        @if ($item->user_id == Auth()->user()->id)
                                                            <div class="dropdown" style="float: right;">
                                                                <a id="dropdownMenuButton" data-toggle="dropdown"
                                                                    aria-haspopup="true" aria-expanded="false">
                                                                    <i class="fa fa-ellipsis-h" aria-hidden="true"></i>
                                                                </a>
                                                                <div class="dropdown-menu" style="min-width: 100%;"
                                                                    aria-labelledby="dropdownMenuButton">
                                                                    <a class="dropdown-item"
                                                                        onclick="user_videoDelete{{ $item->id }}({{ $item->id }})">Delete</a>
                                                                </div>
                                                            </div>
                                                        @endif
                                                    @endauth
                                                    <iframe style="width:100%; height:250px;"
                                                        src="{{ $item->link ?? '' }}"
                                                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                                        allowfullscreen></iframe>
                                                    <br><span class="caption">{{ $item->name ?? '' }}</span>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                                <!-- Single Tab Content End -->

                                <!-- Single Tab Content Start -->
                                <div class="tab-pane fade" id="ratings" role="tabpanel">
                                    <div class="myaccount-content">
                                        @auth
                                            @if (Auth()->user()->id != $arti->id && $rating->where('user_id', Auth()->user()->id)->count() == 0)
                                                <form action="{{ route('Rating') }}" class="review-form"
                                                    method="POST">
                                                    @csrf
                                                    <div class="form-group row">
                                                        <div class="col">
                                                            <label class="col-form-label">
                                                                Your Remarks</label>
                                                            <textarea class="form-control" name="remarks"></textarea>
                                                        </div>
                                                        <input type="hidden" name="arti_id"
                                                            value="{{ $arti->id ?? '' }}">
                                                    </div>
                                                    {{-- <div class="form-group row">
                                                        <div class="col">
                                                            <label class="col-form-label"><span
                                                                    class="text-danger">*</span>
                                                                Rating</label>
                                                            &nbsp;&nbsp;&nbsp; Bad&nbsp;
                                                            <input type="radio" value="1" name="rate">
                                                            &nbsp;
                                                            <input type="radio" value="2" name="rate">
                                                            &nbsp;
                                                            <input type="radio" value="3" name="rate">
                                                            &nbsp;
                                                            <input type="radio" value="4" name="rate">
                                                            &nbsp;
                                                            <input type="radio" value="5" name="rate" checked>
                                                            &nbsp;Good
                                                        </div>
                                                    </div> --}}
                                                    <div class="container">
                                                        <div class="feedback">
                                                            <div class="rating">
                                                                <input type="radio" name="rate" value="5"
                                                                    checked id="rating-5">
                                                                <label for="rating-5"></label>
                                                                <input type="radio" name="rate" value="4"
                                                                    id="rating-4">
                                                                <label for="rating-4"></label>
                                                                <input type="radio" name="rate" value="3"
                                                                    id="rating-3">
                                                                <label for="rating-3"></label>
                                                                <input type="radio" name="rate" value="2"
                                                                    id="rating-2">
                                                                <label for="rating-2"></label>
                                                                <input type="radio" name="rate" value="1"
                                                                    id="rating-1">
                                                                <label for="rating-1"></label>
                                                                <div class="emoji-wrapper">
                                                                    <div class="emoji">
                                                                        <svg class="rating-0"
                                                                            xmlns="http://www.w3.org/2000/svg"
                                                                            viewBox="0 0 512 512">
                                                                            <circle cx="256" cy="256"
                                                                                r="256" fill="#ffd93b" />
                                                                            <path
                                                                                d="M512 256c0 141.44-114.64 256-256 256-80.48 0-152.32-37.12-199.28-95.28 43.92 35.52 99.84 56.72 160.72 56.72 141.36 0 256-114.56 256-256 0-60.88-21.2-116.8-56.72-160.72C474.8 103.68 512 175.52 512 256z"
                                                                                fill="#f4c534" />
                                                                            <ellipse
                                                                                transform="scale(-1) rotate(31.21 715.433 -595.455)"
                                                                                cx="166.318" cy="199.829"
                                                                                rx="56.146" ry="56.13"
                                                                                fill="#fff" />
                                                                            <ellipse
                                                                                transform="rotate(-148.804 180.87 175.82)"
                                                                                cx="180.871" cy="175.822"
                                                                                rx="28.048" ry="28.08"
                                                                                fill="#3e4347" />
                                                                            <ellipse
                                                                                transform="rotate(-113.778 194.434 165.995)"
                                                                                cx="194.433" cy="165.993"
                                                                                rx="8.016" ry="5.296"
                                                                                fill="#5a5f63" />
                                                                            <ellipse
                                                                                transform="scale(-1) rotate(31.21 715.397 -1237.664)"
                                                                                cx="345.695" cy="199.819"
                                                                                rx="56.146" ry="56.13"
                                                                                fill="#fff" />
                                                                            <ellipse
                                                                                transform="rotate(-148.804 360.25 175.837)"
                                                                                cx="360.252" cy="175.84"
                                                                                rx="28.048" ry="28.08"
                                                                                fill="#3e4347" />
                                                                            <ellipse
                                                                                transform="scale(-1) rotate(66.227 254.508 -573.138)"
                                                                                cx="373.794" cy="165.987"
                                                                                rx="8.016" ry="5.296"
                                                                                fill="#5a5f63" />
                                                                            <path
                                                                                d="M370.56 344.4c0 7.696-6.224 13.92-13.92 13.92H155.36c-7.616 0-13.92-6.224-13.92-13.92s6.304-13.92 13.92-13.92h201.296c7.696.016 13.904 6.224 13.904 13.92z"
                                                                                fill="#3e4347" />
                                                                        </svg>
                                                                        <svg class="rating-1"
                                                                            xmlns="http://www.w3.org/2000/svg"
                                                                            viewBox="0 0 512 512">
                                                                            <circle cx="256" cy="256"
                                                                                r="256" fill="#ffd93b" />
                                                                            <path
                                                                                d="M512 256A256 256 0 0 1 56.7 416.7a256 256 0 0 0 360-360c58.1 47 95.3 118.8 95.3 199.3z"
                                                                                fill="#f4c534" />
                                                                            <path
                                                                                d="M328.4 428a92.8 92.8 0 0 0-145-.1 6.8 6.8 0 0 1-12-5.8 86.6 86.6 0 0 1 84.5-69 86.6 86.6 0 0 1 84.7 69.8c1.3 6.9-7.7 10.6-12.2 5.1z"
                                                                                fill="#3e4347" />
                                                                            <path
                                                                                d="M269.2 222.3c5.3 62.8 52 113.9 104.8 113.9 52.3 0 90.8-51.1 85.6-113.9-2-25-10.8-47.9-23.7-66.7-4.1-6.1-12.2-8-18.5-4.2a111.8 111.8 0 0 1-60.1 16.2c-22.8 0-42.1-5.6-57.8-14.8-6.8-4-15.4-1.5-18.9 5.4-9 18.2-13.2 40.3-11.4 64.1z"
                                                                                fill="#f4c534" />
                                                                            <path
                                                                                d="M357 189.5c25.8 0 47-7.1 63.7-18.7 10 14.6 17 32.1 18.7 51.6 4 49.6-26.1 89.7-67.5 89.7-41.6 0-78.4-40.1-82.5-89.7A95 95 0 0 1 298 174c16 9.7 35.6 15.5 59 15.5z"
                                                                                fill="#fff" />
                                                                            <path
                                                                                d="M396.2 246.1a38.5 38.5 0 0 1-38.7 38.6 38.5 38.5 0 0 1-38.6-38.6 38.6 38.6 0 1 1 77.3 0z"
                                                                                fill="#3e4347" />
                                                                            <path
                                                                                d="M380.4 241.1c-3.2 3.2-9.9 1.7-14.9-3.2-4.8-4.8-6.2-11.5-3-14.7 3.3-3.4 10-2 14.9 2.9 4.9 5 6.4 11.7 3 15z"
                                                                                fill="#fff" />
                                                                            <path
                                                                                d="M242.8 222.3c-5.3 62.8-52 113.9-104.8 113.9-52.3 0-90.8-51.1-85.6-113.9 2-25 10.8-47.9 23.7-66.7 4.1-6.1 12.2-8 18.5-4.2 16.2 10.1 36.2 16.2 60.1 16.2 22.8 0 42.1-5.6 57.8-14.8 6.8-4 15.4-1.5 18.9 5.4 9 18.2 13.2 40.3 11.4 64.1z"
                                                                                fill="#f4c534" />
                                                                            <path
                                                                                d="M155 189.5c-25.8 0-47-7.1-63.7-18.7-10 14.6-17 32.1-18.7 51.6-4 49.6 26.1 89.7 67.5 89.7 41.6 0 78.4-40.1 82.5-89.7A95 95 0 0 0 214 174c-16 9.7-35.6 15.5-59 15.5z"
                                                                                fill="#fff" />
                                                                            <path
                                                                                d="M115.8 246.1a38.5 38.5 0 0 0 38.7 38.6 38.5 38.5 0 0 0 38.6-38.6 38.6 38.6 0 1 0-77.3 0z"
                                                                                fill="#3e4347" />
                                                                            <path
                                                                                d="M131.6 241.1c3.2 3.2 9.9 1.7 14.9-3.2 4.8-4.8 6.2-11.5 3-14.7-3.3-3.4-10-2-14.9 2.9-4.9 5-6.4 11.7-3 15z"
                                                                                fill="#fff" />
                                                                        </svg>
                                                                        <svg class="rating-2"
                                                                            xmlns="http://www.w3.org/2000/svg"
                                                                            viewBox="0 0 512 512">
                                                                            <circle cx="256" cy="256"
                                                                                r="256" fill="#ffd93b" />
                                                                            <path
                                                                                d="M512 256A256 256 0 0 1 56.7 416.7a256 256 0 0 0 360-360c58.1 47 95.3 118.8 95.3 199.3z"
                                                                                fill="#f4c534" />
                                                                            <path
                                                                                d="M336.6 403.2c-6.5 8-16 10-25.5 5.2a117.6 117.6 0 0 0-110.2 0c-9.4 4.9-19 3.3-25.6-4.6-6.5-7.7-4.7-21.1 8.4-28 45.1-24 99.5-24 144.6 0 13 7 14.8 19.7 8.3 27.4z"
                                                                                fill="#3e4347" />
                                                                            <path
                                                                                d="M276.6 244.3a79.3 79.3 0 1 1 158.8 0 79.5 79.5 0 1 1-158.8 0z"
                                                                                fill="#fff" />
                                                                            <circle cx="340" cy="260.4"
                                                                                r="36.2" fill="#3e4347" />
                                                                            <g fill="#fff">
                                                                                <ellipse
                                                                                    transform="rotate(-135 326.4 246.6)"
                                                                                    cx="326.4" cy="246.6"
                                                                                    rx="6.5" ry="10" />
                                                                                <path
                                                                                    d="M231.9 244.3a79.3 79.3 0 1 0-158.8 0 79.5 79.5 0 1 0 158.8 0z" />
                                                                            </g>
                                                                            <circle cx="168.5" cy="260.4"
                                                                                r="36.2" fill="#3e4347" />
                                                                            <ellipse transform="rotate(-135 182.1 246.7)"
                                                                                cx="182.1" cy="246.7"
                                                                                rx="10" ry="6.5"
                                                                                fill="#fff" />
                                                                        </svg>
                                                                        <svg class="rating-3"
                                                                            xmlns="http://www.w3.org/2000/svg"
                                                                            viewBox="0 0 512 512">
                                                                            <circle cx="256" cy="256"
                                                                                r="256" fill="#ffd93b" />
                                                                            <path
                                                                                d="M407.7 352.8a163.9 163.9 0 0 1-303.5 0c-2.3-5.5 1.5-12 7.5-13.2a780.8 780.8 0 0 1 288.4 0c6 1.2 9.9 7.7 7.6 13.2z"
                                                                                fill="#3e4347" />
                                                                            <path
                                                                                d="M512 256A256 256 0 0 1 56.7 416.7a256 256 0 0 0 360-360c58.1 47 95.3 118.8 95.3 199.3z"
                                                                                fill="#f4c534" />
                                                                            <g fill="#fff">
                                                                                <path
                                                                                    d="M115.3 339c18.2 29.6 75.1 32.8 143.1 32.8 67.1 0 124.2-3.2 143.2-31.6l-1.5-.6a780.6 780.6 0 0 0-284.8-.6z" />
                                                                                <ellipse cx="356.4" cy="205.3"
                                                                                    rx="81.1" ry="81" />
                                                                            </g>
                                                                            <ellipse cx="356.4" cy="205.3"
                                                                                rx="44.2" ry="44.2"
                                                                                fill="#3e4347" />
                                                                            <g fill="#fff">
                                                                                <ellipse
                                                                                    transform="scale(-1) rotate(45 454 -906)"
                                                                                    cx="375.3" cy="188.1"
                                                                                    rx="12" ry="8.1" />
                                                                                <ellipse cx="155.6" cy="205.3"
                                                                                    rx="81.1" ry="81" />
                                                                            </g>
                                                                            <ellipse cx="155.6" cy="205.3"
                                                                                rx="44.2" ry="44.2"
                                                                                fill="#3e4347" />
                                                                            <ellipse
                                                                                transform="scale(-1) rotate(45 454 -421.3)"
                                                                                cx="174.5" cy="188"
                                                                                rx="12" ry="8.1"
                                                                                fill="#fff" />
                                                                        </svg>
                                                                        <svg class="rating-4"
                                                                            xmlns="http://www.w3.org/2000/svg"
                                                                            viewBox="0 0 512 512">
                                                                            <circle cx="256" cy="256"
                                                                                r="256" fill="#ffd93b" />
                                                                            <path
                                                                                d="M512 256A256 256 0 0 1 56.7 416.7a256 256 0 0 0 360-360c58.1 47 95.3 118.8 95.3 199.3z"
                                                                                fill="#f4c534" />
                                                                            <path
                                                                                d="M232.3 201.3c0 49.2-74.3 94.2-74.3 94.2s-74.4-45-74.4-94.2a38 38 0 0 1 74.4-11.1 38 38 0 0 1 74.3 11.1z"
                                                                                fill="#e24b4b" />
                                                                            <path
                                                                                d="M96.1 173.3a37.7 37.7 0 0 0-12.4 28c0 49.2 74.3 94.2 74.3 94.2C80.2 229.8 95.6 175.2 96 173.3z"
                                                                                fill="#d03f3f" />
                                                                            <path
                                                                                d="M215.2 200c-3.6 3-9.8 1-13.8-4.1-4.2-5.2-4.6-11.5-1.2-14.1 3.6-2.8 9.7-.7 13.9 4.4 4 5.2 4.6 11.4 1.1 13.8z"
                                                                                fill="#fff" />
                                                                            <path
                                                                                d="M428.4 201.3c0 49.2-74.4 94.2-74.4 94.2s-74.3-45-74.3-94.2a38 38 0 0 1 74.4-11.1 38 38 0 0 1 74.3 11.1z"
                                                                                fill="#e24b4b" />
                                                                            <path
                                                                                d="M292.2 173.3a37.7 37.7 0 0 0-12.4 28c0 49.2 74.3 94.2 74.3 94.2-77.8-65.7-62.4-120.3-61.9-122.2z"
                                                                                fill="#d03f3f" />
                                                                            <path
                                                                                d="M411.3 200c-3.6 3-9.8 1-13.8-4.1-4.2-5.2-4.6-11.5-1.2-14.1 3.6-2.8 9.7-.7 13.9 4.4 4 5.2 4.6 11.4 1.1 13.8z"
                                                                                fill="#fff" />
                                                                            <path
                                                                                d="M381.7 374.1c-30.2 35.9-75.3 64.4-125.7 64.4s-95.4-28.5-125.8-64.2a17.6 17.6 0 0 1 16.5-28.7 627.7 627.7 0 0 0 218.7-.1c16.2-2.7 27 16.1 16.3 28.6z"
                                                                                fill="#3e4347" />
                                                                            <path
                                                                                d="M256 438.5c25.7 0 50-7.5 71.7-19.5-9-33.7-40.7-43.3-62.6-31.7-29.7 15.8-62.8-4.7-75.6 34.3 20.3 10.4 42.8 17 66.5 17z"
                                                                                fill="#e24b4b" />
                                                                        </svg>
                                                                        <svg class="rating-5"
                                                                            xmlns="http://www.w3.org/2000/svg"
                                                                            viewBox="0 0 512 512">
                                                                            <g fill="#ffd93b">
                                                                                <circle cx="256" cy="256"
                                                                                    r="256" />
                                                                                <path
                                                                                    d="M512 256A256 256 0 0 1 56.8 416.7a256 256 0 0 0 360-360c58 47 95.2 118.8 95.2 199.3z" />
                                                                            </g>
                                                                            <path
                                                                                d="M512 99.4v165.1c0 11-8.9 19.9-19.7 19.9h-187c-13 0-23.5-10.5-23.5-23.5v-21.3c0-12.9-8.9-24.8-21.6-26.7-16.2-2.5-30 10-30 25.5V261c0 13-10.5 23.5-23.5 23.5h-187A19.7 19.7 0 0 1 0 264.7V99.4c0-10.9 8.8-19.7 19.7-19.7h472.6c10.8 0 19.7 8.7 19.7 19.7z"
                                                                                fill="#e9eff4" />
                                                                            <path
                                                                                d="M204.6 138v88.2a23 23 0 0 1-23 23H58.2a23 23 0 0 1-23-23v-88.3a23 23 0 0 1 23-23h123.4a23 23 0 0 1 23 23z"
                                                                                fill="#45cbea" />
                                                                            <path
                                                                                d="M476.9 138v88.2a23 23 0 0 1-23 23H330.3a23 23 0 0 1-23-23v-88.3a23 23 0 0 1 23-23h123.4a23 23 0 0 1 23 23z"
                                                                                fill="#e84d88" />
                                                                            <g fill="#38c0dc">
                                                                                <path
                                                                                    d="M95.2 114.9l-60 60v15.2l75.2-75.2zM123.3 114.9L35.1 203v23.2c0 1.8.3 3.7.7 5.4l116.8-116.7h-29.3z" />
                                                                            </g>
                                                                            <g fill="#d23f77">
                                                                                <path
                                                                                    d="M373.3 114.9l-66 66V196l81.3-81.2zM401.5 114.9l-94.1 94v17.3c0 3.5.8 6.8 2.2 9.8l121.1-121.1h-29.2z" />
                                                                            </g>
                                                                            <path
                                                                                d="M329.5 395.2c0 44.7-33 81-73.4 81-40.7 0-73.5-36.3-73.5-81s32.8-81 73.5-81c40.5 0 73.4 36.3 73.4 81z"
                                                                                fill="#3e4347" />
                                                                            <path
                                                                                d="M256 476.2a70 70 0 0 0 53.3-25.5 34.6 34.6 0 0 0-58-25 34.4 34.4 0 0 0-47.8 26 69.9 69.9 0 0 0 52.6 24.5z"
                                                                                fill="#e24b4b" />
                                                                            <path
                                                                                d="M290.3 434.8c-1 3.4-5.8 5.2-11 3.9s-8.4-5.1-7.4-8.7c.8-3.3 5.7-5 10.7-3.8 5.1 1.4 8.5 5.3 7.7 8.6z"
                                                                                fill="#fff" opacity=".2" />
                                                                        </svg>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="buttons">
                                                        <button class="sqr-btn" type="submit">Post</button>
                                                    </div>

                                                </form> <!-- end of review-form -->
                                            @else
                                                <b style="color:brown;">Your are not Allow</b>
                                            @endif
                                        @else
                                            <b style="color:brown;">Please login first!</b>
                                        @endauth
                                        <hr>
                                        @foreach ($rating as $item)
                                            <div class="total-reviews">
                                                <div class="rev-avatar">
                                                    <img src="{{ asset($item->image ?? 'assets/img/about/avatar.jpg') }}"
                                                        alt="">
                                                </div>
                                                <div class="review-box">
                                                    <div class="ratings">
                                                        @for ($i = 1; $i <= $item->rate; $i++)
                                                            <span class="good"><i class="fa fa-star"></i></span>
                                                        @endfor
                                                        @for ($i = 1; $i <= 5 - $item->rate; $i++)
                                                            <span class="good"><i class="fa fa-star-o"></i></span>
                                                        @endfor
                                                    </div>
                                                    <div class="post-author">
                                                        <p><span>{{ $item->user_name->first_name ?? '' }}
                                                                {{ $item->user_name->last_name ?? '' }} -</span>
                                                            {{ $item->created_at->diffForHumans() }}</p>
                                                    </div>
                                                    <p>{{ $item->remarks ?? '' }}</p>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                                <!-- Single Tab Content End -->

                                <!-- Single Tab Content Start -->
                                <div class="tab-pane fade" id="address-edit" role="tabpanel">
                                    <div class="myaccount-content">
                                        <h3>Billing Address</h3>
                                        <address>
                                            <p><strong>Alex Tuntuni</strong></p>
                                            <p>1355 Market St, Suite 900 <br>
                                                San Francisco, CA 94103</p>
                                            <p>Mobile: (123) 456-7890</p>
                                        </address>
                                        <a href="#" class="check-btn sqr-btn "><i class="fa fa-edit"></i>
                                            Edit
                                            Address</a>
                                    </div>
                                </div>
                                <!-- Single Tab Content End -->

                                <!-- Single Tab Content Start -->
                                <div class="tab-pane fade" id="account-info" role="tabpanel">
                                    <div class="myaccount-content">
                                        <h3>Account Details</h3>
                                        <div class="account-details-form">
                                            <form action="#">
                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <div class="single-input-item">
                                                            <label for="first-name" class="required">First
                                                                Name</label>
                                                            <input type="text" id="first-name"
                                                                placeholder="First Name" />
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div class="single-input-item">
                                                            <label for="last-name" class="required">Last
                                                                Name</label>
                                                            <input type="text" id="last-name"
                                                                placeholder="Last Name" />
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="single-input-item">
                                                    <label for="display-name" class="required">Display
                                                        Name</label>
                                                    <input type="text" id="display-name"
                                                        placeholder="Display Name" />
                                                </div>
                                                <div class="single-input-item">
                                                    <label for="email" class="required">Email Addres</label>
                                                    <input type="email" id="email"
                                                        placeholder="Email Address" />
                                                </div>
                                                <fieldset>
                                                    <legend>Password change</legend>
                                                    <div class="single-input-item">
                                                        <label for="current-pwd" class="required">Current
                                                            Password</label>
                                                        <input type="password" id="current-pwd"
                                                            placeholder="Current Password" />
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <div class="single-input-item">
                                                                <label for="new-pwd" class="required">New
                                                                    Password</label>
                                                                <input type="password" id="new-pwd"
                                                                    placeholder="New Password" />
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <div class="single-input-item">
                                                                <label for="confirm-pwd" class="required">Confirm
                                                                    Password</label>
                                                                <input type="password" id="confirm-pwd"
                                                                    placeholder="Confirm Password" />
                                                            </div>
                                                        </div>
                                                    </div>
                                                </fieldset>
                                                <div class="single-input-item">
                                                    <button class="check-btn sqr-btn ">Save Changes</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div> <!-- Single Tab Content End -->
                            </div>

                        </div> <!-- My Account Tab Content End -->
                    </div>
                </div> <!-- My Account Page End -->
            </div>
        </div>
    </div>
</div>
<!-- my account wrapper end -->
@endsection
@section('script')
<script>
    $(document).ready(function() {
        <?php
        foreach ($post as $item) {
        ?>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $('#likepost<?php echo $item->id; ?>').click(function() {
            <?php if (auth()->user() != null) { ?>
            var pro_id<?php echo $item->id; ?> = parseInt($('#post<?php echo $item->id; ?>').val());
            $.ajax({
                type: 'POST',
                url: "{{ route('PostLike') }}",
                data: {
                    _token: $('meta[name="csrf-token"]').attr('content'),
                    post_id: pro_id<?php echo $item->id; ?>,
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

<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/izitoast@1.4.0/dist/js/iziToast.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/5.10.0/tinymce.min.js"></script>
@auth
    @foreach ($post as $item)
        <script>
            function artipostDelete{{ $item->id }}(id) {
                swal({
                    title: "Are You Sure Want To Delete Post?",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                }).then((willDelete) => {
                    if (willDelete) {
                        var url = '{{ route('client.deleteProductPost', ':id') }}';
                        url = url.replace(':id', id);
                        $.ajax({
                            type: "POST",
                            headers: {
                                'X-CSRF-TOKEN': '{{ csrf_token() }}'
                            },
                            url: url,
                            dataType: "json",
                            data: {
                                id: id
                            },
                            success: function(data) {
                                console.log(data);
                                //var data = JSON.parse(response);
                                iziToast.success({
                                    message: data.message,
                                    position: 'topRight'
                                });
                                //Reload page
                                window.location.reload();

                            }
                        });
                    }
                });

            }
        </script>
    @endforeach
    @foreach ($gallery as $item)
        <script>
            function user_galleryDelete{{ $item->id }}(id) {
                swal({
                    title: "Are You Sure Want To Delete Gallery Image?",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                }).then((willDelete) => {
                    if (willDelete) {
                        var url = '{{ route('client.deleteUserGallery', ':id') }}';
                        url = url.replace(':id', id);
                        $.ajax({
                            type: "POST",
                            headers: {
                                'X-CSRF-TOKEN': '{{ csrf_token() }}'
                            },
                            url: url,
                            dataType: "json",
                            data: {
                                id: id
                            },
                            success: function(data) {
                                console.log(data);
                                //var data = JSON.parse(response);
                                iziToast.success({
                                    message: data.message,
                                    position: 'topRight'
                                });
                                //Reload page
                                window.location.reload();

                            }
                        });
                    }
                });

            }
        </script>
    @endforeach
    @foreach ($videos as $item)
        <script>
            function user_videoDelete{{ $item->id }}(id) {
                swal({
                    title: "Are You Sure Want To Delete Video?",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                }).then((willDelete) => {
                    if (willDelete) {
                        var url = '{{ route('client.deleteUserVideo', ':id') }}';
                        url = url.replace(':id', id);
                        $.ajax({
                            type: "POST",
                            headers: {
                                'X-CSRF-TOKEN': '{{ csrf_token() }}'
                            },
                            url: url,
                            dataType: "json",
                            data: {
                                id: id
                            },
                            success: function(data) {
                                console.log(data);
                                //var data = JSON.parse(response);
                                iziToast.success({
                                    message: data.message,
                                    position: 'topRight'
                                });
                                //Reload page
                                window.location.reload();

                            }
                        });
                    }
                });

            }
        </script>
    @endforeach
@endauth
<script>
    $(document).ready(function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $('#artifallow<?php echo $arti->id; ?>').click(function() {
            <?php if (auth()->user() != null) { ?>
            $.ajax({
                type: 'POST',
                url: "{{ route('ArtiFallow') }}",
                data: {
                    _token: $('meta[name="csrf-token"]').attr('content'),
                    arti_id: <?php echo $arti->id; ?>,
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
    });
</script>
<script type="text/javascript">
    $(document).ready(function() {


        $('#comment_send').click(function() {
            <?php if (auth()->user() != null) { ?>
            var post_id = parseInt($('#post_id').val());
            var comment = $('#comment').val();
            $.ajax({
                type: 'POST',
                url: "{{ route('Post.Comment') }}",
                data: {
                    _token: $('meta[name="csrf-token"]').attr('content'),
                    post_id: post_id,
                    comment: comment
                },

                success: function(response) {
                    if (response.success) {
                        alert(response.message);
                        $("#comment_section").load(location.href +
                                " #comment_section");
                        $.ajaxSetup({
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr(
                                    'content')
                            }
                        });
                    } else {
                        alert("Error")
                    }
                }
            });
            <?php } else { ?>
            alert('Please Login First!');
            <?php } ?>

        });
    });
</script>
</script>
@endsection

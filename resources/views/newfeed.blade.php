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
                            <li class="breadcrumb-item active" aria-current="page">News Feeds</li>
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
                        
                        <!-- My Account Tab Menu End -->

                        <!-- My Account Tab Content Start -->
                        <div class="col-md-10 offset-md-1">
                            <div class="tab-content" id="myaccountContent">
                                <!-- Single Tab Content Start -->
                                <div class="tab-pane fade show active" id="dashboad" role="tabpanel">
                                    <div >
                                        <div class="row">
                                            {{-- <div class="col-md-2">
                                                <img src="{{ asset($arti->image ?? '') }}"
                                                    style="border-radius: 50%; height:115px;" alt="">
                                            </div>
                                            <div class="col-md-8" style="padding-top: 30px;">
                                                <h4>{{ $arti->first_name ?? '' }} {{ $arti->last_name ?? '' }}</h4>
                                                <b>{{ $arti->address ?? 'Address city state Pakistan' }}</b>
                                                <h5>{{ $arti->email ?? '' }}</h5>
                                                <h5>{{ $arti->phone ?? '12345678910' }}</h5>
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
                                                    @if (ceil($rating->avg('rate')) > 1.0 && ceil($rating->avg('rate')) < 2.0)
                                                        <span class="good"><i class="fas fa-star"></i></span>
                                                        <span class="good"><i class="far fa-star"></i></span>
                                                        <span class="good"><i class="far fa-star"></i></span>
                                                        <span class="good"><i class="far fa-star"></i></span>
                                                        <span class="good"><i class="far fa-star"></i></span>
                                                    @elseif(ceil($rating->avg('rate')) > 2.0 && ceil($rating->avg('rate')) < 3.0)
                                                        <span class="good"><i class="fas fa-star"></i></span>
                                                        <span class="good"><i class="fas fa-star"></i></span>
                                                        <span class="good"><i class="far fa-star"></i></span>
                                                        <span class="good"><i class="far fa-star"></i></span>
                                                        <span class="good"><i class="far fa-star"></i></span>
                                                    @elseif(ceil($rating->avg('rate')) > 3.0 && ceil($rating->avg('rate')) < 4.0)
                                                        <span class="good"><i class="fas fa-star"></i></span>
                                                        <span class="good"><i class="fas fa-star"></i></span>
                                                        <span class="good"><i class="fas fa-star"></i></span>
                                                        <span class="good"><i class="far fa-star"></i></span>
                                                        <span class="good"><i class="far fa-star"></i></span>
                                                    @elseif(ceil($rating->avg('rate')) > 4.0 && ceil($rating->avg('rate')) < 5.0)
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
                                                </div>
                                            </div>
                                            <div class="col-md-12 mt-2">
                                                <b>Description:</b>
                                                <p style="text-align: justify;">
                                                    {!! $arti->bio ?? 'No description' !!}
                                                </p>

                                                <hr>
                                                <hr>
                                            </div> --}}
                                            @if($fallow->count()>0)
                                @foreach ($post as $index=> $item)
                                                <div class="col-lg-12 col-md-12 col-sm-12 myaccount-content mb-3">
                                                    
                                                    <div class="row">
                                                        <div class="col-md-1" style="padding-right: 0px;">
                                                            <a href="{{url('arti-detail/'.$item->id)}}"><img src="{{$item->arti_image??'assets\img\team\team_member_4.jpg'}}" style="height: 60px; width:100%; border-radius:50%;" alt=""></a>
                                                        </div>
                                                        <div class="col-md-10">
                                                            <a href="{{url('arti-detail/'.$item->id)}}"><b>{{$item->first_name??''}} {{$item->last_name??''}}</b></a><br>
                                                            @php
                                                                $datetime = date('Y-m-d H:i A', strtotime($item->created_at))
                                                            @endphp
                                                            {{ $datetime??'' }}
                                                        </div>
                                                    </div>
                                                
                                                    <hr>
                                                    <table class="table table-striped table-hover">
                                                        @if ($item->post_type == 0)
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
                                                            @else
                                                                <thead>
                                                                    <tr style="background:#239B56 ; width:100%;">
                                                                        <th colspan="5">
                                                                            <p
                                                                                style=" color:#fff; text-align:justify;">
                                                                                {!! $item->description ?? '' !!}</p>
                                                                        </th>
                                                                    </tr>
                                                                </thead>
                                                        @endif
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
                                                </div> <!-- product single column end -->
                                            @endforeach
                                            @else
                                                <div class="alert alert-danger">
                                                    <h4>You have not followed any body yet nothing to show!</h4>
                                                </div>
                                            @endif
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
                                @foreach ($fallow as $item1)
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
                                                <div class="modal-body" id="comment_section{{ $item->id ?? '' }}">

                                                    <div class="row">
                                                        <div class="col-12">
                                                            <input type="hidden" name="post_id"
                                                                id="post_id{{ $item->id ?? '' }}"
                                                                value="{{ $item->id ?? '' }}">
                                                            <label>Comment</label>
                                                            <input name="comment" id="word{{ $item->id ?? '' }}"
                                                                class="form-control" placeholder="Write a comment">
                                                        </div>
                                                        <div class="col-12">
                                                            <div class="coment-btn mt-20">
                                                                <button class="sqr-btn"
                                                                    id="comment_send{{ $item->id ?? '' }}"
                                                                    type="submit" name="submit">Post Comment</button>
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
                                @endforeach
                                
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
        $('#comment_send{{ $item->id ?? '' }}').click(function() {
            <?php if (auth()->user() != null) { ?>
            var post_id = parseInt($('#post_id{{ $item->id ?? '' }}').val());
            var comment = $('#word{{$item->id ?? '' }}').val();
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
                        $("#comment_section{{ $item->id ?? '' }}").load(location.href +
                            " #comment_section{{ $item->id ?? '' }}");
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
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
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
@endsection

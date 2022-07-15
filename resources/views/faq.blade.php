@extends('layouts.app')
@section('content')
<!-- site__body -->
<div class="site__body">
    <!-- breadcrumb area start -->
<div class="breadcrumb-area">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="breadcrumb-wrap">
                    <nav aria-label="breadcrumb">
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">FAQ's</li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- breadcrumb area end -->
    <div class="block faq">
        <div class="container">
            <div class="card">
                <div class="card-header">
                    <h3>Frequently Asked Questions</h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        @foreach ($faq as $item)
                        <div class="card col-12 col-lg-6">
                            <div class="card-body">
                                <h6>{{$item->heading??''}}</h6>
                                {!!$item->description!!}
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div><!-- site__body / end -->
@endsection
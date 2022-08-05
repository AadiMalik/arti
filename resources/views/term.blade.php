@extends('layouts.app')
@section('content')
<!-- site__body -->
<div class="site__body">
    <div class="breadcrumb-area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb-wrap">
                        <nav aria-label="breadcrumb">
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Terms & Conditions</li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="block">
        <div class="container">
            <div class="card">
                <div class="card-header">
                    <h1 class="document__title">Terms And Conditions</h1>
                    <div class="document__subtitle">This Agreement was last modified on 27 May 2018.</div>
                </div>
                <div class="card-body typography">
                    @foreach ($term as $item)
                    <h4>{{$item->heading??''}}</h4>
                    <p>{!!$item->description??''!!}</p>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div><!-- site__body / end -->
@endsection
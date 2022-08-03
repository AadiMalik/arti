@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        Update Content
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.content.update",$content->id) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label class="required" for="page">Page</label>
                <input class="form-control" type="text" name="page" id="page" value="{{ $content->page??'' }}">
            </div>
            <div class="form-group">
                <label class="required" for="heading">Heading</label>
                <input type="text" class="form-control" name="heading" value="{{ $content->heading??'' }}">
            </div>
            @if($content->image!=null)
            <div class="form-group">
                <label class="required" for="image">Old Image</label>
                <img src="{{asset($content->image??'')}}" style="height: 100px; width:100px;" alt="">
            </div>
            @endif
            <div class="form-group">
                <label class="required" for="image">New Image</label>
                <input class="form-control" type="file" name="image" id="image">
            </div>
            <div class="form-group">
                <label class="required" for="description">Description</label>
                <textarea id="" class="summernote form-control" type="text" name="description">{!! $content->description??'' !!}</textarea>
            </div>
            <div class="form-group">
                <button class="btn btn-danger" type="submit">
                    UPDATE
                </button>
            </div>
        </form>
    </div>
</div>



@endsection
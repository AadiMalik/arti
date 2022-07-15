@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        Update Slider
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.slider.update",$slider->id) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            
            <div class="form-group">
                <label class="required" for="icon">Old Image</label>
                <img src="{{asset($slider->image)}}" style="width: 200px; height:200px;" alt="">
            </div>
            <div class="form-group">
                <label class="required" for="icon">New Image</label>
                <input class="form-control" type="file" name="image" id="image">
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
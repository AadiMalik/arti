@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        Update Brand
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.brand.update",$brand->id) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label class="required" for="heading">Name <small style="color:red;">*</small></label>
                <input class="form-control" type="text" name="name" id="name" value="{{ $brand->name }}">
                {!!$errors->first("name", "<span class='text-danger'>:message</span>")!!}
            </div>
            @if($brand->image!=null)
            <div class="form-group">
                <label class="required" for="icon">Old Image</label>
                <img src="{{asset($brand->image)}}" style="width: 200px; height:200px;" alt="">
            </div>
            @endif
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
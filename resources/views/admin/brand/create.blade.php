@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        Create Brand
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.brand.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="heading">Name <small style="color:red;">*</small></label>
                <input class="form-control" type="text" name="name" id="name" value="{{ old('name') }}">
                {!!$errors->first("name", "<span class='text-danger'>:message</span>")!!}
            </div>
            <div class="form-group">
                <label class="required" for="icon">Image/logo <small style="color:red;">*</small></label>
                <input class="form-control" type="file" name="image" id="image">
                {!!$errors->first("image", "<span class='text-danger'>:message</span>")!!}
            </div>
            <div class="form-group">
                <button class="btn btn-danger" type="submit">
                    SAVE
                </button>
            </div>
        </form>
    </div>
</div>



@endsection
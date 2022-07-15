@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        Create Product
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.product.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="name">Name</label>
                <input class="form-control" type="text" name="name" id="name" value="{{ old('name') }}" required>
                {!!$errors->first("name", "<span class='text-danger'>:message</span>")!!}
            </div>
            
            <div class="form-group">
                <label class="required" for="price">Min Price</label>
                <input class="form-control" type="number" name="price_low" id="price_low" value="{{ old('price_low') }}" required>
                {!!$errors->first("price_low", "<span class='text-danger'>:message</span>")!!}
            </div>
            <div class="form-group">
                <label class="required" for="price">Max Price</label>
                <input class="form-control" type="number" name="price_high" id="price_high" value="{{ old('price_high') }}" required>
                {!!$errors->first("price_high", "<span class='text-danger'>:message</span>")!!}
            </div>
            <div class="form-group">
                <label class="required" for="image">Image One</label>
                <input class="form-control" type="file" name="image1" id="image1" required>
                {!!$errors->first("image1", "<span class='text-danger'>:message</span>")!!}
            </div>
            <div class="form-group">
                <label class="required" for="icon">Image Two</label>
                <input class="form-control" type="file" name="image2" id="image2" required>
                {!!$errors->first("image2", "<span class='text-danger'>:message</span>")!!}
            </div>
            <div class="form-group">
                <label class="required" for="price">Type</label>
                <input class="form-control" type="text" name="type" id="type" value="{{ old('type') }}" required>
                {!!$errors->first("type", "<span class='text-danger'>:message</span>")!!}
            </div>
            <div class="form-group">
                <label class="required" for="category">Category</label>
                <select class="form-control" name="category" id="category" required>
                    @foreach ($category as $item)
                        <option value="{{$item->id??''}}">{{$item->name??''}}</option>
                    @endforeach
                </select>
                {!!$errors->first("category", "<span class='text-danger'>:message</span>")!!}
            </div>
            <div class="form-group">
                <label class="required" for="description">Description</label>
                <textarea id="div_editor1" class="form-control" type="text" name="description" required>{{ old('description') }}</textarea>
                {!!$errors->first("description", "<span class='text-danger'>:message</span>")!!}
            </div>
            
            <div class="form-group">
                <label class="required" for="tags">Tags</label>
                <input type="text" class="form-control inputtags" name="tags">
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
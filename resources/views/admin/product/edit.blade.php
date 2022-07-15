@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        Update Product
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.product.update",$product->id) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label class="required" for="name">Name</label>
                <input class="form-control" type="text" name="name" id="name" value="{{ $product->name??''}}" required>
                {!!$errors->first("name", "<span class='text-danger'>:message</span>")!!}
            </div>
            
            <div class="form-group">
                <label class="required" for="price">Min Price</label>
                <input class="form-control" type="number" name="price_low" id="price_low" value="{{ $product->price_low??''}}" required>
                {!!$errors->first("price_low", "<span class='text-danger'>:message</span>")!!}
            </div>
            <div class="form-group">
                <label class="required" for="price">Max Price</label>
                <input class="form-control" type="number" name="price_high" id="price_high" value="{{ $product->price_high??'' }}" required>
                {!!$errors->first("price_high", "<span class='text-danger'>:message</span>")!!}
            </div>
            <div class="form-group">
                <label class="required" for="price">Type</label>
                <input class="form-control" type="text" name="type" id="type" value="{{ $product->type??'' }}" required>
                {!!$errors->first("type", "<span class='text-danger'>:message</span>")!!}
            </div>
            <div class="form-group">
                <label class="required" for="category">Category</label>
                <select class="form-control" name="category" id="category" required>
                    @foreach ($category as $item)
                        <option value="{{$item->id??''}}" @if($product->category_id==$item->id) selected @endif>{{$item->name??''}}</option>
                    @endforeach
                </select>
                {!!$errors->first("category", "<span class='text-danger'>:message</span>")!!}
            </div>
            <div class="form-group">
                <label class="required" for="description">Description</label>
                <textarea id="div_editor1" class="form-control" type="text" name="description" required>{{ $product->description }}</textarea>
                {!!$errors->first("description", "<span class='text-danger'>:message</span>")!!}
            </div>
            
            <div class="form-group">
                <label class="required" for="status">Status</label>
                <select class="form-control" name="status" id="status" required>
                        <option value="0" @if($product->status==0) selected @endif>Active</option>
                        <option value="1" @if($product->status==1) selected @endif>Block</option>
                </select>
                {!!$errors->first("status", "<span class='text-danger'>:message</span>")!!}
            </div>
            <div class="form-group">
                <label class="required" for="tags">Tags</label>
                <input class="form-control inputtags" type="text" name="tags" value="{{ $product->tags }}">
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
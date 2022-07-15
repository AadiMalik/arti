@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        Update Arti Product
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.user-product.update",$user_product->id) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label class="required" for="name">Product Name</label>
                <select class="form-control" name="product" id="product" required>
                    @foreach ($product as $item)
                        <option value="{{$item->id??''}}" @if($user_product->product_id==$item->id) selected @endif>{{$item->name??''}}({{$item->type??''}})</option>
                    @endforeach
                </select>
                {!!$errors->first("product", "<span class='text-danger'>:message</span>")!!}
            </div>
            <div class="form-group">
                <label class="required" for="price">Price High</label>
                <input class="form-control" type="number" name="price_high" id="price_high" value="{{ $user_product->price_high??''}}" required>
                {!!$errors->first("price_high", "<span class='text-danger'>:message</span>")!!}
            </div>
            <div class="form-group">
                <label class="required" for="price">Price Low</label>
                <input class="form-control" type="number" name="price_low" id="price_low" value="{{ $user_product->price_low??''}}" required>
                {!!$errors->first("price_low", "<span class='text-danger'>:message</span>")!!}
            </div>
            <div class="form-group">
                <label class="required" for="status">Status</label>
                <select class="form-control" name="status" id="status" required>
                        <option value="0" @if($user_product->status==0) selected @endif>Active</option>
                        <option value="1" @if($user_product->status==1) selected @endif>Block</option>
                </select>
                {!!$errors->first("status", "<span class='text-danger'>:message</span>")!!}
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
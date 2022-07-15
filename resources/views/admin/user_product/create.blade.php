@extends('layouts.admin')
@section('content')
    <div class="card">
        <div class="card-header">
            Create Arti Product
        </div>

        <div class="card-body">
            <form method="POST" action="{{ route('admin.user-product.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label class="required" for="name">Product Name</label>
                    <select class="form-control" name="product" id="product" required>
                        @foreach ($product as $item)
                            <option value="{{ $item->id ?? '' }}">{{ $item->name ?? '' }}({{ $item->type ?? '' }})</option>
                        @endforeach
                    </select>
                    {!! $errors->first('product', "<span class='text-danger'>:message</span>") !!}
                </div>
                <div class="form-group">
                    <label class="required" for="price">Price High</label>
                    <input class="form-control" type="number" name="price_high" id="price_high"
                        value="{{ old('price_high') }}" required>
                    {!! $errors->first('price_high', "<span class='text-danger'>:message</span>") !!}
                </div>
                <div class="form-group">
                    <label class="required" for="price">Price Low</label>
                    <input class="form-control" type="number" name="price_low" id="price_low"
                        value="{{ old('price_low') }}" required>
                    {!! $errors->first('price_low', "<span class='text-danger'>:message</span>") !!}
                </div>
                <div class="form-group">
                    <label class="required" for="name">User</label>
                    <select class="form-control" name="user" id="user" required>
                        @foreach ($user as $item)
                            <option value="{{ $item->id ?? '' }}">{{ $item->name ?? '' }}</option>
                        @endforeach
                    </select>
                    {!! $errors->first('user', "<span class='text-danger'>:message</span>") !!}
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


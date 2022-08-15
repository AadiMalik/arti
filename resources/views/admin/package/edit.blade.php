@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        Update Package
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.package.update",$package->id) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label class="required" for="name">Package Name</label>
                <input class="form-control" type="text" name="name" id="name" value="{{ $package->name??'' }}" required>
                {!!$errors->first("name", "<span class='text-danger'>:message</span>")!!}
            </div>
            <div class="form-group">
                <label class="required" for="price">Package Price</label>
                <input class="form-control" type="number" name="price" id="price" value="{{ $package->price??'' }}" required>
                {!!$errors->first("price", "<span class='text-danger'>:message</span>")!!}
            </div>
            <div class="form-group">
                <label class="required" for="days">Package Days</label>
                <input class="form-control" type="number" name="days" id="days" value="{{ $package->days??'' }}" required>
                {!!$errors->first("days", "<span class='text-danger'>:message</span>")!!}
            </div>
            <div class="form-group">
                <label class="required" for="add">Top Days Limit</label>
                <input class="form-control" type="number" name="add" id="add" value="{{ $package->add??'' }}" required>
                {!!$errors->first("add", "<span class='text-danger'>:message</span>")!!}
            </div>
            <div class="form-group">
                <label class="required" for="color">Package Color</label>
                <input class="form-control" type="color" name="color" id="color" value="{{ $package->color??'' }}" required>
                {!!$errors->first("color", "<span class='text-danger'>:message</span>")!!}
            </div>
            {{-- <div class="form-group">
                <label class="required" for="no">Display No</label>
                <input class="form-control" type="number" name="no" id="no" value="{{ $package->no??'' }}" required>
                {!!$errors->first("no", "<span class='text-danger'>:message</span>")!!}
            </div> --}}
            <div class="form-group">
                <label class="required" for="no">Status</label>
                <select name="status" class="form-control" id="" required>
                    <option value="0" @if($package->status==0) selected @endif>Active</option>
                    <option value="1" @if($package->status==1) selected @endif>Block</option>
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
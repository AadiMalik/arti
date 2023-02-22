@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        Update Tehsil
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.tehsil.update",$tehsil->id) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label class="required" for="name">Select District</label>
                <select name="district_id" class="form-control" name="name" id="name" id="">
                    @foreach ($district as $item)
                        <option value="{{ $item->id }}" @if($item->id==$tehsil->district_id) @endif>{{ $item->name ?? '' }}</option>
                    @endforeach
                </select>
                {!! $errors->first('district_id', "<span class='text-danger'>:message</span>") !!}
            </div>
            <div class="form-group">
                <label class="required" for="name">Tehsil Name</label>
                <input class="form-control" type="text" name="name" id="name" value="{{ $tehsil->name??'' }}"
                    required>
                {!! $errors->first('name', "<span class='text-danger'>:message</span>") !!}
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
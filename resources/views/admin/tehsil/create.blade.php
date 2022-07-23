@extends('layouts.admin')
@section('content')
    <div class="card">
        <div class="card-header">
            Create Tehsil
        </div>

        <div class="card-body">
            <form method="POST" action="{{ route('admin.tehsil.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label class="required" for="name">Select District</label>
                    <select name="district_id" class="form-control" name="name" id="name" id="">
                        @foreach ($district as $item)
                            <option value="{{ $item->id }}">{{ $item->name ?? '' }}</option>
                        @endforeach
                    </select>
                    {!! $errors->first('district_id', "<span class='text-danger'>:message</span>") !!}
                </div>
                <div class="form-group">
                    <label class="required" for="name">Tehsil Name</label>
                    <input class="form-control" type="text" name="name" id="name" value="{{ old('name') }}"
                        required>
                    {!! $errors->first('name', "<span class='text-danger'>:message</span>") !!}
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

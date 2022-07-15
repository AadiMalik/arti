@extends('layouts.admin')
@section('content')
    <div class="card">
        <div class="card-header">
            Send Message
        </div>

        <div class="card-body">

            <div class="form-group">
                <table>
                    <tr>
                        <td>Name:</td>
                        <td>{{ $contact->name??'' }}</td>
                    </tr>
                    <tr>
                        <td>Subject:</td>
                        <td>{{ $contact->subject??'' }}</td>
                    </tr>
                    <tr>
                        <td>Email:</td>
                        <td>{{ $contact->email??'' }}</td>
                    </tr>
                    <tr>
                        <td>Phone:</td>
                        <td>{{ $contact->phone??'' }}</td>
                    </tr>
                    <tr>
                        <td>Message:</td>
                        <td>{{ $contact->message??'' }}</td>
                    </tr>
                </table>
            </div>
            <form method="POST" action="{{ route('admin.contact.update',$contact->id) }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label class="required" for="description">Reply</label>
                    <textarea id="div_editor1" class="form-control" type="text" name="description"
                        required>{{ old('description') }}</textarea>
                    {!! $errors->first('description', "<span class='text-danger'>:message</span>") !!}
                </div>
                <div class="form-group">
                    <button class="btn btn-danger" type="submit">
                        Send
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection

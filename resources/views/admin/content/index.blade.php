@extends('layouts.admin')
@section('content')
    @can('content_create')
        <div style="margin-bottom: 10px;" class="row">
            <div class="col-lg-12">
                <a class="btn btn-success" href="{{ route('admin.content.create') }}">
                    Add New
                </a>
            </div>
        </div>
    @endcan

    <div class="card">
        <div class="card-header">
           contents
        </div>
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped table-hover" id="tableExport" style="width:100%;">
                    <thead>
                        <tr>    
                            <th>
                                Sr.
                            </th>
                            <th>
                                Page
                            </th>
                            <th>
                                Heading
                            </th>
                            <th>
                                Key
                            </th>
                            <th>
                                Image
                            </th>
                            <th>
                                Description
                            </th>
                            <th>
                                Actions
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($content as $index=> $item)
                            <tr>
                                <td>
                                    {{ $index+1 }}
                                </td>
                                <td>
                                    {{ $item->page??'' }}
                                </td>
                                <td>
                                    {{ $item->heading??'' }}
                                </td>
                                <td>
                                    {{ $item->key??'' }}
                                </td>
                                <td>
                                    <img src="{{asset($item->image??'')}}" style="height: 200px; width:200px;" alt="">
                                </td>
                                <td>
                                    {!!Str::limit($item->description??'',200)!!}
                                </td>
                                <td>
                                    @can('content_edit')
                                        <a class="btn btn-xs btn-info" href="{{ route('admin.content.edit', $item->id) }}">
                                            Edit
                                        </a>
                                    @endcan
                                </td>

                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
@section('script')

@endsection


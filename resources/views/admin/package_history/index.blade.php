@extends('layouts.admin')
@section('content')

    <div class="card">
        <div class="card-header">
            Package Histories
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
                                Package ID
                            </th>
                            <th>
                                Package Name
                            </th>
                            <th>
                                Package Price
                            </th>
                            <th>
                                Package Days
                            </th>
                            <th>
                                Package Adds
                            </th>
                            <th>
                                Created At
                            </th>
                            <th>
                                User Name
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($package_history as $index=> $item)
                            <tr>
                                <td>
                                    {{ $index+1 }}
                                </td>
                                <td>
                                    {{ $item->package_id??'' }}
                                </td>
                                <td>
                                    {{ $item->package_name??'' }}
                                </td>
                                <td>
                                    {{ $item->package_price??'' }}
                                </td>
                                <td>
                                    {{ $item->package_days??'' }}
                                </td>
                                <td>
                                    {{ $item->package_add??'' }}
                                </td>
                                
                                <td>
                                    {{ $item->created_at??'' }}
                                </td>
                                <td>
                                    {{ $item->user_name->username??'' }}
                                </td>

                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

@extends('layouts.admin')
@section('content')


    <div class="card">
        <div class="card-header">
            Phone Counter (Total:<b>{{$arti_phone->sum('hit')??'0'}}</b>) 
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
                                    User
                                </th>
                                
                                <th>
                                    View at
                                </th>
                                
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($arti_phone as $index => $item)
                                <tr>
                                    <td>
                                        {{ $index + 1 }}
                                    </td>
                                    <td>
                                        {{ $item->user_name->first_name ?? '' }} {{ $item->user_name->last_name ?? '' }}
                                    </td>
                                    
                                    <td>
                                        {{ $item->created_at ?? '' }}
                                    </td>
                                    
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

            </div>
        </div>
    </div>
@endsection

@extends('layouts.admin')
@section('content')
    @can('forsale_product_create')
        <div style="margin-bottom: 10px;" class="row">
            <div class="col-lg-12">
                <a class="btn btn-success" href="{{ url('sell') }}">
                   + Sell
                </a>
            </div>
        </div>
    @endcan

    <div class="card">
        <div class="card-header">
            For Sale Products
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
                                Product Name
                            </th>
                            <th>
                                Product Price
                            </th>
                            <th>
                                View
                            </th>
                            <th>
                                Product image
                            </th>
                            <th>
                                Actions
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($product as $index => $item)
                            <tr>
                                <td>
                                    {{ $index + 1 }}
                                </td>
                                <td>
                                    {{ $item->name ?? '' }}
                                </td>
                                <td>
                                    {{ $item->price ?? '' }}
                                </td>
                                <td>
                                    {{ $item->hits ?? '' }}
                                </td>
                                <td>
                                    <img src="{{ asset($item->image1) }}" style="width: 100px; height:100px;"
                                        alt="">
                                </td>
                                <td>
                                    {{-- @can('forsale_product_edit')
                                        <a class="btn btn-xs btn-info" href="{{ route('forsale.edit', $item->id) }}">
                                            Edit
                                        </a>
                                    @endcan --}}
                                    <button type="button" class="btn btn-xs btn-primary" data-toggle="modal" data-target="#product{{$item->id}}">
                                        Detail
                                      </button>
                                    @can('forsale_product_delete')
                                        <a class="btn btn-xs btn-danger"
                                            onclick="productDelete{{ $item->id }}({{ $item->id }})">
                                            Delete
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
    @foreach ($product as $item)
        <!-- Modal -->
        <div class="modal fade" id="product{{$item->id}}" role="dialog">
            <div class="modal-dialog" style="max-width: 800px;">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="producttitle{{$item->id}}">Product Detail  <br><small>Hits:{{$item->hits??''}}</small></h5>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-6">
                                <label for="">Product Name:</label>
                                <b>{{$item->name??''}}</b>
                            </div>
                            <div class="col-md-6">
                                <label for="">Product Quantity:</label>
                                <b>{{$item->quantity??''}}</b>
                            </div>
                            <div class="col-md-6">
                                <label for="">Product Price:</label>
                                <b>{{$item->price??''}}</b>
                            </div>
                            <div class="col-md-6">
                                <label for="">Company Name:</label>
                                <b>{{$item->company_name??''}}</b>
                            </div>
                            <div class="col-md-6">
                                <label for="">Product Category:</label>
                                <b>{{$item->category??''}}</b>
                            </div>
                            <div class="col-md-6">
                                <label for="">Product Sub Category:</label>
                                <b>{{$item->sub_category??''}}</b>
                            </div>
                            <div class="col-md-12">
                                <label for="">Address:</label>
                                <b>{{$item->address??''}}</b>
                            </div>
                            <div class="col-md-6">
                                <label for="">District/City:</label>
                                <b>{{$item->district_name->name??''}}</b>
                            </div>
                            <div class="col-md-6">
                                <label for="">Tehsil:</label>
                                <b>{{$item->tehsil_name->name??''}}</b>
                            </div>
                            <div class="col-md-12">
                                <label for="">Product Images:</label><br>
                                <img src="{{asset($item->image1)}}" style="height: 50px; width:50px; margin-right:5px;" alt="">
                                <img src="{{asset($item->image2)}}" style="height: 50px; width:50px; margin-right:5px;" alt="">
                                @if($item->image3!=null)
                                <img src="{{asset($item->image3)}}" style="height: 50px; width:50px; margin-right:5px;" alt="">
                                @endif
                                @if($item->image4!=null)
                                <img src="{{asset($item->image4)}}" style="height: 50px; width:50px; margin-right:5px;" alt="">
                                @endif
                                @if($item->image5!=null)
                                <img src="{{asset($item->image5)}}" style="height: 50px; width:50px; margin-right:5px;" alt="">
                                @endif
                                @if($item->image6!=null)
                                <img src="{{asset($item->image6)}}" style="height: 50px; width:50px; margin-right:5px;" alt="">
                                @endif
                                @if($item->image7!=null)
                                <img src="{{asset($item->image7)}}" style="height: 50px; width:50px; margin-right:5px;" alt="">
                                @endif
                                @if($item->image8!=null)
                                <img src="{{asset($item->image8)}}" style="height: 50px; width:50px; margin-right:5px;" alt="">
                                @endif
                                @if($item->image9!=null)
                                <img src="{{asset($item->image9)}}" style="height: 50px; width:50px; margin-right:5px;" alt="">
                                @endif
                                @if($item->image10!=null)
                                <img src="{{asset($item->image10)}}" style="height: 50px; width:50px; margin-right:5px;" alt="">
                                @endif
                                @if($item->image11!=null)
                                <img src="{{asset($item->image11)}}" style="height: 50px; width:50px; margin-right:5px;" alt="">
                                @endif
                                @if($item->image12!=null)
                                <img src="{{asset($item->image12)}}" style="height: 50px; width:50px; margin-right:5px;" alt="">
                                @endif
                            </div>
                            <div class="col-md-12">
                                <label for="">Description:</label>
                                <b>{!!$item->description??''!!}</b>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    @endforeach

    
@endsection
@section('script')
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/izitoast@1.4.0/dist/js/iziToast.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/5.10.0/tinymce.min.js"></script>
    @foreach ($product as $item)
        <script>
            function productDelete{{ $item->id }}(id) {
                swal({
                    title: "Are You Sure Want To Delete For Sale Product?",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                }).then((willDelete) => {
                    if (willDelete) {
                        var url = '{{ route('deleteForsale', ':id') }}';
                        url = url.replace(':id', id);
                        $.ajax({
                            type: "POST",
                            headers: {
                                'X-CSRF-TOKEN': '{{ csrf_token() }}'
                            },
                            url: url,
                            dataType: "json",
                            data: {
                                id: id
                            },
                            success: function(data) {
                                console.log(data);
                                //var data = JSON.parse(response);
                                iziToast.success({
                                    message: data.message,
                                    position: 'topRight'
                                });
                                //Reload page
                                window.location.reload();

                            }
                        });
                    }
                });

            }
        </script>
    @endforeach
@endsection

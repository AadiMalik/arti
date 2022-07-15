@extends('layouts.admin')
@section('content')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">

            @can('user_product_create')
                <a class="btn btn-success" href="{{ route('client.user-product.create') }}">
                    Add New
                </a>
            @endcan
            @can('user_product_edit')
                <a class="btn btn-warning" href="{{ route('client.user-product.edit', Auth()->user()->id) }}">
                    Edit
                </a>
            @endcan
        </div>
    </div>


    <div class="card">
        <div class="card-header">
            Products
        </div>
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <div class="card-body">
            <div class="table-responsive">
                <form action="{{ route('client.PostProduct') }}" method="POST">
                    @csrf
                    <table class="table table-striped table-hover" id="tableExport" style="width:100%;">
                        <thead>
                            <tr>
                                <th></th>
                                <th>
                                    Sr.
                                </th>
                                <th>
                                    Product Name
                                </th>
                                
                                <th>
                                    Price Low
                                </th>
                                <th>
                                    Price High
                                </th>
                                <th>
                                    Type
                                </th>
                                <th>
                                    Category
                                </th>
                                <th>
                                    Weight
                                </th>

                                <th>
                                    Image One
                                </th>
                                <th>
                                    Image Two
                                </th>
                                <th>
                                    Status
                                </th>
                                {{-- <th>
                                Description
                            </th> --}}
                                <th>
                                    Actions
                                </th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($user_product as $index => $item)
                                <tr>
                                    <td>
                                        <input type="checkbox" name="product_id[]" value="{{ $item->id ?? '' }}"
                                            id="">
                                    </td>
                                    <td>
                                        {{ $index + 1 }}
                                    </td>
                                    <td>
                                        {{ $item->product_name->name ?? '' }}
                                    </td>
                                    
                                    <td>
                                        {{ $item->price_low ?? '' }}
                                    </td>
                                    <td>
                                        {{ $item->price_high ?? '' }}
                                    </td>
                                    <td>
                                        {{ $item->product_name->type ?? '' }}
                                    </td>
                                    <td>
                                        {{ $item->product_name->category_name->name ?? '' }}
                                    </td>
                                    <td>
                                        {{ $item->weight ?? '' }}/{{$item->weight_type??'KG'}}
                                    </td>

                                    <td>
                                        <img src="{{ asset($item->image1 ?? '') }}" style="height: 100px; width:100px;"
                                            alt="">
                                    </td>
                                    <td>
                                        <img src="{{ asset($item->image2 ?? '') }}" style="height: 100px; width:100px;"
                                            alt="">
                                    </td>
                                    <td>
                                        @if ($item->status == 0)
                                            Active
                                        @else
                                            Block
                                        @endif
                                    </td>
                                    {{-- <td>
                                    {!! $item->description??'' !!}
                                </td> --}}
                                    <td>
                                        @can('user_product_edit')
                                        <a class="btn btn-warning" href="{{ route('client.Product.Image.Edit', $item->id) }}">
                                            Edit Image
                                        </a>
                                    @endcan
                                        @can('user_product_delete')
                                            <a class="btn btn-xs btn-danger"
                                                onclick="userproductDelete{{ $item->id }}({{ $item->id }})">
                                                Delete
                                            </a>
                                        @endcan
                                    </td>

                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Post</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
@endsection
@section('script')
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/izitoast@1.4.0/dist/js/iziToast.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/5.10.0/tinymce.min.js"></script>
    @foreach ($user_product as $item)
        <script>
            function userproductDelete{{ $item->id }}(id) {
                swal({
                    title: "Are You Sure Want To Delete Product?",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                }).then((willDelete) => {
                    if (willDelete) {
                        var url = '{{ route('client.deleteUserProduct', ':id') }}';
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

@extends('layouts.admin')
@section('content')
    <div class="card">
        <div class="card-header">
            {{-- Update & Post Products --}}
            <form method="POST" action="{{ route('client.user-product.update', Auth()->user()->id) }}"
                enctype="multipart/form-data">
                @csrf
                @method('PUT')
                
        </div>
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <div class="card-body">
            <div class="table-responsive">
                <table  class="table table-striped table-hover" style="width:100%;">
                    <thead>
                        <tr>
                            {{-- <th></th> --}}
                            <th>
                                Sr.
                            </th>
                            <th>
                                Product Name
                            </th>
                            <th>
                                Min Price
                            </th>
                            <th>
                                Max Price
                            </th>
                            <th>
                                Weight
                            </th>
                            <th style="width: 120px;">
                                Weight Type
                            </th>
                            <th>
                                Image 1
                            </th>
                            <th>
                                Image 2
                            </th>
                            <th>
                                Actions
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($user_product as $index => $item)
                            <tr>
                                {{-- <td>
                                    <input type="checkbox" name="product_id[]" value="{{ $item->id ?? '' }}"
                                        id="">
                                </td> --}}

                                <td>
                                    <input type="hidden" name="id[]" value="{{ $item->id ?? '' }}">
                                    {{ $index + 1 }}
                                </td>
                                <td>
                                    {{ $item->product_name->name ?? '' }}
                                </td>
                                <td>
                                    <input class="form-control" type="number" name="price_low[]" id="price_low"
                                        value="{{ $item->price_low ?? '' }}" required>
                                    {!! $errors->first('price_low', "<span class='text-danger'>:message</span>") !!}
                                </td>
                                <td>
                                    <input class="form-control" type="number" name="price_high[]" id="price_high"
                                        value="{{ $item->price_high ?? '' }}" required>
                                    {!! $errors->first('price_high', "<span class='text-danger'>:message</span>") !!}
                                </td>
                                <td>
                                    <input class="form-control" type="number" name="weight[]" id="weight"
                                        value="{{ $item->weight ?? '' }}" required>
                                    {!! $errors->first('weight', "<span class='text-danger'>:message</span>") !!}
                                </td>
                                <td>
                                    <select name="weight_type[]" class="form-control" id="" required>
                                        <option value="KG">KG</option>
                                        <option value="MAN">MAN</option>
                                        <option value="TON">TON</option>
                                    </select>
                                </td>
                                <td>
                                    <img src="{{asset($item->image1??'')}}" style="height: 100px; width:100px;" alt="">
                                </td>
                                <td>
                                    <img src="{{asset($item->image2??'')}}" style="height: 100px; width:100px;" alt="">
                                </td>
                                <td>
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
            </div>
        </div>
        <div class="card-footer">
            <button class="btn btn-success" type="submit">
                POST
            </button>
        </div>
    </form>
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

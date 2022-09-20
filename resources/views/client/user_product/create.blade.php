@extends('layouts.admin')
@section('content')
    <div class="card">
        <div class="card-header">
            Create Product
        </div>

        <div class="card-body">
            <form method="POST" action="{{ route('client.user-product.store') }}" enctype="multipart/form-data">
                @csrf
                @if(isset($select_category))
                <div class="form-group">
                    <b>Select Category: {{$select_category->name??''}}</b>
                </div>
                @endif
                <div class="form-group">
                    <div class="dropdown filter-dropdown d-inline mr-1">
                        <button class="btn btn-primary " type="button" id="invoice-dropdown" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false" data-selected="">
                            <i class="ti-filter"></i> Filter by Category</button>
                        <div class="dropdown-menu" aria-labelledby="status-dropdown">
                            <a class="dropdown-item" href="" data-value="">All</a>
                            @foreach ($category as $item)
                                <a class="dropdown-item" href=""
                                    data-value="{{ $item->id }}">{{ $item->name ?? '' }}</a>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="required" for="name">Product Name</label>
                    <select class="form-control" name="product[]" id="product" multiple required>
                        @foreach ($product as $item)
                            <option value="{{ $item->id ?? '' }}">{{ $item->name ?? '' }}({{ $item->type ?? '' }})</option>
                        @endforeach
                    </select>
                    {!! $errors->first('product', "<span class='text-danger'>:message</span>") !!}
                </div>
                {{-- <div class="form-group">
                <label class="required" for="price">Price High</label>
                <input class="form-control" type="number" name="price_high" id="price_high" value="{{ old('price_high') }}" required>
                {!!$errors->first("price_high", "<span class='text-danger'>:message</span>")!!}
            </div>
            <div class="form-group">
                <label class="required" for="price">Price Low</label>
                <input class="form-control" type="number" name="price_low" id="price_low" value="{{ old('price_low') }}" required>
                {!!$errors->first("price_low", "<span class='text-danger'>:message</span>")!!}
            </div>
            <div class="form-group">
                <label class="required" for="image">Image One (optional)</label>
                <input class="form-control" type="file" name="image1" id="image1">
            </div>
            <div class="form-group">
                <label class="required" for="image">Image Two (optional)</label>
                <input class="form-control" type="file" name="image2" id="image2">
            </div>
            <div class="form-group">
                <label class="required" for="weight">Weight</label>
                <input class="form-control" type="number" name="weight" id="weight" value="{{ old('weight') }}" required>
                {!!$errors->first("weight", "<span class='text-danger'>:message</span>")!!}
            </div>
            <div class="form-group">
                <label class="required" for="description">Description</label>
                <textarea id="div_editor1" class="form-control" type="text" name="description" required>{{ old('description') }}</textarea>
                {!!$errors->first("description", "<span class='text-danger'>:message</span>")!!}
            </div> --}}
                <div class="form-group">
                    <button class="btn btn-danger" type="submit">
                        SAVE
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
@section('script')
    <script>
        $(document).ready(function() {
            $("#product").select2({
                templateResult: formatState
            });
        });

        let icons = {
            @foreach ($product as $loop => $item)

                "{{ $item->name ?? '' }}({{ $item->type }})": @foreach ($product_image->where('product_id', $item->id)->take(1) as $item2)
                    "{{ asset($item2->image ?? '') }}"
                @endforeach @if ($loop->last) @else
                    ,
                @endif
            @endforeach
        }

        function formatState(state) {
            if (!state.id) {
                return state.text;
            }
            console.log(state);
            var $state = $(
                `
    <div style="display: flex; align-items: center;">
       <div><img sytle="display: inline-block;" src="${icons[state.text]}" style="height: 30px;width: 40px;" /></div>
       <div style="margin-left: 10px;">
          ${state.text}
       </div>
    </div>
    `
            );
            return $state;
        }
    </script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('.filter-dropdown .dropdown-item').on('click', function(e) {

                e.preventDefault();
                var id = $('#v_id').val();

                $(this).closest('.dropdown').find('button').data('selected', $(this).data('value'));

                let category = $('#invoice-dropdown').data('selected');


                window.location.href = 'create/?category=' + category;

            });
        });
    </script>
@endsection

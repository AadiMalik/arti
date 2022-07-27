@extends('layouts.admin')
@section('content')
@section('style')
    <style>
        .catogery-list {
            display: block;
            float: left;
            list-style: none;
            width: 30%;
            height: 100%;
            background: #0c8b51;
            border: 2px solid #0c8b51;
        }

        .catogery-list li {
            display: block;
            color: #fff;
            padding: 12px 10px;
            font: 18px sans-serif;
            text-transform: capitalize;
            cursor: pointer;
        }

        .catogery-list li:hover {
            background: #fff;
            color: #0c8b51;
            border-left: 3px solid #ACDEB2
        }

        li.active {
            background: #fff;
            color: #23192D;
            border-left: 3px solid #ACDEB2
        }

        .products {
            width: 68%;
            min-height: 100%;
            height: auto;
            float: left;
            background: #0c8b51;
            margin-left: 10px;
            padding: 10px;
        }

        .products>a div {
            display: inline-block;
            width: 30.3333%;
            height: 50px;
            color: #fff;
            border: 1px solid #fff;
            margin: 5px;
            font-weight: bold;
            line-height: 50px;
            cursor: pointer;
        }

        .products>a div:hover {
            display: inline-block;
            width: 30.3333%;
            height: 50px;
            color: #0c8b51;
            border: 1px solid #fff;
            background: #fff;
            font-weight: bold;
            margin: 5px;
            line-height: 50px;
            cursor: pointer;
        }
    </style>
@endsection
<div class="card">
    <div class="card-header">
        Categories
    </div>
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <div class="card-body">
        <ul class="catogery-list">
            <li data-value="vehicles" class="active">Vehicles</li>
            <li data-value="crops">crops</li>
            <li data-value="fertilizers">Fertilizers</li>
        </ul>
        <div class="products">
            
            <a href="{{url('sell/vehicles/tractor')}}">
                <div class="vehicles"><img src="{{ asset('Images/tractor.png') }}" style="height: 50px; margin-right:5px;" alt="">Tractor</div>
            </a>
            <a href="{{url('sell/vehicles/dumper')}}">
                <div class="vehicles">
                    <img src="{{ asset('Images/dumper.png') }}" style="height: 50px; margin-right:5px;" alt="">Dumper
                </div>
            </a>
            <a href="{{url('sell/vehicles/exivator')}}">
                <div class="vehicles"><img src="{{ asset('Images/exivator.png') }}" style="height: 50px; margin-right:5px;" alt="">Exivator</div>
            </a>
            <a href="{{url('sell/vehicles/harvestor')}}">
                <div class="vehicles"><img src="{{ asset('Images/harvestor.png') }}" style="height: 50px; margin-right:5px;" alt="">Harvestor</div>
            </a>
            <a href="{{url('sell/crops/fruit')}}">
                <div class="crops"><img src="{{ asset('Images/fruit.png') }}" style="height: 50px; margin-right:5px;" alt="">Fruit</div>
            </a>
            
            <a href="{{url('sell/crops/vegitable')}}">
                <div class="crops"><img src="{{ asset('Images/vegi.png') }}" style="height: 50px; margin-right:5px;" alt="">Vegitable</div>
            </a>
            </a>
            <a href="{{url('sell/crops/grain')}}">
                <div class="crops"><img src="{{ asset('Images/grain.png') }}" style="height: 50px; margin-right:5px;" alt="">Grain</div>
            </a>
            
            <a href="{{url('sell/crops/other')}}">
                <div class="crops"><img src="{{ asset('Images/other.png') }}" style="height: 50px; margin-right:5px;" alt="">Others</div>
            </a>
            <a href="{{url('sell/fertilizers/fertilizer')}}">
                <div class="fertilizers"><img src="{{ asset('Images/ferti.png') }}" style="height: 50px; margin-right:5px;" alt="">Fertilizer</div>
            </a>
            
        </div>
    </div>
</div>
@endsection
@section('script')
<script>
    $(".products div").hide();
    $(".vehicles").show();

    $(".catogery-list li").click(function() {
        var $this = $(this);
        $(".products div").hide();
        $("." + $this.data("value")).show();
        $this.addClass("active").siblings("li").removeClass("active")
    });
</script>
@endsection

@extends('layouts.app')

@section('content')
    <!-- breadcrumb area start -->
    <div class="breadcrumb-area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb-wrap">
                        <nav aria-label="breadcrumb">
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Register</li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb area end -->
    <div class="login-register-wrapper">
        <div class="container">
            <div class="member-area-from-wrap">
                <div class="row">
                    <!-- Register Content Start -->
                    <div class="col-md-6 offset-md-3">
                        <div class="login-reg-form-wrap mt-md-34 mt-sm-34">
                            <h2 style="margin-bottom: 0px;">Register</h2>
                            <form action="{{ route('register') }}" method="POST">
                                @csrf
                                @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="single-input-item">
                                            <select name="role" id="" class="form-control" onchange="showDiv(this)" >
                                                <option selected disabled>--Select Your Category--</option>
                                                <option value="2">Zameendar</option>
                                                <option value="3">Commession Agent</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row" id="hidden_div" style="display:none; margin-top:10px;">
                                    <div class="col-md-12">
                                        <label for=""><b>Select Your Market</b></label>
                                    </div>
                                    <div class="col-md-3">
                                        <input type="checkbox" value="Gala Mandi" name="mandi[]"> Gala Mandi
                                    </div>
                                    <div class="col-md-3">
                                        <input type="checkbox" value="Sabzi Mandi" name="mandi[]"> Sabzi Mandi
                                    </div>
                                    <div class="col-md-3">
                                        <input type="checkbox" value="Mashli Mandi" name="mandi[]"> Mashli Mandi
                                    </div>
                                    <div class="col-md-3">
                                        <input type="checkbox" value="Phool Mandi" name="mandi[]"> Phool Mandi
                                    </div>
                                </div>
                                <div class="single-input-item">
                                    <input type="text" name="username" value="{{ old('username') }}"
                                        placeholder="Enter Username" required />
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="single-input-item">
                                            <input type="text" name="first_name" value="{{ old('first_name') }}"
                                                placeholder="First Name" required />
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="single-input-item">
                                            <input type="text" name="last_name" value="{{ old('last_name') }}"
                                                placeholder="Last Name" required />
                                        </div>
                                    </div>
                                </div>
                                <div class="single-input-item">
                                    <input type="number" name="phone1" value="{{ old('phone1') }}"
                                        placeholder="Enter your Phone" required />
                                </div>
                                <div class="single-input-item">
                                    <input type="email" name="email" value="{{ old('email') }}"
                                        placeholder="Enter your Email" required />
                                </div>

                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="single-input-item">
                                            <select name="district_id" class="select2" id="district-dropdown">
                                                <option disabled selected>--Select District--</option>
                                                @foreach ($district as $item)
                                                    <option value="{{ $item->id }}">{{ $item->name ?? '' }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="single-input-item">
                                            <select name="tehsil_id" class="select2" id="district-dropdown">
                                                <option disabled selected>--Select Tehsil--</option>
                                                @foreach ($tehsil as $item)
                                                    <option value="{{ $item->id }}">{{ $item->name ?? '' }}({{$item->district_name->name??''}})</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="single-input-item">
                                            <input type="password" name="password" id="myInput"
                                                placeholder="Enter your Password" required>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="single-input-item">
                                            <input type="password" name="password_confirmation" id="myInput1"
                                                placeholder="Repeat your Password" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <input type="checkbox" onclick="myFunction()"> Show Password
                                    </div>
                                </div>
                                <div class="single-input-item">
                                    <button type="submit" class="sqr-btn">Register</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- Register Content End -->
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')

    <script>
        $(document).ready(function() {
            $('#district-dropdown').on('change', function() {
                var district_id = this.value;
                $("#tehsil-dropdown").html('');
                $.ajax({
                    url: "{{ url('get-tehsil-by-district') }}",
                    type: "POST",
                    data: {
                        district_id: district_id,
                        _token: '{{ csrf_token() }}'
                    },
                    dataType: 'json',
                    success: function(result) {
                        $.each(result.tehsil, function(key, value) {
                            $("#tehsil-dropdown").append('<option value="' + value.id + '">' + value.name + '</option>');
                        });
                    }
                });
            });
        });
    </script>
    <script>
        function myFunction() {
            var x = document.getElementById("myInput");
            var x1 = document.getElementById("myInput1");
            if (x.type == "password" && x1.type == "password") {
                x.type = "text";
                x1.type = "text";
            } else {
                x.type = "password";
                x1.type = "password";
            }
        }
    </script>
    <script type="text/javascript">
        function showDiv(select){
           if(select.value==3){
            document.getElementById('hidden_div').style.display = "flex";
           } else{
            document.getElementById('hidden_div').style.display = "none";
           }
        } 
        </script>
@endsection

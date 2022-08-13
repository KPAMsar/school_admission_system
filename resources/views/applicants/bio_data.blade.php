<?php
if ($applicant  != null) {
    $address_1 = $applicant->address_1;
    $city_1 = $applicant->city_1;
    $address_2 = $applicant->address_2;
    $city_2 = $applicant->city_2;
    $country_of_residence = $applicant->country_residence;
    $state_of_residence = $applicant->state_residence;
    $lga_of_residence = $applicant->lga_residence;
    $country_of_origin = $applicant->country_origin;
    $state_of_origin = $applicant->state_origin;
    $lga_of_origin = $applicant->lga_origin;
    $dob_day = explode('-', $applicant->dob,2);
    $dob_month = explode('-', $applicant->dob,1);
    $dob_year = explode('-', $applicant->dob,0);
    $nok_first_name = $applicant->nok_first_name;
    $nok_last_name = $applicant->nok_last_name;
    $nok_address = $applicant->nok_address;
    $nok_city = $applicant->nok_city;
    $nok_country_of_residence = $applicant->nok_country;
    $nok_state_of_residence = $applicant->nok_state;
    $nok_lga_of_residence = $applicant->nok_lga;
    $nok_phone_number = $applicant->nok_phone;
    $nok_email = $applicant->nok_email;
} else {
    $address_1 = old('address_1');
    $city_1 = old('city_1');
    $address_2 = old('address_2');
    $city_2 = old('city_2');
    $country_of_residence = old('country_of_residence');
    $state_of_residence = old('state_of_residence');
    $lga_of_residence = old('lga_of_residence');
    $country_of_origin = old('country_of_origin');
    $state_of_origin = old('state_of_origin');
    $lga_of_origin = old('lga_of_origin');
    $dob_day = old('dob_day');
    $dob_month = old('dob_month');
    $dob_year = old('dob_year');
    $nok_first_name = old('nok_first_name');
    $nok_last_name = old('nok_last_name');
    $nok_address = old('nok_address');
    $nok_city = old('nok_city');
    $nok_country_of_residence = old('nok_country_of_residence');
    $nok_state_of_residence = old('nok_state_of_residence');
    $nok_lga_of_residence = old('nok_lga_of_residence');
    $nok_phone_number = old('nok_phone_number');
    $nok_email = old('nok_email');
}


?>

@extends('layouts.applicant')

@section('style')

<link href="{{asset('assets/plugins/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.css')}}" rel="stylesheet" />
<!-- Bootstrap Select Css -->
<link href="{{asset('assets/plugins/bootstrap-select/css/bootstrap-select.css')}}" rel="stylesheet" />
<!-- Custom Css -->
<link rel="stylesheet" href="{{asset('assets/css/main.css')}}">
<link rel="stylesheet" href="{{asset('assets/css/color_skins.css')}}">

@endsection


@section('content')
<br><br>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Applicants</h1>
                </div>
                <div class="col-sm-6">
                    <!-- <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">General Form</li>
                    </ol> -->


                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->


    <div class="container">
        <div class="row">
            <div class="col">

                <div class="card">

                    <div class="col-auto text-right float-right ml-auto" style="padding-top:6px;">
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <div class="container">
                            <div class="row clearfix">
                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <div class="">
                                        <div class="header">
                                            <h2><strong>Bio-Data Form</strong>
                                                <small>Fill the bio-data form below</small>
                                            </h2>

                                        </div>
                                        <form action="{{route('save_applicant_bio_data')}}" method="post">
                                            @csrf

                                            <div class="body">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <x-alert />
                                                    </div>
                                                    <div class="col-md-6 ">
                                                        <label for="">Address 1</label>
                                                        <div class="form-group">
                                                            <input type="text" class="form-control" placeholder="Address 1" name="address_1" id="address_1" value="{{$address_1}}">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 ">
                                                        <label for="">City</label>
                                                        <div class="form-group">
                                                            <input type="text" class="form-control" placeholder="City" name="city_1" id="city_1" value="{{$city_1}}">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 ">
                                                        <label for="">Address 2(Optional)</label>
                                                        <div class="form-group">
                                                            <input type="text" class="form-control" placeholder="Address 2" name="address_2" id="address_2" value="{{$address_2}}">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 ">
                                                        <label for="">City 2(Optional)</label>
                                                        <div class="form-group">
                                                            <input type="text" class="form-control" placeholder="City 2" name="city_2" id="city_2" value="{{$city_2}}">
                                                        </div>
                                                    </div>

                                                </div>
                                                <hr>
                                                <div class="row">
                                                    <div class="col-md-6 col-sm-12">
                                                        <label for="country_of_residence">Country of Residence</label>
                                                        <select class="form-control show-tick" name="country_of_residence">
                                                            <option value="">-- Select --</option>
                                                            <option value="Nigeria" {{$country_of_residence == 'Nigeria' ? 'selected' : ''}}>Nigeria</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-md-6 col-sm-12">
                                                        <label for="session">State of Residence</label>
                                                        <select class="form-control show-tick" name="state_of_residence" onchange="getResidtLGA(value)">
                                                            <option value="">-- Select --</option>
                                                            @foreach($states as $state)
                                                            <option {{ $state_of_residence == $state ? 'selected' : '' }} value="{{$state}}">{{$state}}</option>
                                                            @endforeach

                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-12">
                                                        <label for="lga_of_residence"><br>LGA of Residence</label>
                                                        <div id="lga_of_residence_cont">
                                                            <select class="form-control show-tick" name="lga_of_residence" id="lga_of_residence">
                                                                <option value="">-- Select --</option>
                                                                @if(!empty($lga_of_residence))
                                                                <option value="{{$lga_of_residence}}" selected>{{$lga_of_residence}}</option>

                                                                @endif
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div><br>
                                                <hr>
                                                <div class="row">
                                                    <div class="col-md-6 col-sm-12">
                                                        <label for="mode_of_entry">Country of Origin</label>
                                                        <select class="form-control show-tick" name="country_of_origin">
                                                            <option value="">-- Select --</option>
                                                            <option {{$country_of_origin == 'Nigeria' ? 'selected' : ''}} value="Nigeria">Nigeria</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-md-6 col-sm-12">
                                                        <label for="session">State of Origin</label>
                                                        <select class="form-control show-tick" name="state_of_origin" onchange="getOrigintLGA(value)">
                                                            <option value="">-- Select --</option>
                                                            @foreach($states as $state)
                                                            <option {{$state_of_origin == $state ? 'selected' : ''}} value="{{$state}}">{{$state}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-12">
                                                        <label for="lga_of_origin"><br>LGA of Origin</label>
                                                        <div id="lga_of_origin_cont">
                                                            <select class="form-control show-tick" name="lga_of_origin" id="lga_of_origin">
                                                                <option value="">-- Select --</option>
                                                                @if(!empty($lga_of_origin))
                                                                <option value="{{$lga_of_origin}}" selected>{{$lga_of_origin}}</option>

                                                                @endif
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div><br><br>

                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <h6 style="padding: 0px; margin: 0px;">Date of Birth</h6>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <label for="dob_day"><br>Day</label>
                                                        <select class="form-control show-tick" name="dob_day" id="dob_day">
                                                            <option value="">-- Select --</option>
                                                            @for($i=1; $i<=31; $i++) <?php $value = $i < 10 ? '0' . $i : $i ?> <option {{$dob_day == $value ? 'selected' : ''}} value="{{$value}}">{{$value}}</option>
                                                                @endfor
                                                        </select>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <label for="dob_month"><br>Month</label>
                                                        <select class="form-control show-tick" name="dob_month" id="dob_month">
                                                            <option value="">-- Select --</option>
                                                            @for($i=1; $i<=12; $i++) <?php $value = $i < 10 ? '0' . $i : $i ?> <option {{$dob_month == $value ? 'selected' : ''}} value="{{$value}}">{{$value}}</option>
                                                                @endfor
                                                        </select>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <label for="dob_year"><br>Year</label>
                                                        <select class="form-control show-tick" name="dob_year" id="dob_year">
                                                            <option value="">-- Select --</option>
                                                            @for($i=(int)date('Year'); $i>=1950; $i--)
                                                            <option {{$dob_year == $i ? 'selected' : ''}} value="{{$i}}">{{$i}}</option>
                                                            @endfor
                                                        </select>
                                                    </div>

                                                </div>
                                                <hr>
                                                <h5>Next of Kin's Information</h4>
                                                    <div class="row">
                                                        <div class="col-md-6 ">
                                                            <label for="">First Name</label>
                                                            <div class="form-group">
                                                                <input type="text" class="form-control" placeholder="First Name" name="nok_first_name" id="nok_first_name" value="{{$nok_first_name}}">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label for="">Last Name</label>
                                                            <div class="form-group">
                                                                <input type="text" class="form-control" placeholder="Last Name" name="nok_last_name" id="nok_last_name" value="{{$nok_last_name}}">
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="row clearfix">
                                                        <div class="col-md-6 col-sm-12">
                                                            <label for="">Phone Number</label>
                                                            <div class="form-group">
                                                                <input type="text" class="form-control" placeholder="Phone Number" name="nok_phone_number" id="nok_phone_number" value="{{$nok_phone_number}}">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6 col-sm-12">
                                                            <label for="">Email Address</label>
                                                            <div class="form-group">
                                                                <input type="email" class="form-control" placeholder="Email" name="nok_email" id="nok_email" value="{{$nok_email}}">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row clearfix">
                                                        <div class="col-md-6 ">
                                                            <label for="">Address</label>
                                                            <div class="form-group">
                                                                <input type="text" class="form-control" placeholder="Address" name="nok_address" id="nok_address" value="{{$nok_address}}">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6 ">
                                                            <label for="">City</label>
                                                            <div class="form-group">
                                                                <input type="text" class="form-control" placeholder="City" name="nok_city" id="nok_city" value="{{$nok_city}}">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-6 col-sm-12">
                                                            <label for="">Country of Residence</label>
                                                            <select class="form-control show-tick" name="nok_country_of_residence">
                                                                <option value="">-- Select --</option>
                                                                <option value="Nigeria" {{$nok_country_of_residence == 'Nigeria' ? 'selected' : ''}}>Nigeria</option>
                                                            </select>
                                                        </div>
                                                        <div class="col-md-6 col-sm-12">
                                                            <label for="session">State of Residence</label>
                                                            <select class="form-control show-tick" name="nok_state_of_residence" onchange="getNOKResidtLGA(value)">
                                                                <option value="">-- Select --</option>
                                                                @foreach($states as $state)
                                                                <option {{$nok_state_of_residence == $state ? 'selected' : ''}} value="{{$state}}">{{$state}}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="row clearfix">
                                                        <div class="col-sm-12">
                                                            <label for="nok_lga_of_residence"><br>LGA of Residence</label>
                                                            <div id="nok_lga_of_residence_cont">
                                                                <select class="form-control show-tick" name="nok_lga_of_residence">
                                                                    <option value="">-- Select --</option>
                                                                    @if(!empty($nok_lga_of_residence))
                                                                    <option value="{{$nok_lga_of_residence}}" selected>{{$nok_lga_of_residence}}</option>
                                                                    @endif
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div><br>

                                                    <div class="row clearfix">
                                                        <div class="col-sm-12">
                                                            <button type="submit" class="btn btn-raised btn-round btn-primary">Save Bio-Data</button>
                                                        </div>
                                                    </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>

                        </div>

                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
    </section>
</div>


</div>
<!-- /.row -->
</div><!-- /.container-fluid -->
</section>
<!-- /.content -->
</div>


@endsection


@section('script')
<script>
    function getResidtLGA(state) {
        $.ajax({
            type: 'POST',
            url: '/getlga',
            data: {
                state: state,
                _token: '{{csrf_token()}}'
            },
            success: function(data) {
                // alert(data.lga);
                let all_lga = JSON.parse(data.lga);

                let select_options = '<option value="">Please Select</option>';

                var select = document.createElement('select');
                select.name = "lga_of_residence";
                select.id = "lga_of_residence";
                select.classList.add("form-control");
                select.classList.add("show-tick");
                // var select = document.getElementById('lga_of_residence');

                document.getElementById('lga_of_residence_cont').innerHTML = "";

                newOption = document.createElement('option');
                newOption.value = '';
                newOption.text = 'Please Select';
                select.appendChild(newOption);

                all_lga.forEach(element => {

                    newOption = document.createElement('option');
                    newOption.value = element;
                    newOption.text = element;
                    select.appendChild(newOption);

                });

                document.getElementById('lga_of_residence_cont').appendChild(select);

            }
        });
    }

    function getOrigintLGA(state) {
        $.ajax({
            type: 'POST',
            url: '/getlga',
            data: {
                state: state,
                _token: '{{csrf_token()}}'
            },
            success: function(data) {
                // alert(data.lga);
                let all_lga = JSON.parse(data.lga);

                var select = document.createElement('select');
                select.name = "lga_of_origin";
                select.id = "lga_of_origin";
                select.classList.add("form-control");
                select.classList.add("show-tick");
                // var select = document.getElementById('lga_of_residence');

                document.getElementById('lga_of_origin_cont').innerHTML = "";

                newOption = document.createElement('option');
                newOption.value = '';
                newOption.text = 'Please Select';
                select.appendChild(newOption);

                all_lga.forEach(element => {
                    newOption = document.createElement('option');
                    newOption.value = element;
                    newOption.text = element;
                    select.appendChild(newOption);

                });

                document.getElementById('lga_of_origin_cont').appendChild(select);
                // document.getElementById('lga_of_origin_cont').innerHTML = "<select></select>";

            }
        });
    }

    function getNOKResidtLGA(state) {
        $.ajax({
            type: 'POST',
            url: '/getlga',
            data: {
                state: state,
                _token: '{{csrf_token()}}'
            },
            success: function(data) {
                // alert(data.lga);
                let all_lga = JSON.parse(data.lga);

                var select = document.createElement('select');
                select.name = "nok_lga_of_residence";
                select.id = "nok_lga_of_residence";
                select.classList.add("form-control");
                select.classList.add("show-tick");
                // var select = document.getElementById('lga_of_residence');

                document.getElementById('nok_lga_of_residence_cont').innerHTML = "";

                newOption = document.createElement('option');
                newOption.value = '';
                newOption.text = 'Please Select';
                select.appendChild(newOption);

                all_lga.forEach(element => {

                    newOption = document.createElement('option');
                    newOption.value = element;
                    newOption.text = element;
                    select.appendChild(newOption);

                });

                document.getElementById('nok_lga_of_residence_cont').appendChild(select);

            }
        });
    }
</script>

@endsection
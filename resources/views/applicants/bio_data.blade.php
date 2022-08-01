@extends('layouts.applicant')



@section('content')



<body class="hold-transition sidebar-mini">
    <div class="wrapper">


        <!-- Main Sidebar Container -->

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header ">
                <div class="container ">
                <div class="row mb-2">
                        <div class="col-sm-6" >
                            <h2 style="text-align:center;"><strong>Bio-Data Form</strong><br>
                                <small>Fill the bio-data form for NCE Application</small>
                            </h2>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Application</li>
                            </ol>
                        </div>
                    </div> 
                </div><!-- /.container-fluid -->

               <div class="card">
               <div class="">
                
                <form action="" method="post">
                    @csrf

                    <div class="body">
                        <div class="row">
                            <div class="col-md-12">
                                alert
                            </div>
                            <div class="col-md-6 ">
                                <label for="">Address 1</label>
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Address 1" name="address_1" id="address_1" value="">
                                </div>
                            </div>
                            <div class="col-md-6 ">
                                <label for="">City</label>
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="City" name="city_1" id="city_1" value="">
                                </div>
                            </div>
                            <div class="col-md-6 ">
                                <label for="">Address 2(Optional)</label>
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Address 2" name="address_2" id="address_2" value="">
                                </div>
                            </div>
                            <div class="col-md-6 ">
                                <label for="">City 2(Optional)</label>
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="City 2" name="city_2" id="city_2" value="">
                                </div>
                            </div>

                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-6 col-sm-12">
                                <label for="country_of_residence">Country of Residence</label>
                                <select class="form-control show-tick" name="country_of_residence">
                                    <option value="">-- Select --</option>
                                </select>
                            </div>
                            <div class="col-md-6 col-sm-12">
                                <label for="session">State of Residence</label>
                                <select class="form-control show-tick" name="state_of_residence" onchange="getResidtLGA(value)">
                                    <option value="">-- Select --</option>

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
                                    <option value="Nigeria">Nigeria</option>
                                </select>
                            </div>
                            <div class="col-md-6 col-sm-12">
                                <label for="session">State of Origin</label>
                                <select class="form-control show-tick" name="state_of_origin" onchange="getOrigintLGA(value)">
                                    <option value="">-- Select --</option>

                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <label for="lga_of_origin"><br>LGA of Origin</label>
                                <div id="lga_of_origin_cont">
                                    <select class="form-control show-tick" name="lga_of_origin" id="lga_of_origin">
                                        <option value="">-- Select --</option>


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
                                    @for($i=1; $i<=31; $i++) <?php $value = $i < 10 ? '0' . $i : $i ?> @endfor </select>
                            </div>
                            <div class="col-md-4">
                                <label for="dob_month"><br>Month</label>
                                <select class="form-control show-tick" name="dob_month" id="dob_month">
                                    <option value="">-- Select --</option>
                                    @for($i=1; $i<=12; $i++) <?php $value = $i < 10 ? '0' . $i : $i ?> @endfor </select>
                            </div>
                            <div class="col-md-4">
                                <label for="dob_year"><br>Year</label>
                                <select class="form-control show-tick" name="dob_year" id="dob_year">
                                    <option value="">-- Select --</option>

                                </select>
                            </div>

                        </div>
                        <hr>
                        <h5>Next of Kin's Information</h4>
                            <div class="row">
                                <div class="col-md-6 ">
                                    <label for="">First Name</label>
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="First Name" name="nok_first_name" id="nok_first_name" value="">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label for="">Last Name</label>
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="Last Name" name="nok_last_name" id="nok_last_name" value="">
                                    </div>
                                </div>
                            </div>

                            <div class="row clearfix">
                                <div class="col-md-6 col-sm-12">
                                    <label for="">Phone Number</label>
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="Phone Number" name="nok_phone_number" id="nok_phone_number" value="">
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-12">
                                    <label for="">Email Address</label>
                                    <div class="form-group">
                                        <input type="email" class="form-control" placeholder="Email" name="nok_email" id="nok_email" value="">
                                    </div>
                                </div>
                            </div>
                            <div class="row clearfix">
                                <div class="col-md-6 ">
                                    <label for="">Address</label>
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="Address" name="nok_address" id="nok_address" value="">
                                    </div>
                                </div>
                                <div class="col-md-6 ">
                                    <label for="">City</label>
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="City" name="nok_city" id="nok_city" value="">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 col-sm-12">
                                    <label for="">Country of Residence</label>
                                    <select class="form-control show-tick" name="nok_country_of_residence">
                                        <option value="">-- Select --</option>
                                    </select>
                                </div>
                                <div class="col-md-6 col-sm-12">
                                    <label for="session">State of Residence</label>
                                    <select class="form-control show-tick" name="nok_state_of_residence" onchange="getNOKResidtLGA(value)">
                                        <option value="">-- Select --</option>
                                        \
                                    </select>
                                </div>
                            </div>
                            <div class="row clearfix">
                                <div class="col-sm-12">
                                    <label for="nok_lga_of_residence"><br>LGA of Residence</label>
                                    <div id="nok_lga_of_residence_cont">
                                        <select class="form-control show-tick" name="nok_lga_of_residence">
                                            <option value="">-- Select --</option>

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
            </section>


        </div>
        <!-- /.content-wrapper -->


        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->


</body>

</html>

@endsection
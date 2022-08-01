@extends('layouts.applicant')


@section('content')

<body class="hold-transition sidebar-mini">
    <div class="wrapper">


        <!-- Main Sidebar Container -->

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container">
                <div class="header">
                    <h1 style="text-align:center;"><strong>Get Started</strong> With Application<br>
                    <!-- <small>To stand a chance of gaining admission into our school, start the application process by filling the form below.</small> -->

                    </h1>
                    <br>

                </div>
                    <div class="card">
                        <div class="container">
                            <div class="container">
                                <div class="row clearfix">
                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                        <div class="">

                                            <form action="{{route('applicant_save_application_start')}}" method="post">
                                                @csrf

                                                <div class="body">
                                                    <div class="row">
                                                        <div class="col-md-12">alert is suppose deii here</div>
                                                        <div class="col-md-6 col-sm-12">
                                                            <label for="mode_of_entry">Mode of Entry</label>
                                                            <select class="form-control show-tick" name="mode_of_entry">
                                                                <option value="">-- Select --</option>
                                                                <option {{ old('mode_of_entry') == "OLEVEL" ? 'selected' : '' }} value="OLEVEL">O'Level</option>
                                                                <option {{ old('mode_of_entry') == "UME" ? 'selected' : '' }} value="UME">UME</option>
                                                                <option {{ old('mode_of_entry') == "DE" ? 'selected' : '' }} value="DE">DE</option>
                                                            </select>
                                                        </div>
                                                        <div class="col-md-6 col-sm-12">
                                                            <label for="session">Session</label>
                                                            <select class="form-control show-tick" name="session">
                                                                <option value="">-- Select --</option>
                                                                <option {{ old('session') == "2021/2022" ? 'selected' : '' }} value="2021/2022">2021/2022</option>
                                                            </select>
                                                        </div>
                                                    </div><br>
                                                    <div class="row">
                                                        <div class="col-md-6 ">
                                                            <label for="">First Name</label>
                                                            <div class="form-group">
                                                                <input type="text" class="form-control" placeholder="First Name" name="first_name" id="first_name" value="{{old('first_name')}}">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label for="">Last Name</label>
                                                            <div class="form-group">
                                                                <input type="text" class="form-control" placeholder="Last Name" name="last_name" id="last_name" value="{{old('last_name')}}">
                                                            </div>
                                                        </div>
                                                      
                                                    </div>

                                                    <div class="row clearfix">
                                                        <div class="col-md-6 col-sm-12">
                                                            <label for="">Other Names</label>
                                                            <div class="form-group">
                                                                <input type="text" class="form-control" placeholder="Other Names" name="other_names" id="other_names" value="{{old('other_names')}}">
                                                            </div>
                                                        </div>
                                                       <div class="col-md-6 col-sm-12">
                                                            <label for="">Phone Number </label>
                                                            <div class="form-group">
                                                                <input type="text" class="form-control" placeholder="Phone Number" name="phone_number" id="phone_number" value="{{old('phone_number')}}">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row clearfix">
                                                        <div class="col-sm-12">
                                                            <button type="submit" class="btn btn-raised btn-round btn-primary">Submit</button>
                                                        </div>
                                                    </div>
                                                    <br>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>

                            </div>

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
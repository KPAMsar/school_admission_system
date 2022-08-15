@extends('partials.navbar')

    @section('content')

<!-- Content Wrapper. Contains page content -->
<div class=" ">
    <!-- Content Header (Page header) -->
    <section class="content-header" style="padding-top:5rem;">>
        <div class="container card">
            <div class="header">
                <h1 style="text-align:center;"><strong>Get Started</strong> With Application<br>
                    <!-- <small>To stand a chance of gaining admission into our school, start the application process by filling the form below.</small> -->

                </h1>
                <br>

            </div>
            <div class="">
                <div class="container">
                    <div class="container">
                        <div class="row clearfix">
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <div class="">
                                    <form action="{{route('applicant_save_application_start')}}" method="post">
                                        @csrf

                                        <div class="body">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <x-alert />
                                                </div>
                                                <div class="col-sm-6">
                                                    <label for="session">Session</label>
                                                    <select class="form-control show-tick" name="session">
                                                        <option value="">-- Select --</option>
                                                        
                                                        <option value="2021/2022">2021/2022</option>
                                                       
                                                    </select>
                                                </div>
                                                <div class="col-sm-6">
                                                    <label for="application_type">Application Type</label>
                                                    <select class="form-control show-tick" name="mode_of_entry" id="application_type">
                                                        <option value="">-- Select --</option>
                                                        <option value="ful-time">full-time</option>


                                                    </select>
                                                </div>
                                            </div><br>
                                            <div class="row">
                                                <div class="col-md-6 ">
                                                    <label for="">First Name</label>
                                                    <div class="form-group">
                                                        <input type="text" class="form-control" placeholder="First Name" name="first_name" id="first_name">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="">Last Name</label>
                                                    <div class="form-group">
                                                        <input type="text" class="form-control" placeholder="Last Name" name="last_name" id="last_name">
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <label for="">Other Names</label>
                                                    <div class="form-group">
                                                        <input type="text" class="form-control" placeholder="Other Names" name="other_names" id="other_names">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row clearfix">
                                                <div class="col-md-6 col-sm-12">
                                                    <label for="">Phone Number</label>
                                                    <div class="form-group">
                                                        <input type="text" class="form-control" placeholder="Phone Number" name="phone_number" id="phone_number">
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-sm-12">
                                                    <label for="">Email Address</label>
                                                    <div class="form-group">
                                                        <input type="email" class="form-control" placeholder="Email" name="email" id="email">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row clearfix">
                                                <div class="col-md-6 col-sm-12">
                                                    <label for="">Password</label>
                                                    <div class="form-group">
                                                        <input type="password" class="form-control" placeholder="Password" name="password" id="password">
                                                    </div>
                                                </div>

                                                <div class="col-md-6 col-sm-12">
                                                    <label for="">Confirm Password</label>
                                                    <div class="form-group">
                                                        <input type="password" class="form-control" placeholder="Confirm password" name="password_confirmation" id="password_confirmation">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row clearfix">
                                                <div class="col-sm-12">
                                                    <button type="submit" class="btn btn-raised btn-round btn-primary">Submit</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                    <br>

                                </div>
                            </div>
                        </div>

                    </div>

                </div>
            </div>
    </section>


</div>
<!-- /.content-wrapper -->

@endsection
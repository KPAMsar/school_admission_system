@extends('includes.navbar')


@section('content')

<!-- Content Wrapper. Contains page content -->
<div class=" ">
    <!-- Content Header (Page header) -->
    <section class="content-header" style="padding-top:5rem; margin-bottom:35vh;">
        <div class="container card">
            <div class="header">
                <h1 style="text-align:center; margin-top:4rem;margin-bottom:6px;  "><strong>Account creation successful!!!</strong> <br>
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
                                    <div class="body">


                                        <p>Hello ,</p>
                                        {{$applicant->first_name .' '.$applicant->last_name.' '.$applicant->other_names}} 
                                        <p>You have successfully created an account with us, to continue and complete your application, please click on the button below.</p>

                                        <div class="row clearfix">
                                            <div class="col-sm-12">
                                                <a class="btn btn-raised btn-round btn-primary" href="{{url('/login')}}">Proceed to Login</a>

                                            </div>
                                        </div>
                                    </div>
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
@extends('partials.navbar')


@section('content')

<!-- Content Wrapper. Contains page content -->
<div class=" ">
    <!-- Content Header (Page header) -->
    <section class="content-header" style="padding-top:5rem; margin-bottom:35vh;">
        <div class="container card">
            <div class="header">
                <h1 style="text-align:center; margin-top:4rem;margin-bottom:6px;  "><strong>Application Successful!!!!</strong> <br>
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


                                    <p>
                            Your application has been successfully submitted and is currently undergoing a review. You will be contacted as soon as possible with further information/steps regarding your application.

                        </p>
                        <p>Ensure to check your dashboard from time to time to get updates.
                            <br>
                            Click <a href="{{url('/admissions/dashboard/application/success/print-slip')}}" target="_blank">here</a> to print application slip
                        </p>
                                        <div class="row clearfix">
                                            <div class="col-sm-12">
                                                <a class="btn btn-raised btn-round btn-primary" href="{{url('/admissions/dashboard/application/success/print-slip')}}">Print Application Slip</a>

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
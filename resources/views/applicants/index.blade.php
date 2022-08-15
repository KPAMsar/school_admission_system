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

                    <div class="">
                        <div class="container">
                            <div class="row clearfix">
                                <div class="col-lg-12 col-md-12 col-sm-12">
                                <div class="container card">
        <div class="header">
            <h1 style="text-align:center; margin-top:4rem;margin-bottom:6px;  "><strong>Welcome</strong> <br>
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


                                    <p>Hello  {{Auth::user()->name}},</p>

                                    <p>This is your space. You can stay updated regarding the state of your application by visiting this space regularly and also checking your admission status.</p>
                                    <p>Thank you for your interest in our school, we wish you the best of luck in your application.
                                    <div class="row clearfix">

                                    </div>
                                </div>
                                <br>

                            </div>
                        </div>
                    </div>

                </div>

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
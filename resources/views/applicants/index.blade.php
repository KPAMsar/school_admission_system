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
            <div class="">
                <div class="header">
                    <h2><strong>Hello {{Auth::user()->name }},</strong>
                    </h2>

                </div>
                <form action="" method="post">
                    @csrf

                    <div class="body">
                        <p>This is your space. You can stay updated regarding the state of your application by visiting this space regularly and also checking your admission status.</p>
                        <p>Thank you for your interest in our school, we wish you the best of luck in your application.
                            <br><br>
                        Click below to start your application.
                        </p>

                    </div>
                </form>
    <br>
                <div class="col-md-6 ">
                    <div class="form-group">
                        <a href="{{route('applicant_application_Start')}}">
                        <input type="button" class="btn btn-primary" value=" Start Application">
                        </a>
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
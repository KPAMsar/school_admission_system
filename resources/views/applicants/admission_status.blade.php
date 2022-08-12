<?php
$split = [
    "type" => "percentage",
    "subaccounts" => [
        ["subaccount" => "ACCT_x0a16uputtr5oll", "share" => 24],
    ],
    "bearer_type" => "all"
];
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
                    <h1>Admission Status</h1>
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

                                        <div class="container">
                                            <div class="row clearfix">
                                                <div class="col-lg-12 col-md-12 col-sm-12">
                                                    <div class="">
                                                        <div class="header">
                                                            <h2 style="display: inline-block;"><strong>Admission </strong>
                                                                <small>Check your admission status</small>
                                                            </h2>



                                                        </div>
                                                        <form action="{{ route('pay') }}" method="post">
                                                            @csrf

                                                            <div class="body">
                                                                <div class="row">
                                                                    <div class="col-md-12">
                                                                        <x-alert />
                                                                    </div>
                                                                </div>
                                                                <table class="table table-hover table-stripped">
                                                                    <tbody>
                                                                        <tr>
                                                                            <td>Full Name</td>
                                                                            <td>}</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>Phone</td>
                                                                            <td>{</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>Programme</td>
                                                                            <td>{}</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>Mode of Entry</td>
                                                                            <td>}</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>Admission Status</td>
                                                                            <td></td>
                                                                        </tr>
                                                                    </tbody>
                                                                </table>

                                                               
                                                                <p>
                                                                    <button class="btn btn-raised btn-round btn-primary btn-block" type="submit" value="Make payment">
                                                                         Accept Admission
                                                                    </button>
                                                                </p>

                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
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
    
    </section>
</div>


</div>
<!-- /.row -->
</div><!-- /.container-fluid -->
</section>
<!-- /.content -->
</div>


@endsection
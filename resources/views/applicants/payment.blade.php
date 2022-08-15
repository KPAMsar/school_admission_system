<?php
$split = [
    "type" => "percentage",
    "subaccounts" => [
        ["subaccount" => "ACCT_ayxusaxqpa6io7o", "share" => 24],
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
                    <h1>Fee Payment</h1>
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
                                                            <h2 style="display: inline-block;"><strong>Application Payment</strong>
                                                                <small>Use the form below to make payment</small>
                                                            </h2>
                                                            <a class="btn btn-warning btn-sm float-right" href="{{route('applicant_query_payment')}}">Query Payment</a>



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
                                                                            <td>{{$applicant->last_name }} {{$applicant->first_name }} {{$applicant->other_names}}</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>Phone</td>
                                                                            <td>{{$applicant->phone}}</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>Programme</td>
                                                                            <td>{{$applicant->programme}}</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>Mode of Entry</td>
                                                                            <td>{{$applicant->mode_of_entry}}</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>Amount</td>
                                                                            <td>NGN {{number_format($applicant->amount)}}</td>
                                                                        </tr>
                                                                    </tbody>
                                                                </table>
                                                                <p>Note: Transaction charges may apply at final point of payment</p>

                                                                <input type="hidden" name="email" value="{{$applicant->email}}"> {{-- required --}}
                                                                <input type="hidden" name="orderID" value="{{$applicant->application_number}}">
                                                                <input type="hidden" name="amount" value="{{($applicant->amount + 1000)*100}}"> {{-- required in kobo --}}
                                                                <input type="hidden" name="quantity" value="1">
                                                                <input type="hidden" name="currency" value="NGN">
                                                                <input type="hidden" name="metadata" value="{{ json_encode($array = ['application_number' => $applicant->application_number]) }}"> {{-- For other necessary things you want to add to your payload. it is optional though --}}
                                                                <input type="hidden" name="reference" value="{{ Paystack::genTranxRef() }}"> {{-- required --}}

                                                                <input type="hidden" name="payment_type" value="Degree Application">
                                                                <input type="hidden" name="split" value="{{ json_encode($split) }}">

                                                                <p>
                                                                    <button class="btn btn-raised btn-round btn-primary btn-block" type="submit" value="Make payment">
                                                                        <i class="fa fa-plus-circle fa-lg"></i> Make Payment
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
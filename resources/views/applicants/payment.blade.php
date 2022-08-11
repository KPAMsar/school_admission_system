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
<div class="container">
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="card">
                <div class="header">
                    <h2 style="display: inline-block;"><strong>Application Payment</strong>
                        <small>Use the form below to make payment</small>
                    </h2>
                    <a class="btn btn-warning btn-sm float-right" href="{{url('/admissions/dashboard/payment/query')}}">Query Payment</a>

                    

                </div>
                <form action="{{ route('pay') }}" method="post">
                    @csrf

                    <div class="body">
                        <div class="row">
                            <div class="col-md-12"><x-alert/></div>
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
                                    <td>Amount</td>
                                    <td></td>
                                </tr>
                            </tbody>
                        </table>
                        <p>Note: Transaction charges may apply at final point of payment</p>

                        <input type="hidden" name="email" value=""> {{-- required --}}
                        <input type="hidden" name="orderID" value="plication_number}}">
                        <input type="hidden" name="amount" value="00}}"> {{-- required in kobo --}}
                        <input type="hidden" name="quantity" value="1">
                        <input type="hidden" name="currency" value="NGN">
                        <input type="hidden" name="metadata" value="mber]) }}"> {{-- For other necessary things you want to add to your payload. it is optional though --}}
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
@endsection
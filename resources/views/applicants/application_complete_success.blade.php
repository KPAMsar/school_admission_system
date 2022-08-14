@extends('partials.navbar')


@section('content')
<div class="container">
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="card">
                <div class="header">
                    <h2><strong>Application Successful!</strong>
                    </h2>

                </div>
                <form action="" method="post" enctype="multipart/form-data">
                    @csrf

                    <div class="body">
                        <p>
                            Your application has been successfully submitted and is currently undergoing a review. You will be contacted as soon as possible with further information/steps regarding your application.

                        </p>
                        <p>Ensure to check your dashboard from time to time to get updates.
                            <br>
                            Click <a href="{{url('/admissions/dashboard/application/success/print-slip')}}" target="_blank">here</a> to print application slip
                        </p>
                        <a href="{{url('/admissions/dashboard/application/success/print-slip')}}" class="btn btn-primary" target="_blank">Print Application Slip</a>
                    </div>
                </form>
            </div>
        </div>
    </div>

</div>
@endsection
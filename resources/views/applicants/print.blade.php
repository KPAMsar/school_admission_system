<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>Application Slip - Printout</title>
    <!-- for-mobile-apps -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Favicons -->
    <link href="images/fav.png" rel="icon">

    <script type="application/x-javascript">
        addEventListener("load", function() {
            setTimeout(hideURLbar, 0);
        }, false);

        function hideURLbar() {
            window.scrollTo(0, 1);
        }
    </script>
    <!-- //for-mobile-apps -->

    <link href="{{asset('assets/plugins/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" media='all' />

    <link rel="stylesheet" href="{{url('assets/css/print.css')}}" media='screen,print'>

    <link href='//fonts.googleapis.com/css?family=Fugaz+One' rel='stylesheet' type='text/css'>
    <link href='//fonts.googleapis.com/css?family=Alegreya+Sans:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,800,800italic,900,900italic' rel='stylesheet' type='text/css'>
    <link href='//fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">

    <script type="text/javascript" src="{{url('assets/js/jquery.min.js')}}"></script>

    <style>
        body,
        html {
            width: 100%;
            height: 100%;
            padding-top: 40px;
            padding-bottom: 40px;
        }

        .certificate_content {
            position: absolute;
            top: 40px;
            right: calc((100% - 754px)/2);
            width: 754px;
            min-height: 1080px;
            background-color: transparent;
            border: 1px solid #3AD5A0;
        }

        hr {
            width: 90%;
        }

        .text_tag {
            border: 1px solid #dcdcdc;
        }

        table {
            width: 90%;
            font-size: 8px !important;
            background-color: #EBFAF5 !important;
        }

        td,
        th {
            padding: 5px 15px 5px 15px;
            border-bottom: 1px solid #dcdcdc;
            height: 25px;
            font-size: 12px !important;
        }

        .info td {
            width: 100px;
        }

        .line {
            width: 230px;
            height: 2px;
            background: #dcdcdc;
        }

        .header1 {
            margin-left: 40px;
            color: grey;
        }

        .print_title strong {
            color: #3AD5A0;
            font-size: 20px;
        }

        .bg_img {
            position: absolute;
            top: 400px;
            right: calc((100% - 500px)/2);
            opacity: 0.1;
        }

        @media print {

            body,
            html {
                width: 100%;
                height: 100%;
            }

            .certificate_content {
                position: absolute;
                top: 0px;
                right: calc((100% - 754px)/2);
                width: 754px;
                min-height: 1080px;
                background-color: transparent;
                border: 1px solid #3AD5A0;
            }

            .text_tag {
                border: 1px solid #dcdcdc;
                width: 205px !important;
            }

            table {
                width: 90%;
                font-size: 8px !important;
                background-color: #EBFAF5 !important;
            }

            td,
            th {
                padding: 3px;
                border-bottom: 1px solid #dcdcdc;
                height: 25px;
                font-size: 12px !important;
            }

            .info td {
                width: 100px;
            }

            .line {
                width: 220px;
                height: 2px;
                background: #dcdcdc !important;
            }

            .original {
                font-size: 18px;
                color: red !important;
                -webkit-print-color-adjust: exact;
            }

            .header1 {
                margin-left: 40px;
                color: grey;
            }

            hr {
                width: 90%;
            }

            .print_title strong {
                color: #3AD5A0 !important;
                font-size: 20px;
            }

            .bg_img {
                position: absolute;
                top: 400px;
                right: calc((100% - 500px)/2);
                opacity: 0.1;
            }

            @media print and (-webkit-min-device-pixel-ratio:0) {
                .original {
                    color: #ff0000 !important;
                    -webkit-print-color-adjust: exact;
                }

                .header1 strong div {
                    color: grey !important;
                    -webkit-print-color-adjust: exact;
                }

                table {
                    width: 90%;
                    font-size: 8px !important;
                    background: #EBFAF5 !important;
                }
            }
        }
    </style>
</head>

<body>
    <div class="main">
        <div class="container">
            <div class="wrapper">
                <center><img src="{{asset('assets/images/logo.png')}}" width="500px" alt="" class="bg_img"></center>
                <div class="certificate_content">


                    <div class="row" style="padding: 20px;">
                        <div class="col-sm-2">
                            <img src="{{asset('assets/images/logo.png')}}" alt="" style="width: 100px; height: auto;">
                        </div>
                        <div class="col-sm-8">
                            <center>
                                <strong>
                                    <h3>{{ getenv('SCHOOL_NAME') }}</h3>
                                    <p>{{ getenv('SCHOOL_ADDRESS') }}</p>
                                </strong>
                            </center>
                        </div>
                        <div class="col-sm-2">
                            <img src="{{asset('assets/images/'.strtolower($applicant->getApplication->school).'.png')}}" alt="" style="width: 100px; height: auto;">
                        </div>
                    </div><br>


                    <div class="row" style="width: 100%;">

                        <center style="width: 100%;">
                            <p class="print_title" style="margin-left: 15px; display: block;"><strong>{{ucfirst(strtolower($applicant->programme))}} Programme Applicaton Slip</strong></p>
                            <hr><br>
                        </center>
                    </div>

                    <div class="row" style="width: 100%;">
                        <div class="col-sm-2">
                            <img src="{{asset('/storage/passports/'.$applicant->getApplication->passport)}}" alt="" style="width: 130px; height: auto; margin-left: 20px;">
                        </div>
                        <div class="col-sm-10">
                            <center style="width: 100%;">
                                <table>
                                    <tbody>
                                        <tr>
                                            <td>Name</td>
                                            <td>{{$applicant->first_name.' '.$applicant->last_name}}</td>
                                        </tr>
                                        <tr>
                                            <td>Phone</td>
                                            <td>{{$applicant->phone}}</td>
                                        </tr>
                                        <tr>
                                            <td>Email</td>
                                            <td>{{$applicant->email}}</td>
                                        </tr>
                                        <tr>
                                            <td>Application Number</td>
                                            <td>{{$applicant->application_number}}</td>
                                        </tr>
                                        <tr>
                                            <td>State of Origin</td>
                                            <td>{{$applicant->getBioData->state_origin}}</td>
                                        </tr>
                                        <tr>
                                            <td>LGA of Origin</td>
                                            <td>{{$applicant->getBioData->lga_origin}}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </center>
                        </div>
                    </div><br><br>

                    <div class="row" style="width: 100%;">
                        <center style="width: 100%;">
                            <table>
                                <tbody>
                                    <!-- <tr>
                                        <td>Affiliate School</td>
                                        <td>{</td>
                                    </tr> -->
                                    <tr>
                                        <td>First Choice</td>
                                        <td>{{$applicantDetails->first_choice}}</td>
                                    </tr>
                                    <tr>
                                        <td>Course Duration</td>
                                        <td>{{$firstchoiceDuration->duration}} Years</td>
                                    </tr>
                                    <tr>
                                        <td>Second Choice</td>
                                        <td>{{$applicantDetails->second_choice}}</td>
                                    </tr>
                                    <tr>
                                        <td>Course Duration</td>
                                        <td>{{$secondchoiceDuration->duration}} Years</td>
                                    </tr>
                                    <tr>
                                        <td>JAMB Score</td>
                                        <td>{{$applicantDetails->jamb_score }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </center>
                    </div>

                    <div class="row" style="width: 100%;">
                        <h6 style="margin-left: 35px; margin-bottom: 0px; margin-top: 25px; text-decoration: underline; width: 100%;"><strong>O'Level Result</strong></h6>
                    </div>
                    <div class="row" style="width: 100%;">
                        <center style="width: 100%;">
                            <table>
                                <thead>
                                    <tr>
                                        <th>Subject</th>
                                        <th>Grade</th>
                                        <th>Exam</th>
                                        <th>Sitting</th>
                                        <th>Year</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($applicant->getApplication->getOLevel as $olevel)
                                    <tr>
                                        <td>{{$olevel->getSubject->name}}</td>
                                        <td>{{$olevel->grade}}</td>
                                        <td>{{$olevel->examination}}</td>
                                        <td>{{$olevel->sitting}}</td>
                                        <td>{{$olevel->year}}</td>
                                    </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        </center>
                    </div>

                    <br><br><br><br><br>
                    <hr>
                    <div class="row" style="padding: 10px 40px;"><br>
                        <div class="col-sm-7">
                            <p>Scan the code to log into your dashboard and check your admission status and get more updates</p>
                        </div>
                        <div class="col-sm-5">
                            <img src="https://api.qrserver.com/v1/create-qr-code/?size=200x200&data=https://coewarri.com/admissions/login/{{$applicant->application_number}}" />
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
    <script src="js/currency.js"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script>
        $(document).ready(function() {

            // window.print();

        });
    </script>

</body>

</html>
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
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h2><strong>Bio-Data Form</strong><br>
                                <small>Fill the bio-data form for NCE Application</small>
                            </h2>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Application</li>
                            </ol>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->

                <div class="card">
                    <form action="" method="post" enctype="multipart/form-data">
                        @csrf

                        <div class="body">
                            <div class="row">
                                <div class="col-md-12">
                                    alert issupposed to be here
                                </div>
                                <div class="col-md-6">
                                    <center>
                                        <div>
                                            <img id="passport_display" class="thumbnail" src="{{asset('assets/img/user1.jpg')}}" alt="" style="height: 200px; width: 200px; border-radius: 180px; display:block; margin-bottom: 20px;">

                                            <input type="file" name="passport" id="passport" accept='image/*' onchange="readURL(this)" hidden required>
                                            <button id="choose_passport" onclick="chooseImage()" type="button" style="margin-right: 10px;"><i class='fas fa-image' style='font-size:24px;'></i></button>
                                            <button type="button"><i class='fas fa-camera' style='font-size:24px'></i></button>

                                        </div>
                                    </center>
                                </div>
                                <div class="col-md-6"><br><br>

                                    <table class="table">
                                        <tbody>
                                            <tr>
                                                <td>Name:</td>
                                                <td>{</td>
                                            </tr>
                                            <tr>
                                                <td>Phone:</td>
                                                <td>{</td>
                                            </tr>
                                            <tr>
                                                <td>Email:</td>
                                                <td>{</td>
                                            </tr>
                                            <tr>
                                                <td>Programme:</td>
                                                <td>{</td>
                                            </tr>
                                        </tbody>
                                    </table>

                                </div>
                                <hr>
                            </div><br>

                            <div class="row">
                                <div class="col-md-12">
                                    <label for="year_of_graduation">Year of Graduation</label>
                                    <select class="form-control show-tick" name="year_of_graduation" id="year_of_graduation">
                                        <option value="">-- Select --</option>
                                        @for($i=(int)date('Year'); $i>=1950; $i--)
                                        <option {{old('year_of_graduation') == $i ? 'selected' : ''}} value="{{$i}}">{{$i}}</option>
                                        @endfor
                                    </select>

                                </div>
                            </div><br>
                            <div class="row">
                                <div class="col-md-6">
                                    <h5>First Choice</h6>

                                        <label for="first_faculty">Faculty</label>
                                        <select class="form-control show-tick" name="first_faculty" onchange="getDepartments(value)">
                                            <option value="">-- Select --</option>


                                        </select>

                                        <br><br>
                                        <label for="first_department">Department</label>
                                        <div id="first_department_cont">
                                            <select class="form-control show-tick" name="first_department">
                                                <option value="">-- Select --</option>
                                                <option value="{{old('first_department')}}" selected></option>


                                            </select>
                                        </div>

                                        <br><br>
                                        <label for="first_course_combination">Course Combination</label>
                                        <div id="first_course_combination_cont">
                                            <select class="form-control show-tick" name="first_course_combination">
                                                <option value="">-- Select --</option>
                                                @if(!empty(old('first_course_combination')))
                                                <option value="{{old('first_course_combination')}}" selected></option>

                                                @endif

                                            </select>
                                        </div>


                                </div>
                                <div class="col-md-6">
                                    <h5>Second Choice</h6>

                                        <label for="second_faculty">Faculty</label>
                                        <select class="form-control show-tick" name="second_faculty" onchange="getSecondDepartments(value)">
                                            <option value="">-- Select --</option>


                                        </select>

                                        <br><br>
                                        <label for="second_department">Department</label>
                                        <div id="second_department_cont">
                                            <select class="form-control show-tick" name="second_department">
                                                <option value="">-- Select --</option>
                                                @if(!empty(old('second_department')))

                                                @endif
                                            </select>
                                        </div>

                                        <br><br>
                                        <label for="first_course_combination">Course Combination</label>
                                        <div id="second_course_combination_cont">
                                            <select class="form-control show-tick" name="second_course_combination">
                                                <option value="">-- Select --</option>
                                                @if(!empty(old('second_course_combination')))

                                                @endif

                                            </select>
                                        </div>


                                </div>

                            </div><br><br>
                            <div class="row">
                                <div class="col-md-12">
                                    <h5>O'Level Result</h5>
                                    <hr>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-3">
                                    <label for="subject">Subject</label>
                                    <select class="form-control show-tick" name="subject" id="subject">
                                        <?php $all_subjects = []; ?>

                                        <option value="">-- Select --</option>


                                    </select>
                                </div>
                                <div class="col-sm-2">
                                    <label for="grade">Grade</label>
                                    <select class="form-control show-tick" name="grade" id="grade">
                                        <option value="">-- Select --</option>
                                        <option value="Awaiting Result">Awaiting Result</option>
                                        <option value="A1">A1</option>
                                        <option value="B2">B2</option>
                                        <option value="B3">B3</option>
                                        <option value="C4">C4</option>
                                        <option value="C5">C5</option>
                                        <option value="C6">C6</option>
                                        <option value="D7">D7</option>
                                        <option value="E8">E8</option>
                                        <option value="F9">F9</option>
                                    </select>
                                </div>
                                <div class="col-sm-2">
                                    <label for="examination">Examination</label>
                                    <select class="form-control show-tick" name="examination" id="examination">
                                        <option value="">-- Select --</option>
                                        <option value="WAEC">WAEC</option>
                                        <option value="NECO">NECO</option>
                                        <option value="NABTEC">NABTEC</option>
                                    </select>
                                </div>
                                <div class="col-sm-3">
                                    <label for="sitting">Sitting</label>
                                    <select class="form-control show-tick" name="sitting" id="sitting">
                                        <option value="">-- Select --</option>
                                        <option value="First Sitting">First Sitting</option>
                                        <option value="Second Sitting">Second Sitting</option>
                                        <option value="Third Sitting">Third Sitting</option>
                                    </select>
                                </div>
                                <div class="col-sm-2">
                                    <label for="sitting">Year</label>
                                    <select class="form-control show-tick" name="year" id="year">
                                        <option value="">-- Select --</option>
                                        <?php $baseYear = date('Y') - 46; ?>
                                        @for($i=46; $i>=0; $i--) <option value="{{ ($baseYear + $i) }}"></option>

                                        @endfor
                                    </select>
                                </div>
                            </div><br>
                            <div class="row">
                                <div class="col-md-12">
                                    <button type="button" onclick="addOLevelResult()" class="btn btn-warning">Add Result</button>

                                    <input name="olevel_result" type="hidden" id="olevel_result" />
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-md-12">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Subject</th>
                                                <th>Grade</th>
                                                <th>Examination</th>
                                                <th>Sitting</th>
                                                <th>Year</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody id="table_body">

                                        </tbody>
                                    </table>
                                </div>
                            </div><br><br>
                            <div class="row">
                                <div class="col-md-12">
                                    <h5>School(s) Attended</h5>
                                    <hr>
                                </div>
                            </div>
                            <div class="row">

                                <div class="col-md-6 ">
                                    <label for="">School Name</label>
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="School Name" name="school_name" id="school_name" value="">
                                    </div>
                                </div>
                                <div class="col-md-6 ">
                                    <label for="registration_no">Registration No</label>
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="Registration Number" name="registration_no" id="registration_no" value="">
                                    </div>
                                </div>
                                <div class="col-md-6 ">
                                    <label for="certificate">Certificate Awarded</label>
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="Certificate Awarded" name="certificate" id="certificate" value="">
                                    </div>
                                </div>
                                <div class="col-sm-2">
                                    <label for="institution">Institution</label>
                                    <select class="form-control show-tick" name="institution" id="institution">
                                        <option value="">-- Select --</option>
                                        <option value="Nursery School">Nursery School</option>
                                        <option value="Primary School">Primary School</option>
                                        <option value="Nursery/Primary School">Nursery/Primary School</option>
                                        <option value="Secondary School">Secondary School</option>
                                        <option value="College of Education">College of Education</option>
                                        <option value="Polytechnic">Polytechnic</option>
                                        <option value="University">University</option>
                                        <option value="Others">Others</option>
                                    </select>
                                </div>
                                <div class="col-sm-2">
                                    <label for="entry_year">Entry Year</label>
                                    <select class="form-control show-tick" name="entry_year" id="entry_year">
                                        <option value="">-- Select --</option>
                                        <?php $baseYear = date('Y') - 41; ?>

                                    </select>
                                </div>
                                <div class="col-sm-2">
                                    <label for="year_graduated">Year Graduated</label>
                                    <select class="form-control show-tick" name="year_graduated" id="year_graduated">
                                        <option value="">-- Select --</option>
                                        <?php $baseYear = date('Y') - 41; ?>

                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <button type="button" onclick="addSchoolAttended()" class="btn btn-warning">Add School</button>

                                    <input name="schools_attended" type="hidden" id="schools_attended" />
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-md-12">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>School</th>
                                                <th>Reg. No</th>
                                                <th>Qualification</th>
                                                <th>Institution</th>
                                                <th>Entry Year</th>
                                                <th>Year Graduated</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody id="schools_table_body">

                                        </tbody>
                                    </table>
                                </div>
                            </div><br><br>
                            <div class="row">
                                <div class="col-md-12">
                                    <h5>Documents</h5>

                                    <hr>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 col-sm-6">
                                    <label for="first_sitting_result">First Sitting O'Level Result(*)</label>
                                    <input type="file" accept="image/*" class="form-control" name="first_sitting_result" id="first_sitting_result" value="">
                                </div>

                                <div class="col-md-6 col-sm-6">
                                    <label for="second_sitting_result">Second Sitting O'Level Result(If applicable)</label>
                                    <input type="file" accept="image/*" class="form-control" name="second_sitting_result" id="second_sitting_result" value="">
                                </div><br><br>

                                <div class="col-md-6 col-sm-6">
                                    <label for="birth_certificate">Birth Certificate</label>
                                    <input type="file" accept="image/*" class="form-control" name="birth_certificate" id="birth_certificate" value="">
                                </div>
                            </div><br>

                            <div class="row clearfix">
                                <div class="col-sm-12">
                                    <button type="submit" class="btn btn-raised btn-round btn-primary">Submit Application</button>
                                </div>
                            </div>
                        </div>
                    </form>
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
@extends('layouts.applicant');

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
                    <h1>Applicants</h1>
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
                                        <div class="header">
                                            <h2><strong>Bio-Data Form</strong>
                                                <small>Fill the bio-data form below</small>
                                            </h2>

                                        </div>
                                        

                                        <form action="{{route('save_applicant_application')}}" method="post" enctype="multipart/form-data">
                                            @csrf

                                            <div class="body">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <x-alert />
                                                    </div>
                                                    <div class="col-md-6">
                                                        <center>
                                                            <div>
                                                                <img id="passport_display" class="thumbnail" src="{{asset('assets/images/user.png')}}" alt="" style="height: 250px; width: 250px; border-radius: 180px; display:block; margin-bottom: 20px;">

                                                                <input type="file" name="passport" id="passport" accept='image/*' onchange="readURL(this)" hidden>
                                                                <button id="choose_passport" onclick="chooseImage()" type="button" style="margin-right: 10px;"><i class='fas fa-image' style='font-size:24px;'></i></button>
                                                                <button type="button"><i class='fas fa-camera' style='font-size:24px'></i></button>

                                                            </div>
                                                        </center>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="col-sm-12">
                                                            <label for="first_choice">First Choice</label>
                                                            <select class="form-control show-tick" name="first_choice">
                                                                <option value="">-- Select --</option>
                                                                @foreach($programmes as $programme)
                                                                <option value="{{$programme->id}}">{{$programme->course}}</option>
                                                                @endforeach

                                                            </select>
                                                        </div><br>
                                                        <div class="col-sm-12">
                                                            <label for="second_choice">Second Choice</label>
                                                            <select class="form-control show-tick" name="second_choice">
                                                                <option value="">-- Select --</option>
                                                                @foreach($programmes as $programme)
                                                                <option value="{{$programme->id}}">{{$programme->course}}</option>
                                                                @endforeach
                                                            </select>
                                                        </div><br>
                                                        <div class="col-md-12">
                                                            <label for="jamb_score">JAMB Score(If applicable)</label>
                                                            <div class="form-group">
                                                                <input type="number" class="form-control" placeholder="JAMB Score" name="jamb_score" id="jamb_score">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <label for="year_of_graduation">Year of Graduation</label>
                                                            <div class="form-group">
                                                                <input type="number" class="form-control" placeholder="Year of Graduation" name="year_of_graduation" id="year_of_graduation">
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div><br>
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
                                                            @foreach($subjects as $key => $subject)
                                                            <?php $all_subjects[$subject->id] = $subject->name; ?>
                                                            <option value="{{$subject->id}}">{{$subject->name}}</option>
                                                            @endforeach

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
                                                            <?php $baseYear = date('Y') - 15; ?>
                                                            @for($i=0; $i<=15; $i++) <option value="{{ ($baseYear + $i) }}">{{ ($baseYear + $i) }}</option>

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
                                                            <input type="text" class="form-control" placeholder="School Name" name="school_name" id="school_name">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 ">
                                                        <label for="registration_no">Registration No</label>
                                                        <div class="form-group">
                                                            <input type="text" class="form-control" placeholder="Registration Number" name="registration_no" id="registration_no">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 ">
                                                        <label for="certificate">Certificate Awarded</label>
                                                        <div class="form-group">
                                                            <input type="text" class="form-control" placeholder="Certificate Awarded" name="certificate" id="certificate">
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
                                                            <?php $baseYear = date('Y') - 30; ?>
                                                            @for($i=0; $i<=30; $i++) <option value="{{ ($baseYear + $i) }}">{{ ($baseYear + $i) }}</option>

                                                                @endfor
                                                        </select>
                                                    </div>
                                                    <div class="col-sm-2">
                                                        <label for="year_graduated">Year Graduated</label>
                                                        <select class="form-control show-tick" name="year_graduated" id="year_graduated">
                                                            <option value="">-- Select --</option>
                                                            <?php $baseYear = date('Y') - 30; ?>
                                                            @for($i=0; $i<=30; $i++) <option value="{{ ($baseYear + $i) }}">{{ ($baseYear + $i) }}</option>

                                                                @endfor
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
                                                        <input type="file" accept="image/*" class="form-control" name="first_sitting_result" id="first_sitting_result">
                                                    </div>

                                                    <div class="col-md-6 col-sm-6">
                                                        <label for="second_sitting_result">Second Sitting O'Level Result(If applicable)</label>
                                                        <input type="file" accept="image/*" class="form-control" name="second_sitting_result" id="second_sitting_result">
                                                    </div><br><br>

                                                    <div class="col-md-6 col-sm-6">
                                                        <label for="birth_certificate">Birth Certificate</label>
                                                        <input type="file" accept="image/*" class="form-control" name="birth_certificate" id="birth_certificate">
                                                    </div>
                                                </div><br>

                                                <div class="row clearfix">
                                                    <div class="col-12">
                                                        <h5>Note the following:</h5>
                                                        @if(Session::get('school') == 'uniben')
                                                        <strong>
                                                            <ul>
                                                                <li>MINIMUM OF 200 IN JAMB</li>
                                                                <li>CREDIT IN 5 RELEVANT O'LEVEL SUBJECTS</li>
                                                                <li>DE CANDIDATES IS MINIMUM OF MERIT IN NCE/and UPPER CREDIT IN OND</li>
                                                            </ul>
                                                        </strong>

                                                        @elseif(Session::get('school') == 'delsu')
                                                        <strong>
                                                            <ul>
                                                                <li>MINIMUM OF 170 IN JAMB</li>
                                                                <li>CREDIT IN 5 RELEVANT O'LEVEL SUBJECTS</li>
                                                                <li>DE CANDIDATES IS MINIMUM OF MERIT IN NCE/and UPPER CREDIT IN OND</li>
                                                            </ul>
                                                        </strong>
                                                        @endif

                                                        <p><strong class="text-danger">Please check to be sure you meet the requirements, applicants who do not meet the requirements will be automatically disqualified.</strong></p>

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

@section('script')
<script>
    let all_subjects = <?= json_encode($all_subjects); ?>;

    function chooseImage() {
        document.getElementById('passport').click();
    }

    function readURL(input) {
        if (input.files && input.files[0]) {

            var reader = new FileReader();
            reader.onload = function(e) {
                document.getElementById("passport_display").setAttribute("src", e.target.result);
            };

            reader.readAsDataURL(input.files[0]);
        }
    }

    let result_data = [];
    let schools = [];

    function addOLevelResult() {
        let subject = document.getElementById('subject').value;
        let grade = document.getElementById('grade').value;
        let examination = document.getElementById('examination').value;
        let sitting = document.getElementById('sitting').value;
        let year = document.getElementById('year').value;

        if (subject != '' && grade != '' && examination != '' && sitting != '' && year != '') {
            result_data.push({
                'subject': subject,
                'grade': grade,
                'examination': examination,
                'sitting': sitting,
                'year': year
            })

            document.getElementById('olevel_result').value = JSON.stringify(result_data);

            // document.getElementById('subject').value = '';
            // document.getElementById('grade').value = '';
            // examination = document.getElementById('examination').value = '';
            // sitting = document.getElementById('sitting').value = '';
            // year = document.getElementById('year').value = '';

            displayVailableResults();

        } else {
            alert('Please provide all details');
        }

    }

    function displayVailableResults() {
        document.getElementById('table_body').innerHTML = "";
        let table_body = document.getElementById('table_body');

        for(var i=0; i<result_data.length; i++){
            var row = document.createElement('tr');
            var cell = document.createElement('td');
                cell.innerText = all_subjects[result_data[i].subject];
                row.appendChild(cell);

            var cell = document.createElement('td');
                cell.innerText = result_data[i].grade;
                row.appendChild(cell);
                
            var cell = document.createElement('td');
                cell.innerText = result_data[i].examination;
                row.appendChild(cell);
                
            var cell = document.createElement('td');
                cell.innerText = result_data[i].sitting;
                row.appendChild(cell);
                
            var cell = document.createElement('td');
                cell.innerText = result_data[i].year;
                row.appendChild(cell);
                
            var cell = document.createElement('td');
                

            var deleteBtn = document.createElement('button');
                deleteBtn.type = 'button';
                deleteBtn.id = 'button_'.concat(i);
                deleteBtn.innerText = "Remove"
                deleteBtn.classList.add('btn', 'btn-sm', 'btn-danger');
                deleteBtn.addEventListener(    
                    'click',
                    function(e) {
                        var index = e.target.id.split("_")[1];
                        result_data.splice(index, 1);

                        document.getElementById('olevel_result').value = JSON.stringify(result_data);

                        displayVailableResults();
                    }
                );
            
                cell.appendChild(deleteBtn);
                row.appendChild(cell);

            // let row = '<tr>' +
            //     '<td>' + all_subjects[element.subject] + '</td>' +
            //     '<td>' + element.grade + '</td>' +
            //     '<td>' + element.examination + '</td>' +
            //     '<td>' + element.sitting + '</td>' +
            //     '<td>' + element.year + '</td>' +
            //     '<td><a>Delete</a></td>' +
            //     '</tr>';

            table_body.appendChild(row);

        }

    }

    function addSchoolAttended() {
        let school_name = document.getElementById('school_name').value;
        let registration_no = document.getElementById('registration_no').value;
        let certificate = document.getElementById('certificate').value;
        let institution = document.getElementById('institution').value;
        let entry_year = document.getElementById('entry_year').value;
        let year_graduated = document.getElementById('year_graduated').value;

        if (school_name != '' && certificate != '' && institution != '' && entry_year != '' && year_graduated != '') {
            schools.push({
                'name': school_name,
                'registration_no': registration_no,
                'certificate': certificate,
                'institution': institution,
                'entry_year': entry_year,
                'year_graduated': year_graduated
            })

            document.getElementById('schools_attended').value = JSON.stringify(schools);

            document.getElementById('school_name').value = '';
            document.getElementById('registration_no').value = '';
            document.getElementById('certificate').value = '';
            document.getElementById('institution').value = '';
            document.getElementById('entry_year').value = '';
            document.getElementById('year_graduated').value = '';

            displayVailableSchools();

        } else {
            alert('Please provide all details');
        }

    }

    function displayVailableSchools() {
        // let table_body = "";

        // schools.forEach((element) => {
        //     let row = '<tr>' +
        //         '<td>' + element.name + '</td>' +
        //         '<td>' + element.registration_no + '</td>' +
        //         '<td>' + element.certificate + '</td>' +
        //         '<td>' + element.institution + '</td>' +
        //         '<td>' + element.entry_year + '</td>' +
        //         '<td>' + element.year_graduated + '</td>' +
        //         '</tr>';

        //     table_body = table_body.concat(row);
        // });

        // document.getElementById('schools_table_body').innerHTML = table_body;

        document.getElementById('schools_table_body').innerHTML = "";
        let table_body = document.getElementById('schools_table_body');

        for(var i=0; i<schools.length; i++){
            var row = document.createElement('tr');
            var cell = document.createElement('td');
                cell.innerText = schools[i].name;
                row.appendChild(cell);

            var cell = document.createElement('td');
                cell.innerText = schools[i].registration_no;
                row.appendChild(cell);
                
            var cell = document.createElement('td');
                cell.innerText = schools[i].certificate;
                row.appendChild(cell);
                
            var cell = document.createElement('td');
                cell.innerText = schools[i].institution;
                row.appendChild(cell);
                
            var cell = document.createElement('td');
                cell.innerText = schools[i].entry_year;
                row.appendChild(cell);

            var cell = document.createElement('td');
                cell.innerText = schools[i].year_graduated;
                row.appendChild(cell);
                
            var cell = document.createElement('td');
                

            var deleteBtn = document.createElement('button');
                deleteBtn.type = 'button';
                deleteBtn.id = 'schBtn_'.concat(i);
                deleteBtn.innerText = "Remove"
                deleteBtn.classList.add('btn', 'btn-sm', 'btn-danger');
                deleteBtn.addEventListener(    
                    'click',
                    function(e) {
                        var index = e.target.id.split("_")[1];
                        schools.splice(index, 1);

                        document.getElementById('schools_attended').value = JSON.stringify(schools);

                        displayVailableSchools();
                    }
                );
            
                cell.appendChild(deleteBtn);
                row.appendChild(cell);

            table_body.appendChild(row);

        }

    }
    
</script>

@endsection
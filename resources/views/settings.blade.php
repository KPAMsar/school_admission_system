@extends('layouts.admin')

@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Change Password</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Change Password</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col">
            <!-- general form elements -->
            <div class="card ">
              <div class="card-header">
                <h3 class="card-title">Change Password</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="{{route('admin_post_settings_')}}" method="post"> 

              @csrf
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">password</label>
                    <input type="password" class="form-control"  name="old_password" placeholder="Old Password">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">New Password</label>
                    <input type="password" class="form-control" name="new_password" placeholder="New Password">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Confirm New Password</label>
                    <input type="password" class="form-control"  name="confirm_password" placeholder="Confirm Password">
                  </div>
                  
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Change Password</button>
                </div>
              </form>
            </div>
            <!-- /.card -->

        

          </div>
          <!--/.col (left) -->
          <!-- right column -->
          
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
<br><br>
    
  </div>
@endsection



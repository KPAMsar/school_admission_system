@extends('layouts.admin')

@section('content')
<br><br>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Access Settings</h1>
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
                        <a href="#" data-toggle="modal" data-target="#programs" class="btn btn-info btn-sm">Add Admin </a>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>s/n</th>
                                    <th>Name</th>
                                    <th>Phone Number</th>
                                    <th>Email</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($admin as $key=> $data)
                                <tr>
                                    <td>{{$key + 1}}</td>
                                    <td>{{$data->first_name . ' '.$data->last_name .' '.$data->other_names}}</td>
                                    <td>{{$data->phone_number}}</td>
                                    <td> {{$data->email}}</td>
                                    <td class="text-right">
                                        <div class="actions">

                                            <a href="" class="btn btn-sm bg-success-light mr-2" data-toggle="modal" data-target="#editModal">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <a href="" class="btn btn-sm bg-success-light mr-2" data-toggle="modal" data-target="#deleteModal" href="" class="btn btn-sm bg-danger-light">
                                                <i class="fas fa-trash"></i>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>s/n</th>
                                    <th>Name</th>
                                    <th>Phone Number</th>
                                    <th>Email</th>
                                    <th>Action</th>

                                </tr>
                            </tfoot>
                        </table>

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


<!-- MODAL -->
<div class="modal fade" id="programs" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="{{route('admin_save_access_settings_')}}" method="post">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Admin User</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <div class="form-group row">
                        <div class="col-md-12">
                            <label for="">First Name</label>
                            <input type="text" name="first_name" class="form-control" placeholder="First Name" name="programme">
                        </div>
                        <div class="col-md-12">
                            <label for="">Last Name</label>
                            <input type="text" name="last_name" class="form-control" placeholder="Last Name" name="entry_mode">
                        </div>
                        <div class="col-md-12">
                            <label for="">Other Name</label>
                            <input type="text" name="other_names" class="form-control" placeholder="Other Name">
                        </div>
                        <div class="col-md-12">
                            <label for="">Phone Number</label>
                            <input type="text" name="phone_number" class="form-control" placeholder="Phone Number">
                        </div>
                        <div class="col-md-12">
                            <label for="">Email</label>
                            <input type="email" name="email" class="form-control" placeholder="Email">
                        </div>
                        <div class="col-md-12">
                            <label for="">Password</label>
                            <input type="password" name="password" class="form-control" name="password" placeholder="Password">
                        </div>
                        <div class="col-md-12">
                            <label for="">confirm Password</label>
                            <input type="password" class="form-control" name="confirm_password" placeholder="Confirm Password">
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>

        </div>
    </div>
</div>

<!-- MODAL -->
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="{{route('admin_save_access_settings_')}}" method="post">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Admin User</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <div class="form-group row">
                        <div class="col-md-12">
                            <label for="">First Name</label>
                            <input type="text" name="first_name" class="form-control" placeholder="First Name" name="programme">
                        </div>
                        <div class="col-md-12">
                            <label for="">Last Name</label>
                            <input type="text" name="last_name" class="form-control" placeholder="Last Name" name="entry_mode">
                        </div>
                        <div class="col-md-12">
                            <label for="">Other Name</label>
                            <input type="text" name="other_names" class="form-control" placeholder="Other Name">
                        </div>
                        <div class="col-md-12">
                            <label for="">Phone Number</label>
                            <input type="text" name="phone_number" class="form-control" placeholder="Phone Number">
                        </div>
                        <div class="col-md-12">
                            <label for="">Email</label>
                            <input type="email" name="email" class="form-control" placeholder="Email">
                        </div>
                        <div class="col-md-12">
                            <label for="">Password</label>
                            <input type="password" name="password" class="form-control" name="password" placeholder="Password">
                        </div>
                        <div class="col-md-12">
                            <label for="">confirm Password</label>
                            <input type="password" class="form-control" name="confirm_password" placeholder="Confirm Password">
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>

        </div>
    </div>
</div>


  <!-- MODAL -->
  <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <form action="#" method="">
            
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Logout</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>

            <div class="modal-body">
              <div class="form-group row">
                <div class="col-md-12" style="text-align:center;">
                  <label for="">You are about to delete an Admin User
                    <br>
                    This action is irreversible.
                  </label>
                </div>

              </div>
            </div>

            <div class="container">
              <div class="row">
                <div class="">
                  <div class="modal-footer">
                      <a href="{{ route('admin_home')}}">
                        <button type="button" class="btn btn-primary" style="float:left;">Cancel</button>
                      </a>
                </div>
                </div>
                <div class="col">
                  <div class="modal-footer">
                  <a href="{{ route('logout')}}">
                    <button type="button" class="btn btn-danger" style="float:right;">Delete</button>
                  </a>
                  </div>
                </div>
              </div>
            </div>
          </form>

        </div>
      </div>
    </div>

@endsection



@section('script')
<!-- DataTables  & Plugins -->
<script src="{{url('assets/plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{url('assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{url('assets/plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{url('assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
<script src="{{url('assets/plugins/datatables-buttons/js/dataTables.buttons.min.js')}}"></script>
<script src="{{url('assets/plugins/datatables-buttons/js/buttons.bootstrap4.min.js')}}"></script>
<script src="{{url('assets/plugins/jszip/jszip.min.js')}}"></script>
<script src="{{url('assets/plugins/pdfmake/pdfmake.min.js')}}"></script>
<script src="{{url('assets/plugins/pdfmake/vfs_fonts.js')}}"></script>
<script src="{{url('assets/plugins/datatables-buttons/js/buttons.html5.min.js')}}"></script>
<script src="{{url('assets/plugins/datatables-buttons/js/buttons.print.min.js')}}"></script>
<script src="{{url('assets/plugins/datatables-buttons/js/buttons.colVis.min.js')}}"></script>
<script>
    $(function() {
        $("#example1").DataTable({
            "responsive": true,
            "lengthChange": false,
            "autoWidth": false,
            "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        $('#example2').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
        });



    });

    $(document).ready(function() {
        $("#myBtn").click(function() {
            $("#myModal").modal("show");
        });
    });
</script>
@endsection
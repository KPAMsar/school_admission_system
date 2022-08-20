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
                        <a href="#" data-toggle="modal" data-target="#programs" class="btn btn-info btn-sm">Add Session </a>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>s/n</th>
                                    <th>Current Session</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($session as $key=> $data)


                                <tr>
                                    <td>{{$key + 1}}</td>
                                    <td>{{$data->session}}</td>
                                    <td>{{$data->status}}</td>
                                    <td class="text-right">
                                        <div class="actions">

                                            <a href="" class="btn btn-sm bg-success-light mr-2" data-toggle="modal"  data-target="#editModal" onclick="loadSessionDetails('{{$data->id}}','{{$data->session}}','{{$data->status}}')">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <a href="" class="btn btn-sm bg-success-light mr-2" data-toggle="modal" data-target="#deleteModal" class="btn btn-sm bg-danger-light"  onclick="loadDeleteDetails('{{$data->id}}')">
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
                                    <th>Current Session</th>
                                    <th>Status</th>
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
            <form action="{{route('admin_save_session')}}" method="post">
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
                            <label for="">Session</label>
                            <input type="text" name="session" class="form-control" placeholder="Academic Session">
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
            <form action="{{route('admin_update_session')}}" method="post">
                @method('PUT')
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Academic Session</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <div class="form-group row">
                    <input type="hidden" name="session_id" id="session_id">

                        <div class="col-md-12">
                            <label for="">Session</label>
                            <input type="text" name="session"  value=""  id="session" class="form-control" placeholder="Academic Session">
                        </div>
                        <div class="col-md-12">
                            <label for="">Status</label>
                            <select class="form-control show-tick"  id="status" name="status">
                                <option value="">-- Select --</option>
                                <option value="Active">Active</option>
                                <option value="Inactive">Inactive</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </form>

        </div>
    </div>
</div>

<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="{{route('admin_delete_session')}}" method="post">
                @method('DELETE')
                @csrf

                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Delete Subject</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <input type="hidden" name="session_delete_id" id="session_delete_id">

                <div class="modal-body">
                    <div class="form-group row">
                        <div class="col-md-12" style="text-align:center;">
                            <label for="">You are about to delete a Session
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
                                <a href="">
                                    <button type="button" class="btn btn-primary"   data-dismiss="modal" style="float:left;">Cancel</button>
                                </a>
                            </div>
                        </div>
                        <div class="col">
                            <div class="modal-footer">
                                <a href="">
                                    <button type="submit" class="btn btn-danger" style="float:right;">Delete</button>
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


    function loadSessionDetails(id,session,status){
        document.getElementById('session_id').value = id;
        document.getElementById('session').value = session;
        document.getElementById('status').value = status;
        
    }
    function loadDeleteDetails(id){
        document.getElementById('session_delete_id').value = id;
        
    }
</script>
@endsection
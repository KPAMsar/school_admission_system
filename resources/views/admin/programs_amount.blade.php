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
                    <h1>Program Amount</h1>
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
                        <a href="#" data-toggle="modal" data-target="#addAmount" class="btn btn-info btn-sm">Add Amount</a>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>s/n</th>
                                    <th>Programme</th>
                                    <th>Entry Mode</th>
                                    <th>Amount</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($data as $key =>$item)
                                <tr>
                                    <td>{{$key + 1}}</td>
                                    <td>{{$item->programme}}</td>
                                    <td> {{$item->entry_mode}}</td>
                                    <td>{{$item->amount}}</td>
                                    <td class="text-right">
                                        <div class="actions">

                                            <a href="" class="btn btn-sm bg-success-light "    data-toggle="modal" data-target="#editAmount" onclick="loadProgramDetails('{{$item->id}}','{{$item->programme}}','{{$item->entry_mode}}','{{$item->amount}}',)">
                                                <i class="fas fa-edit"></i>
                                            </a> 
                                            <a href="" class="" data-toggle="modal" data-target="#deleteAmount" class="btn btn-sm bg-danger-light">
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
                                    <th>Programme</th>
                                    <th>Entry Mode</th>
                                    <th>Amount</th>
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
<div class="modal fade" id="addAmount" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="{{route('admin_save_program_amount')}}" method="post">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Program Amount</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <div class="form-group row">
                        <div class="col-md-12">
                            <label for="">Programme</label>
                            <input type="text" class="form-control" placeholder="Programme" name="programme">
                        </div>
                        <div class="col-md-12">
                            <label for="">Entry Mode</label>
                            <select class="form-control show-tick" name="entry_mode">
                                <option value="">-- Select --</option>
                                <option value="Bsc">BSC</option>
                                <option value="HND">HND</option>
                                <option value="NC">NC</option>
                               

                            </select>
                        </div>
                        <div class="col-md-12">
                            <label for="">Amount</label>
                            <input type="number" class="form-control" placeholder="Amount" name="amount">
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
 <div class="modal fade" id="editAmount" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="{{route('admin_update_program_amount')}}" method="post">
                @method('PUT')
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Program Amount</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <div class="form-group row">
                    <input type="hidden" name="programme_amount_id" id="programme_amount_id">

                        <div class="col-md-12">
                            <label for="">Programme</label>
                            <input type="text" class="form-control" placeholder="Programme" value=""  id="programme" name="programme">
                        </div>
                        <div class="col-md-12">
                            <label for="">Entry Mode</label>
                            <select class="form-control show-tick" name="entry_mode" id="entry_mode">
                                <option value="">-- Select --</option>
                                <option value="Bsc">BSC</option>
                                <option value="HND">HND</option>
                                <option value="NC">NC</option>
                               

                            </select>
                        </div>
                        <div class="col-md-12">
                            <label for="">Amount</label>
                            <input type="number" class="form-control" placeholder="Amount"  id="amount" value=""name="amount">
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

<!-- MODAL -->
<div class="modal fade" id="deleteAmount" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="{{ route('admin_delete_program_amount',$item->id)}}" method="post">
                @method('DELETE')
                @csrf

                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Delete Program Amount</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <div class="form-group row">
                        <div class="col-md-12" style="text-align:center;">
                            <label for="">You are about to delete a program amount
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
                                    <button type="button" class="btn btn-primary" style="float:left;" data-dismiss="modal">Cancel</button>
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

    
    function loadProgramDetails(id,programme,entry_mode,amount){

document.getElementById('programme_amount_id').value = id;
document.getElementById('programme').value = programme;
document.getElementById('entry_mode').value = entry_mode;
document.getElementById('amount').value = amount;
}
</script>
@endsection

<!-- MODAL -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="#" method="post">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Logout</h5>
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
                            <input type="text" class="form-control" placeholder="Entry Mode" name="entry_mode">
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
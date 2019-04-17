<div class="modal fade" id="add_position_modal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Add Lecturer Handler</h4>
        <button type="button" class="close text-danger" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <form class="" action="{{ route('sys_admin.add_position') }}" method="post">
          @csrf



          <div class="row mt-2">
            <div class="col-md-6 col-12">
              <div class="form-group">
               <label for="position_title">Position title</label>
               <input type="text" name="position_title" class="form-control" id="position_title" aria-describedby="position_title" required placeholder="Enter Position title">
             </div>
            </div>
          </div>



          <input type="submit" name="" value="SAVE" class="btn btn-create pl-3 pr-3 float-right">

        </form>
      </div>

    </div>
  </div>
</div>

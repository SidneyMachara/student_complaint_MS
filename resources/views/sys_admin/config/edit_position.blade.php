<div class="modal fade" id="edit_position_modal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Edit Position title</h4>
        <button type="button" class="close text-danger" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <form class="" action="{{ route('sys_admin.edit_position') }}" method="post">
          @csrf

          <input type="hidden" name="_method" value="PUT">
          <input type="hidden" name="edit_position_id" id="edit_position_id" value="">


          <div class="row mt-2">
            <div class="col-md-6 col-12">
              <div class="form-group">
               <label for="edit_position_title">Position title</label>
               <input type="text" name="edit_position_title" class="form-control" id="edit_position_title" aria-describedby="position_title" required >
             </div>
            </div>
          </div>



          <input type="submit" name="" value="UPDATE" class="btn btn-create pl-3 pr-3 float-right">

        </form>
      </div>

    </div>
  </div>
</div>

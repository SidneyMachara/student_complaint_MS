<div class="modal fade" id="edit_lectu_modal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Edit Lecturer</h4>
        <button type="button" class="close text-danger" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <form class="" action="{{ route('sys_admin.edit_lecturer') }}" method="post">
          @csrf
          <input type="hidden" name="_method" value="PUT">
          <input type="hidden" name="edit_id" id="edit_id" value="">

          <div class="row">
            <div class="col-md-6 col-12">
              <div class="form-group">
               <label for="edit_lecturer_name">Full-Name</label>
               <input type="text" name="edit_lecturer_name" class="form-control" id="edit_lecturer_name" aria-describedby="fullName"  required>
             </div>
            </div>
            <div class="col-md-6 col-12">
              <div class="form-group">
               <label for="edit_lecturer_id">Lecturer id</label>
               <input type="number" name="edit_lecturer_id" class="form-control" id="edit_lecturer_id" aria-describedby="studentId"  required>
             </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-6 col-12">
              <div class="form-group">
               <label for="edit_lecturer_email">Email</label>
               <input type="email" name="edit_lecturer_email" class="form-control" id="edit_lecturer_email" aria-describedby="email" required>
             </div>
            </div>
            <div class="col-md-6 col-12">

            </div>
          </div>

          <input type="submit" name="" value="UPDATE" class="btn btn-create pl-3 pr-3 float-right">

        </form>
      </div>

    </div>
  </div>
</div>

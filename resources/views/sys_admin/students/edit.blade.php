<div class="modal fade" id="edit_stud_modal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Edit Student</h4>
        <button type="button" class="close text-danger" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <form class="" action="{{ route('sys_admin.edit_student') }}" method="post">
          @csrf

          <input type="hidden" name="edit_id" id="edit_id" value="">
          <input type="hidden" name="_method" value="PUT">

          <div class="row">
            <div class="col-md-6 col-12">
              <div class="form-group">
               <label for="edit_student_name">Full-Name</label>
               <input type="text" name="edit_student_name" class="form-control" id="edit_student_name" aria-describedby="fullName"  required>
             </div>
            </div>
            <div class="col-md-6 col-12">
              <div class="form-group">
               <label for="edit_student_id">Student id</label>
               <input type="number" name="edit_student_id" class="form-control" id="edit_student_id" aria-describedby="edit_student_id" required>
             </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-6 col-12">
              <div class="form-group">
               <label for="edit_student_email">Email</label>
               <input type="email" name="edit_student_email" class="form-control" id="edit_student_email" aria-describedby="email" required>
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

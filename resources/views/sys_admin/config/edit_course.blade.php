<div class="modal fade" id="edit_course_modal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Edit Course</h4>
        <button type="button" class="close text-danger" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <form class="" action="{{ route('sys_admin.edit_course') }}" method="post">
          @csrf

        <input type="hidden" name="edit_course_id" id="edit_course_id" value="">
        <input type="hidden" name="_method" value="PUT">

          <div class="row mt-2">
            <div class="col-md-6 col-12">
              <div class="form-group">
               <label for="edit_course_code">Course Code</label>
               <input type="text" name="edit_course_code" class="form-control" id="edit_course_code" aria-describedby="course_code" required>
             </div>
            </div>


          </div>

  <input type="submit" name="" value="UPDATE" class="btn btn-create pl-3 pr-3 float-right">



        </form>
      </div>

    </div>
  </div>
</div>

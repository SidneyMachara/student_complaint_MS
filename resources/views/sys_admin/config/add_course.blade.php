<div class="modal fade" id="add_course_modal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Add Course</h4>
        <button type="button" class="close text-danger" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <form class="" action="{{ route('sys_admin.add_course') }}" method="post">
          @csrf


          <div class="row mt-2">
            <div class="col-md-6 col-12">
              <div class="form-group">
               <label for="course_code">Course Code</label>
               <input type="text" name="course_code" class="form-control" id="course_code" aria-describedby="course_code" placeholder="Enter Course Code">
             </div>
            </div>
          </div>



          <input type="submit" name="" value="SAVE" class="btn btn-success float-right">

        </form>
      </div>

    </div>
  </div>
</div>

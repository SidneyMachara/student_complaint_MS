<div class="modal fade" id="add_lectu_modal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Add Lecturer</h4>
        <button type="button" class="close text-danger" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <form class="" action="{{ route('sys_admin.store_lecturer') }}" method="post">
          @csrf
          <div class="row">
            <div class="col-md-6 col-12">
              <div class="form-group">
               <label for="fullName">Full-Name</label>
               <input type="text" name="fullname" class="form-control" id="fullName" aria-describedby="fullName" placeholder="Enter Full-Name">
             </div>
            </div>
            <div class="col-md-6 col-12">
              <div class="form-group">
               <label for="lecturerId">Lecturer id</label>
               <input type="number" name="lecturerId" class="form-control" id="lecturerId" aria-describedby="studentId" placeholder="Enter lecture Id">
             </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-6 col-12">
              <div class="form-group">
               <label for="email">Email</label>
               <input type="email" name="email" class="form-control" id="email" aria-describedby="email" placeholder="Enter email">
             </div>
            </div>
            <div class="col-md-6 col-12">

            </div>
          </div>

          <input type="submit" name="" value="SAVE" class="btn btn-create pl-3 pr-3 float-right">

        </form>
      </div>

    </div>
  </div>
</div>

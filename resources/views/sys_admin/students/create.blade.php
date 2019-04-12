<div class="modal" id="add_stud_modal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Add Student</h4>
        <button type="button" class="close text-danger" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <form class="" action="{{ route('sys_admin.store_student') }}" method="post">
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
               <label for="studentId">Student id</label>
               <input type="number" name="studentId" class="form-control" id="studentId" aria-describedby="studentId" placeholder="Enter Student Id">
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

          <input type="submit" name="" value="SAVE" class="btn btn-success float-right">

        </form>
      </div>

    </div>
  </div>
</div>

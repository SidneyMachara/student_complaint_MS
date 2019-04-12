<div class="modal" id="add_complin_modal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Add Complaint</h4>
        <button type="button" class="close text-danger" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <form class="" action="{{ route('sys_admin.store_student') }}" method="post">
          @csrf
          <div class="row">
            <div class="col-md-6 col-6">
                <input type="radio" name="" value="1">
            </div>
            <div class="col-md-6 col-6">
              <input type="radio" name="" value="1">
            </div>
          </div>

          <div class="row mt-2">
            <div class="col-md-6 col-12">
              <div class="form-group">
               <label for="fullName">Subject</label>
               <input type="text" name="Subject" class="form-control" id="Subject" aria-describedby="Subject" placeholder="Enter Full-Name">
             </div>
            </div>
            <div class="col-md-6 col-12">
              <div class="form-group">
               <label for="studentId">Lecturer</label>
               <input type="number" name="studentId" class="form-control" id="studentId" aria-describedby="studentId" placeholder="Enter Student Id">
             </div>
            </div>
          </div>

          <div class="row">
            <div class="col-12 col-md-12">
              <textarea name="name" rows="5" cols="63"></textarea>
            </div>
          </div>

          <div class="row">
            <input type="file" name="" value="">
          </div>

          <input type="submit" name="" value="SAVE" class="btn btn-success float-right">

        </form>
      </div>

    </div>
  </div>
</div>

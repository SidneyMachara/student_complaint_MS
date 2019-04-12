<div class="modal" id="add_lecturer_handler_modal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Add Lecturer Handler</h4>
        <button type="button" class="close text-danger" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <form class="" action="{{ route('sys_admin.add_handler') }}" method="post">
          @csrf

          <input type="hidden" name="complaint_type" value="{{ config('const.complaint_type.lecturer') }}">

          <div class="row mt-2">
            <div class="col-md-6 col-12">
              <div class="form-group">
                <label for="hander">Select Hander</label>
                <select class="form-control" id="hander" name="lecturer_id">
                  @foreach ($lecturers as $lecturer)
                    <option value="{{ $lecturer->id }}">{{ $lecturer->user->name }}</option>
                  @endforeach
                </select>
              </div>
            </div>
          </div>



          <input type="submit" name="" value="SAVE" class="btn btn-success float-right">

        </form>
      </div>

    </div>
  </div>
</div>

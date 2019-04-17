<div class="modal fade" id="add_grade_handler_modal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Add Grade Handler</h4>
        <button type="button" class="close text-danger" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <form class="" action="{{ route('sys_admin.add_handler') }}" method="post">
          @csrf

          <input type="hidden" name="complaint_type" value="{{ config('const.complaint_type.grade') }}">

          <div class="row mt-2">
            <div class="col-md-6 col-12">
              <div class="form-group">
                <label for="grade_hander">Select Hander</label>
                <select class="form-control" id="grade_hander" name="lecturer_id">
                  @foreach ($lecturers as $lecturer)
                    <option value="{{ $lecturer->id }}">{{ $lecturer->user->name }}</option>
                  @endforeach
                </select>
              </div>
            </div>

            <div class="col-md-6 col-12">
              <div class="form-group">
                <label for="position_id">Select Position</label>
                <select class="form-control" id="position_id" name="position_id" required>
                  <option value="" selected disabled>-----</option>
                  @foreach ($positions as $position)
                    <option value="{{ $position->id }}">{{ $position->title }}</option>
                  @endforeach
                </select>
              </div>
            </div>
          </div>



          <input type="submit" name="" value="SAVE" class="btn btn-create pl-3 pr-3 float-right">

        </form>
      </div>

    </div>
  </div>
</div>

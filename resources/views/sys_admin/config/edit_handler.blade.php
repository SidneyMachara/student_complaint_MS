<div class="modal fade" id="edit_handler_modal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Edit Grade Handler <span class="which_level text-success">(Level )</span></h4>
        <button type="button" class="close text-danger" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <form class="" action="{{ route('sys_admin.update_handler') }}" method="post">
          @csrf

          <input type="hidden" name="complaint_id" id="complaint_id" value="">
          <input type="hidden" name="_method" value="PUT">

          <div class="row mt-2">
            <div class="col-md-6 col-12">
              <div class="form-group">
                <label for="grade_hander">Select Hander</label>
                <select class="form-control" id="edit_hander" name="lecturer_id" required>
                  @foreach ($lecturers as $lecturer)
                    <option value="{{ $lecturer->id }}">{{ $lecturer->user->name }}</option>
                  @endforeach
                </select>
              </div>
            </div>

            <div class="col-md-6 col-12">
              <div class="form-group">
                <label for="position_id">Select Position</label>
                <select class="form-control" id="edit_position_id" name="position_id" required>
                  {{-- <option value="" selected disabled>-----</option> --}}
                  @foreach ($positions as $position)
                    <option value="{{ $position->id }}">{{ $position->title }}</option>
                  @endforeach
                </select>
              </div>
            </div>
          </div>



          <input type="submit" name="" value="UPDATE" class="btn btn-create pl-3 pr-3 float-right">

        </form>
      </div>

    </div>
  </div>
</div>

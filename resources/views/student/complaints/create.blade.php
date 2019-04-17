<div class="modal fade" id="add_complin_modal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Add Complaint</h4>
        <button type="button" class="close text-danger" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <form class="" action="{{ route('student.store_complaint') }}" method="post" enctype="multipart/form-data">
          @csrf
          <div class="row">
            <div class="col-md-6 col-6">
              <div class="form-check">
                <input class="form-check-input" type="radio" name="complaint_type" id="complaint_type1" value="{{ config('const.complaint_type.lecturer') }}" required>
                <label class="form-check-label" for="complaint_type1">
                  Lecturer
                </label>
              </div>
            </div>
            <div class="col-md-6 col-6">
              <div class="form-check">
                <input class="form-check-input" type="radio" name="complaint_type" id="complaint_type2" value="{{ config('const.complaint_type.grade') }}" >
                <label class="form-check-label" for="complaint_type2">
                  Grade
                </label>
              </div>
            </div>
          </div>

          <div class="row mt-3">
            <div class="col-md-12 col-12">
              <div class="form-group">
               <label for="title">Title</label>
               <input type="text" class="form-control" name="title" id="title" placeholder="Short Desciptive title" required>
             </div>
            </div>
          </div>

          <div class="row mt-4">
            <div class="col-md-6 col-12">
              <div class="form-group">
                <label for="course">Course</label>
                <select class="form-control" id="course" name="course_id" required>
                  <option selected>Select</option>
                  @foreach ($courses as $course)
                    <option value="{{$course->id}}">{{ $course->course_code }}</option>
                  @endforeach
                </select>
              </div>
            </div>

            <div class="col-md-6 col-12">
              <div class="form-group">
                <label for="lecturer">Lecturer</label>
                <select class="form-control" id="lecturer" name="lecturer_id" required>
                  <option selected>Select</option>
                  @foreach ($lecturers as $lecturer)
                    <option value="{{$lecturer->id}}">{{ $lecturer->user->name }}</option>
                  @endforeach
                </select>
              </div>
            </div>



          <div class="row p-2">
            <div class="col-12 col-md-12">
              <div class="form-group">
               <label for="complain">Decribe your complain in full: <small class="text-danger">Use proper english</small></label>
               <textarea name="body" required  class="form-control" id="complain" rows="5" cols="60"></textarea>
             </div>

            </div>
          </div>

          <div class="row p-3">
            <div class="col-md-6 col-12">
              <input type="file" name="c_files[]" multiple="" value="">
            </div>
            <div class="col-md-6 col-12">
                <input type="submit" name="" value="SAVE" class="btn btn-create pl-3 pr-3 float-right">
            </div>
          </div>






        </form>
      </div>

    </div>
  </div>
</div>

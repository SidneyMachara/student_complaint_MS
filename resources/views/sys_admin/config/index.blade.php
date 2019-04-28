@extends('layouts.sysAdminlayout')

@section('content')
  <div class="">

    <div class="row mt-4">
      <div class="col-md-6 col-12">
        <h5 class="text-muted">Grade handlers</h5>
          <a href="#" class="btn new-complaint-btn pl-4 pt-2 pb-2 pr-4" data-toggle="modal" data-target="#add_grade_handler_modal"> ADD HANDLER </a>
          <div class="card-body">
            <table class="table">
              <thead>
                <tr>
                  <th>Level</th>
                  <th>Handler</th>
                  <th>Position title</th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
                @foreach ($grade_handers as $grade_hander)
                  <tr>
                    <td>{{ $grade_hander->level }}</td>
                    <td>{{ $grade_hander->lecturer->user->name }}</td>
                    <td>{{ $grade_hander->position->title }}</td>
                    <td>
                      <a href="#" class="text-muted"
                        data-toggle="modal"
                        data-target="#edit_handler_modal"
                        data-lecturer_id="{{ $grade_hander->lecturer->id }}"
                        data-position_id="{{ $grade_hander->position->id }}"
                       >
                       Edit
                       {{-- <i class='fas fa-pencil-alt text-dark'></i> --}}
                       </a>
                     </td>
                  </tr>
                @endforeach
              </tbody>
            </table>

          </div>
      </div>

      <div class="col-md-6 col-12">
        <h5 class="text-muted">Lecturer handlers</h5>
        <a href="#" class="btn new-complaint-btn pl-4 pt-2 pb-2 pr-4" data-toggle="modal" data-target="#add_lecturer_handler_modal"> ADD HANDLER </a>
        <div class="card-body">
          <table class="table">
            <thead>
              <tr>
                {{-- <th>#</th> --}}
                <th>Level</th>
                <th>Handler</th>
                <th>Position title</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                @foreach ($lecturer_handers as $lecturer_hander)
                  <tr>
                    <td>{{ $lecturer_hander->level }}</td>
                    <td>{{ $lecturer_hander->lecturer->user->name }}</td>
                    <td>{{ $lecturer_hander->position->title }}</td>
                  </tr>
                @endforeach
              </tr>
            </tbody>
          </table>

        </div>
      </div>
    </div>

    <div class="row mt-4">
      <div class="col-md-6 col-12">
          <a href="#" class="btn new-complaint-btn pl-4 pt-2 pb-2 pr-4" data-toggle="modal" data-target="#add_course_modal"> ADD COURSE </a>
          <div class="card-body">
            <table class="table">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Course</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($courses as $key => $course)
                  <tr>
                    <td>{{ $key }}</td>
                    <td>{{ $course->course_code }}</td>
                  </tr>
                @endforeach
              </tbody>
            </table>
            {{ $courses->links() }}
          </div>
      </div>
      <div class="col-md-6 col-12">
          <a href="#" class="btn new-complaint-btn pl-4 pt-2 pb-2 pr-4" data-toggle="modal" data-target="#add_position_modal"> ADD POSITION </a>
          <div class="card-body">
            <table class="table">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Title</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($positions as $key => $position)
                  <tr>
                    <td>{{ $key }}</td>
                    <td>{{ $position->title }}</td>
                  </tr>
                @endforeach
              </tbody>
            </table>

          </div>
      </div>
    </div>

  </div>

  @include('sys_admin.config.add_course')
  @include('sys_admin.config.add_grade_handler')
  @include('sys_admin.config.add_lecturer_handler')
  @include('sys_admin.config.edit_handler')
  @include('sys_admin.config.add_position')
@endsection

@section('scripts')
  <script>
  $('#edit_handler_modal-Edit').on('show.bs.modal', function (event) {

var button = $(event.relatedTarget) // Button that triggered the modal

var lecturer_id = button.data('lecturer_id')
var position_id = button.data('position_id')



var modal = $(this)
modal.find('.modal-body #edit_hander').val(lecturer_id)
modal.find('.modal-body #edit_position_id').val(position_id)

});
  </script>
@endsection

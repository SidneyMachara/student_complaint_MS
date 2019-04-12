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
                </tr>
              </thead>
              <tbody>
                @foreach ($grade_handers as $grade_hander)
                  <tr>
                    <td>{{ $grade_hander->level }}</td>
                    <td>{{ $grade_hander->lecturer->user->name }}</td>
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
              </tr>
            </thead>
            <tbody>
              <tr>
                @foreach ($lecturer_handers as $lecturer_hander)
                  <tr>
                    <td>{{ $lecturer_hander->level }}</td>
                    <td>{{ $lecturer_hander->lecturer->user->name }}</td>
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
                  <th>course</th>
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
          </div>
      </div>
    </div>

  </div>
  @include('sys_admin.config.add_course')
  @include('sys_admin.config.add_grade_handler')
  @include('sys_admin.config.add_lecturer_handler')
@endsection

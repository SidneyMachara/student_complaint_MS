@extends('layouts.sysAdminlayout')


@section('content')
  <div class="">

    <a href="#" class="btn new-complaint-btn pl-4 pt-2 pb-2 pr-4 mt-4" data-toggle="modal" data-target="#add_stud_modal"> ADD STUDENT</a>

    <table class="table mt-5">
      <thead >
          <tr>
            <th>#</th>
            <th>Student #</th>
            <th>Full-Name</th>
            <th>email</th>
            <th># complaints</th>
          </tr>
      </thead>
      <tbody>
        @foreach ($students as $key => $student)
          <tr>
            <td>{{ $key }}</td>
            <td>{{ $student->student_id }}</td>
            <td>{{ $student->user->name }}</td>
            <td>{{ $student->user->email }}</td>
            <td>{{ count($student->complaints) }}</td>

          </tr>
        @endforeach

      </tbody>
    </table>
  </div>

  @include('sys_admin.students.create')
@endsection

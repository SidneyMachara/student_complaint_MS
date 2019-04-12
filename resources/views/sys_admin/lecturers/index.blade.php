@extends('layouts.sysAdminlayout')


@section('content')
  <div class="">

    <a href="#" class="btn new-complaint-btn pl-4 pt-2 pb-2 pr-4 mt-4" data-toggle="modal" data-target="#add_lectu_modal"> ADD LECTURER</a>

    <table class="table mt-5">
      <thead >
          <tr>
            <th>#</th>
            <th>LECTURER #</th>
            <th>Full-Name</th>
            <th>email</th>
            <th># complaints</th>
          </tr>
      </thead>
      <tbody>
        @foreach ($lecturers as $key => $lecturer)
          <tr>
            <td>{{ $key }}</td>
            <td>{{ $lecturer->lecturer_id }}</td>
            <td>{{ $lecturer->user->name }}</td>
            <td>{{ $lecturer->user->email }}</td>
            <td>{{ 0 }}</td>
          </tr>
        @endforeach

      </tbody>
    </table>
  </div>
  @include('sys_admin.lecturers.create')
@endsection

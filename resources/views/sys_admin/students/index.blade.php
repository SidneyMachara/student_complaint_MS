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
            <th></th>
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
            <td>
              <a href="#" class="text-muted"
                data-toggle="modal"
                data-target="#edit_stud_modal"
                data-id="{{ $student->id }}"
                data-student_id="{{ $student->student_id }}"
                data-student_name="{{ $student->user->name }}"
                data-student_email="{{ $student->user->email }}"
               >
               {{-- Edit --}}
               <i class='fa fa-pencil-alt text-dark text-muted'></i>
               </a>
             </td>
          </tr>
        @endforeach

      </tbody>
    </table>
  </div>

  @include('sys_admin.students.create')
  @include('sys_admin.students.edit')
@endsection

@section('scripts')
<script>
$('#edit_stud_modal').on('show.bs.modal', function (event) {

  var button = $(event.relatedTarget) // Button that triggered the modal

  var id = button.data('id')
  var student_id = button.data('student_id')
  var student_name = button.data('student_name')
  var student_email = button.data('student_email')

  var modal = $(this)
  modal.find('.modal-body #edit_id').val(id)
  modal.find('.modal-body #edit_student_id').val(student_id)
  modal.find('.modal-body #edit_student_name').val(student_name)
  modal.find('.modal-body #edit_student_email').val(student_email)

  });
</script>
@endsection

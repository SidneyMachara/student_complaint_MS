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
            <th></th>
          </tr>
      </thead>
      <tbody>
        @foreach ($lecturers as $key => $lecturer)
          <tr>
            <td>{{ $key }}</td>
            <td>{{ $lecturer->lecturer_id }}</td>
            <td>{{ $lecturer->user->name }}</td>
            <td>{{ $lecturer->user->email }}</td>
            <td>{{ count($lecturer->complaints) }}</td>
            <td>
              <a href="#" class="text-muted"
                data-toggle="modal"
                data-target="#edit_lectu_modal"
                data-id="{{ $lecturer->id }}"
                data-lecturer_id="{{ $lecturer->lecturer_id }}"
                data-lecturer_name="{{ $lecturer->user->name }}"
                data-lecturer_email="{{ $lecturer->user->email }}"
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
  @include('sys_admin.lecturers.create')
  @include('sys_admin.lecturers.edit')
@endsection


@section('scripts')
<script>
$('#edit_lectu_modal').on('show.bs.modal', function (event) {

  var button = $(event.relatedTarget) // Button that triggered the modal

  var id = button.data('id')
  var lecturer_id = button.data('lecturer_id')
  var lecturer_name = button.data('lecturer_name')
  var lecturer_email = button.data('lecturer_email')

  var modal = $(this)
  modal.find('.modal-body #edit_id').val(id)
  modal.find('.modal-body #edit_lecturer_id').val(lecturer_id)
  modal.find('.modal-body #edit_lecturer_name').val(lecturer_name)
  modal.find('.modal-body #edit_lecturer_email').val(lecturer_email)

  });
</script>
@endsection

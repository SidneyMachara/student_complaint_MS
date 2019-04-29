@extends('layouts.studentLayout')

@section('content')
  <div class="row">
    <div class="col-md-6 col-12">
      <img src="{{  asset('assets/avatar3.png') }}" class="rounded-circle" alt="" width="60" height="60">
      <p class="text-muted mt-4">{{ Auth::user()->name }}</p>
      <p class="text-muted">{{ Auth::user()->email }}</p>
      <p class="text-danger"># Complaints {{ count(Auth::user()->student->complaints) }}</p>
    </div>
    <div class="col-md-6 col-12">
      <h4 class="text-muted mb-4">Change Password</h4>
      <form class="" action="{{ route('change_password') }}" method="post">
        @csrf
        <div class="form-group">
         <label for="current_pwd">Current Password</label>
         <input type="password" class="form-control" name="current_pwd" id="current_pwd" placeholder="Current Password" required>
       </div>
        <div class="form-group">
         <label for="new_pwd">New Password</label>
         <input type="password" class="form-control" name="new_pwd" id="new_pwd" placeholder="New Password" required>
       </div>
        <div class="form-group">
         <label for="confirm_pwd">Confirm Password</label>
         <input type="password" class="form-control" name="confirm_pwd" id="confirm_pwd" placeholder="Confirm Password" required>
       </div>
       <div class="form-group">
        <input type="submit" class="btn btn-create d-table mt-3 float-right">
      </div>
      </form>
    </div>
  </div>
@endsection

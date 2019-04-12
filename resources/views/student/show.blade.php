@extends('layouts.studentLayout')

@section('content')

  <div class="">

    <div class="row">

      <div class="col-md-10 col-12">
        <div class="card-body p-4 rounded mini-complain-card">
          <div class="row ">
            <div class="col-md-1 ">
              <img src="{{  asset('assets/l.jpg') }}" class="rounded-circle" alt="" width="60" height="60">
            </div>
            <div class="col-md-6 my-auto pl-5">
              <h5 class="font-weight-bold mb-1  my-auto">{{ mb_strimwidth("This is the title how long can i get without distubin the procel of the human race is this", 0, 30, " ...")}}</h5>
              <small class="pt-0  my-auto font-weight-bold">
              10-10-10
              </small>
            </div>
            <div class="col-md-3 my-auto">
              <small class="d-table ml-auto">
                <i class="text-muted fa fa-eye mr-1"></i> 2
                <i class="text-muted fa fa-comment-dots mr-1 ml-3"></i> 2
              </small>
            </div>
            <div class="col-md-2  my-auto">
              <small class="complain-type pl-3 pr-3 pt-1 pb-1 ">LECTURE</small>
            </div>
          </div>

          <div class="row mt-1 justify-content-end">
            <div class="col-md-11 ">
              <h5 class="font-weight-bold mb-1  my-auto alert" style="background-color: #ecf3fc">{{ mb_strimwidth("This is the title how long can i get without distubin the procel of the human race is this", 0, 50, " ...")}}</h5>
            </div>
          </div>

          <div class="row mt-4 justify-content-end">
            <div class="col-md-11 ">
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit,
                sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi
                ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit
                in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint
                 occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim
                  id est laborum.</p>
            </div>
          </div>

        </div>
      </div>

      <div class="col-md-2 col-12 ">

      </div>

    </div>



  </div>


@endsection

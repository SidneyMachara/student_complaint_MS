@extends('layouts.lecturerlayout')

@section('content')
  <div class="row">
    <div class="col-md-3 col-12">

        @include('lecturer.partials.side-nav')
    </div>
    <div class="col-md-9  col-12">


      <div class="row mt-3">
        <div class="col-md-6 col-6 ">
          <div class="w-25 form-group filter2">
            <select class="form-control filter" id="filter" name="" required>
              <option value="all" selected>All</option>
              <option value="lecturer">Lecturer</option>
              <option value="grade">Grade</option>
            </select>
          </div>
        </div>

        <div class="col-md-6 col-6">
          <div class="w-50 ml-auto mr-4">
            <div class="input-group mb-3 ">
              <div class="input-group-prepend" >
                <span class="input-group-text border-0" id="basic-addon1" style="background-color:#eeeeee; border-radius:50px 0 0 50px;" ><i class="fa fa-search"></i></span>
              </div>
              <input style="background-color:#eeeeee; border-radius: 0 50px 50px 0;" type="text" class="form-control border-0 pt-3 pb-3" placeholder="Whatcha looking for?" aria-label="" aria-describedby="basic-addon1">
            </div>
          </div>
        </div>
      </div>

        <div class="mt-3">

          @if (count($complaints) > 0)
            @foreach ($complaints as $complaint)
              <div class="card-body p-4 rounded mini-complain-card {{'type_'.$complaint->complaint_type }}">
                <div class="row ">
                  <div class="col-md-1 ">
                    <img src="{{  asset('assets/l.jpg') }}" class="rounded-circle" alt="" width="60" height="60">
                  </div>
                  <div class="col-md-7 my-auto pl-4">
                    <h5 class="font-weight-bold mb-1  my-auto"><a href="{{ route('lecturer.showComplaints',$complaint->id) }}">{{ mb_strimwidth($complaint->title, 0, 55, " ...")}}</a></h5>
                    <p class="pt-0  my-auto">
                      <span class="mr-2 font-weight-bold" style="color:#3490dc;">{{ $complaint->student->user->name }}</span>
                      <small class="mr-2 text-muted">posted</small>
                      <samll class="mr-2 font-weight-bold">{{ \Carbon\Carbon::parse($complaint->created_at)->format('j F, Y')  }}</small>
                    </p>
                  </div>
                  <div class="col-md-2 my-auto">
                    <small class="d-table ml-auto">
                      <i class="text-muted fa fa-eye mr-1"></i> {{ count($complaint->complaint_histories) }}
                      <i class="text-muted fa fa-comment-dots mr-1 ml-3"></i> {{ count($complaint->complaint_replies) }}
                    </small>
                  </div>
                  <div class="col-md-2  my-auto">
                    @if ($complaint->complaint_type == config('const.complaint_type.lecturer'))
                      <small class="complain-type-l pl-4 pr-4 pt-2 pb-2 ">LECTURE</small>
                    @else
                      <small class="complain-type-g pl-4 pr-4 pt-2 pb-2 ">GRADE</small>
                    @endif


                  </div>
                </div>
              </div>
            @endforeach
          @else
            <div class="alert">
              <p> Zero complaints... Good Puppy :) </p>
            </div>
          @endif

        </div>


    </div>
  </div>
@endsection
@section('scripts')
  <script>
  $("#filter").change(function () {
    var opt = $('#filter').val();
    if(opt == 'lecturer') {
      //hide grade { type_2 }
      $('.type_2').hide(1);
      $('.type_1').show('slow');
    }else if(opt == 'grade') {
      //hide lecture { type_1 }
      $('.type_1').hide(1);
      $('.type_2').show('slow');
    }else if(opt == 'all') {
      $('.type_1').show(function(){
        $('.type_2').show(10);
      });

    }
  });
  </script>
@endsection

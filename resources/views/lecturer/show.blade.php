@extends('layouts.lecturerlayout')


@section('content')
  <div class="row">
    <div class="col-md-3 col-12">

        <ul class="list-group mt-5 side-nav-ul">
          <li class="list-group-item border-0"  >
            <a href="{{ route('lecturer.complaints') }}"><i class="fa fa-question mr-2"></i>All Complaints</a>
          </li>
          <li class="list-group-item border-0">
            <a href="#"><i class="fa fa-times mr-2"></i>Unsolved Complaints</a>
          </li>
          <li class="list-group-item border-0">
            <a href="#"><i class="fa fa-check-circle mr-2"></i>Solved Complaints</a>
          </li>
        </ul>
    </div>
    <div class="col-md-9  col-12">


      <div class="">

        <div class="row">

          <div class="col-md-10 col-12">
            <div class="card-body p-4 rounded mini-complain-card">
              <div class="row ">
                <div class="col-md-1 ">
                  <img src="{{  asset('assets/l.jpg') }}" class="rounded-circle" alt="" width="60" height="60">
                </div>
                <div class="col-md-6 my-auto pl-5">
                  <h5 class="font-weight-bold mb-1  my-auto">{{ mb_strimwidth($complaint->student->user->name, 0, 30, " ...")}}</h5>
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
                  @if ($complaint->complaint_type == config('const.complaint_type.lecturer'))
                    <small class="complain-type-l pl-3 pr-3 pt-1 pb-1 ">LECTURE</small>
                  @else
                    <small class="complain-type-g pl-3 pr-3 pt-1 pb-1 ">GRADE</small>
                  @endif

                </div>
              </div>

              <div class="row mt-1 justify-content-end">
                <div class="col-md-11 ">
                  <h5 class="font-weight-bold mb-1  my-auto alert" style="background-color: #ecf3fc">{{ $complaint->title }}</h5>
                </div>
              </div>

              <div class="row mt-4 justify-content-end">
                <div class="col-md-11 ">
                  <p>
                    {{ $complaint->body }}
                  </p>
                </div>
              </div>

              @foreach ($complaint->complaint_attachments->chunk(4) as $chunk)
                <div class="row justify-content-end mt-3 pb-3">
                  @foreach ($chunk as $attachment)
                    <div class="col-md-3 col-6">
                      <img src="{{ asset('/complaint_files/'.$attachment->attachment) }}" class="img-thumbnail"  alt="">
                    </div>
                  @endforeach
                </div>

              @endforeach


            </div>
          </div>

          <div class="col-md-2 col-12">

          </div>

        </div>



      </div>


    </div>
  </div>
@endsection

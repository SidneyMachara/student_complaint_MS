@extends('layouts.studentLayout')

@section('content')

  <div class="">

    <div class="row">

      <div class="col-md-10 col-12">
        {{-- complaint --}}
        <div class="card-body p-4 rounded mini-complain-card {{ $complaint->status == config('const.complaint_status.solved') ? 'solved-c' :''}}">
          <div class="row ">
            <div class="col-md-1 ">
              <img src="{{  asset('assets/avatar3.png') }}" class="rounded-circle" alt="" width="60" height="60">
            </div>
            <div class="col-md-6 my-auto pl-5">
              <h5 class="font-weight-bold mb-1  my-auto">{{ mb_strimwidth($complaint->student->user->name, 0, 30, " ...")}}</h5>
              <small class="pt-0  my-auto font-weight-bold">
              {{  \Carbon\Carbon::parse($complaint->created_at)->format('j F, Y') }}
              </small>
            </div>
            <div class="col-md-3 my-auto">
              <small class="d-table ml-auto">
                <i class="text-muted fa fa-eye mr-1"></i> {{ count($complaint->complaint_histories) }}
                <i class="text-muted fa fa-comment-dots mr-1 ml-3"></i> {{ count($complaint->complaint_replies) }}
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
            <div class="col-md-11 pl-5">
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

          @if(!$complaint->status == config('const.complaint_status.solved'))
            <button type="button" class="btn reply-btn" name="button">Reply</button>
          @endif

        </div>
        {{-- /. complaint --}}

        {{-- replies --}}
          @foreach ($complaint_replies as $complaint_reply)
            <div class="card-body p-4 rounded mini-complain-card">
              <div class="row ">
                <div class="col-md-1 ">
                  @if ($complaint_reply->user->user_type == config('const.user_type.student'))
                    <img src="{{  asset('assets/avatar3.png') }}" class="rounded-circle" alt="" width="60" height="60">
                  @else
                    <img src="{{  asset('assets/avatar04.png') }}" class="rounded-circle" alt="" width="60" height="60">
                  @endif
                </div>
                <div class="col-md-11 my-auto pl-5">
                  <h5 class="font-weight-bold mb-1  my-auto">{{ mb_strimwidth($complaint_reply->user->name, 0, 30, " ...")}}</h5>
                  <small class="pt-0  my-auto font-weight-bold">
                   {{  \Carbon\Carbon::parse($complaint_reply->created_at)->format('j F, Y') }}
                  </small>
                </div>


              </div>

              <div class="row mt-4 justify-content-end">
                <div class="col-md-11 pl-5">
                  <p>
                    {{ $complaint_reply->body }}
                  </p>
                </div>
              </div>

              {{-- @foreach ($complaint->complaint_attachments->chunk(4) as $chunk)
                <div class="row justify-content-end mt-3 pb-3">
                  @foreach ($chunk as $attachment)
                    <div class="col-md-3 col-6">
                      <img src="{{ asset('/complaint_files/'.$attachment->attachment) }}" class="img-thumbnail"  alt="">
                    </div>
                  @endforeach
                </div>

              @endforeach --}}

              @if(!$complaint->status == config('const.complaint_status.solved'))
                <button type="button" class="btn reply-btn" name="button">Reply</button>
              @endif
            </div>
          @endforeach
        {{--/. replies --}}
          {{ $complaint_replies->links() }}

          @if ( !$complaint->status == config('const.complaint_status.solved'))
            <div class="botton-reply-box mt-3 p-4">
                <p class="pt-3 pl-3 text-muted">Write a reply. </p>
            </div>
          @endif


      </div>

      <div class="col-md-2 col-12">

        @if ( !$complaint->status == config('const.complaint_status.solved'))

          <form class="" action="{{ route('student.solved') }} " method="post">
            @csrf
            <input type="hidden" name="complaint_id" value="{{ $complaint->id }}">
            <input type="submit" class="btn mx-auto d-table  pl-4 pr-4 unsolved-btn mb-3"  name="" value="SOLVED">
          </form>


          <form class="" action="{{ route('student.escalate') }} "method="post">
            @csrf
            <input type="hidden" name="complaint_id" value="{{ $complaint->id }}">
            <input type="hidden" name="complaint_type" value="{{ $complaint->complaint_type }}">
            <input type="submit" class="btn mx-auto d-table escalate  pl-4 pr-4"  name="" value="ESCALATE">
          </form>
        @else
          <input type="submit" class="btn mx-auto d-table  pl-4 pr-4 solved-btn mb-3" disabled  name="" value="SOLVED">
        @endif
        <div class="">
          @foreach ($history as $h)
            {{-- {{dd($h)}} --}}
            @if($h->complaint_handler_id == -1)
              <i class="fa fa-arrow-up text-muted mx-auto d-table mt-2 mb-2"></i>
              <p class="mx-auto d-table text-muted">{{ $h->lecturer->user->name}}</p>
            @else
              <i class="fa fa-arrow-up text-muted mx-auto d-table mt-2 mb-2"></i>
              {{-- <p>g</p> --}}
              <p class="mx-auto d-table text-muted">{{ $h->complaint_handler->position->title}}</p>
            @endif

          @endforeach
        </div>
      </div>



    </div>



  </div>


  <div class="row">
    <div class="col-md-6 card-body reply-form-container mx-auto" style="display:none; position:fixed;bottom:0;left:0;right:0">
      <form class="" action="{{ route('student.reply') }}"  method="POST">
        @csrf
        <input type="hidden" name="complaint_id" value="{{ $complaint->id }}">
        <div class="col-12 col-md-12 ">
          <div class="form-group">
           <label for="complain-reply"><i class="fas fa-reply pr-2 text-muted"></i> Reply</label>
           <textarea name="body" required  class="form-control mt-2" id="complain-reply" rows="5" cols="60" placeholder="You will listen to what i have to say..."></textarea>
         </div>
        </div>

        {{-- <div class="row">
          <div class="col-md-4">
            <div class="form-group">
             <input type="file" class="form-control" name="file" id="file" >
           </div>
          </div>
        </div> --}}

      <div class="row justify-content-end">
        <div class="col-md-2 col-6 ">
            <button type="button" class="btn d-inline close-reply" name="button">close</button>
        </div>
        <div class="col-md-2 col-6">
          <input type="submit" name=""  class="btn new-complaint-btn ml-auto d-table pl-3 pr-3" value="Submit">
        </div>
      </div>

      </form>
    </div>
  </div>
@endsection


@section('scripts')
  <script>
    $('.reply-btn , .close-reply, .botton-reply-box').click(function(){
      $( ".reply-form-container" ).slideToggle("slow");
    });



    // $('document').ready(function(){
    //   // form
    //   $( ".control-form" ).click(function() {
    //     if(document.getElementById("m-form-overlay").style.height == "0px"){
    //       document.getElementById("m-form-overlay").style.height = "100%";
    //     }else{
    //       document.getElementById("m-form-overlay").style.height = "0";
    //     }
    //     $( "#m-form" ).slideToggle("slow");
    //   });
    //     // /.form
    // });
  </script>
@endsection

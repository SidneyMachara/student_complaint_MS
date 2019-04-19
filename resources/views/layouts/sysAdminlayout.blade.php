<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>


    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/student.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="header-bg ">
          <div class="row p-5">
            <div class="col-md-10 ">
              {{-- <h5 class="text-light w-25 ">UB</h5> --}}



              {{-- <span class="d-table float-right "> --}}
                <form class="" action="{{ route('logout') }}" method="post">
                  @csrf
                  <input type="submit" class="logout-btn" name="" value="LOGOUT">
                </form>
              {{-- </span> --}}
            </div>
            <div class="col-md-2">

            </div>
          </div>
          <div class="row justify-content-center ">
              <div class="col-md-2 col-12  pb-4 text-center" style="{{ isActiveRoute(['sys_admin.index']) }}">
                <a href="{{ route('sys_admin.index')}}" class="h5 text-light ">STATISTICS</a>
              </div>
              <div class="col-md-2 col-12 pb-4 text-center" style="{{ isActiveRoute(['sys_admin.students']) }}">
                <a href="{{ route('sys_admin.students')}}" class="h5 text-light">STUDENTS</a>
              </div>
              <div class="col-md-2 col-12 pb-4 text-center" style="{{ isActiveRoute(['sys_admin.lecturers']) }}">
                <a href="{{ route('sys_admin.lecturers')}}" class="h5 text-light">LECTURERS</a>
              </div>
              <div class="col-md-2 col-12 pb-4 text-center" style="{{ isActiveRoute(['sys_admin.config']) }}">
                <a href="{{ route('sys_admin.config')}}" class="h5 text-light"><i class="fa fa-cogs" aria-hidden="true"></i></a>
              </div>

          </div>

        </nav>

        <main class="py-4">
            <div class="container">
              @yield('content')
            </div>
        </main>
        {{-- notification --}}
        <div class="alert-card card-body  w-25" style="display:none; ">
            <p class="p-0 m-0"></p>
        </div>

          {{--/. notification --}}
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" ></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-switch/3.3.4/js/bootstrap-switch.js" data-turbolinks-track="true"></script>
    <script src="{{ asset('js/bootstrap-notify.js') }}" ></script>

    <script>
    $(function(){

      function sexy_alert( status , msg)
      {
        if( status == 'success') {
          $('.alert-card ').addClass('success-noti');
        } else if(status == 'error') {
          $('.alert-card ').addClass('error-noti');
        }

        $('.alert-card > p').html(msg);
        $('.alert-card ').slideToggle();

        //remove alert
         setTimeout(function () {
           $('.alert-card ').slideToggle();
         }, 2000);

      }

      @if(Session::has('success'))
        sexy_alert( 'success' , '{{ session()->pull('success') }}')
      @elseif (Session::has('error'))
        sexy_alert( 'error' , '{{ session()->pull('error') }}')
      @endif
    });

        </script>
        @yield('scripts')
</body>
</html>

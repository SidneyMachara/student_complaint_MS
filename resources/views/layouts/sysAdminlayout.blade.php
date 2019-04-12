<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

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
              <h5 class="text-light">UB</h5>
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
    </div>
</body>
</html>

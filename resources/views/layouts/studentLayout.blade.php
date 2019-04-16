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
              <h5 class="text-light">UB</h5>
            </div>
            <div class="col-md-2">

            </div>
          </div>
          <div class="row justify-content-center ">
              <div class="col-md-1 col-6 pb-4 text-center" style="{{ isActiveRoute(['']) }}">
                <a href="" class="h5 text-light">PROFILE</a>
              </div>
              <div class="col-md-1 col-6  pb-4 text-center" style="{{ isActiveRoute(['note']) }}">
                <a href="{{ route('note')}}" class="h5 text-light ">NOTE</a>
              </div>
          </div>

        </nav>

        <main class="py-4">
          <div class="container mt-3">

            <div class="row">
              <div class="col-md-3 col-12">
                  <a href="#" class="btn new-complaint-btn pl-4 pt-2 pb-2 pr-4" data-toggle="modal" data-target="#add_complin_modal"> NEW COMPLAINT</a>

                  <ul class="list-group mt-5 side-nav-ul">
                    <li class="list-group-item border-0"  >
                      <a href="{{ route('student.allComplaints') }}"  class="{{ isActiveRouteA(['student.allComplaints']) }}"><i class="fa fa-question mr-2 "></i>All Complaints</a>
                    </li>
                    <li class="list-group-item border-0">
                      <a href="{{ route('student.unsolvedComplaints') }}" class="{{ isActiveRouteA(['student.unsolvedComplaints']) }}"><i class="fa fa-times mr-2" ></i>Unsolved Complaints</a>
                    </li>
                    <li class="list-group-item border-0">
                      <a  href="{{ route('student.solvedComplaints') }}"  class="{{ isActiveRouteA(['student.solvedComplaints']) }}"><i class="fa fa-check-circle mr-2" class=""></i>Solved Complaints</a>
                    </li>
                  </ul>
              </div>
              <div class="col-md-9  col-12">
                @yield('content')
              </div>
            </div>

          </div>


        </main>
    </div>
    @include('student.complaints.create')

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" ></script>



    @yield('scripts')
</body>
</html>

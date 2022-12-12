<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>

    <link rel="stylesheet" type="text/css"
        href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700" />

    <!-- Nucleo Icons -->
    <link href="../assets/css/nucleo-icons.css" rel="stylesheet" />
    <link href="../assets/css/nucleo-svg.css" rel="stylesheet" />
    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <!-- Material Icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet" />


    <!-- styles -->
    <!-- CSS Files -->
    <!-- <link id="pagestyle" href="../assets/css/material-dashboard.css?v=3.0.4" rel="stylesheet" /> -->


    <link rel="stylesheet" href="{{ asset('frontend/css/bootstrap5.css')}}">
    <link rel="stylesheet" href="{{ asset('frontend/css/custom.css')}}">


    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>

<body>






    @include('layouts.inc.frontnavbar')

    <div class="container-fluid">
        @yield('content')

    </div>
    </main>



    <script src="{{ asset('frontend/js/bootstrap.bundle.min.js')}}" defer></script>

    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    @if(session('status'))
    <script>
    swal("{{ session('status')}}");
    </script>
    @endif
    @yield('scripts')

</body>

</html>
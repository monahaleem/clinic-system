<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @auth
    <meta name="userId" content="{{ auth()->user()->id }}">
    @endauth
    <!-- Application Title -->
    <title>
        {{ config('app.name', 'Laravel') }} |
        @yield('title')
    </title>
    <!-- Fonts -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
    <!-- Styles -->
    @yield('css')
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
    
</head>
<body>
    <div class="wrapper" id="app">
        @include('layouts.sidebar')

        <div id="content">
            @include('layouts.navbar')
            @yield('content')
            <div id="sound" style="display: none"></div>
        </div>
    </div>
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.concat.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.3.1/js/all.js"></script>
    @yield('js')
    <script>
    		$(document).ready(function () {
    		   $("#sidebar").mCustomScrollbar({
    		      theme: "minimal"
    		   });

    		   $('#sidebarCollapse').on('click', function () {
    		      $('#sidebar, #content').toggleClass('active');
    		      $('.collapse.in').toggleClass('in');
    		      $('a[aria-expanded=true]').attr('aria-expanded', 'false');
    		   });
    		});
    </script>
</body>
</html>

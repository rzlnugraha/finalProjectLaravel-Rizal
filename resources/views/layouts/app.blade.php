<!DOCTYPE html>
<html lang="en">
  <head>
    <title>@yield('title','Lolokeran')</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta>
    
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('users') }}/css/open-iconic-bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('users') }}/css/animate.css">
    
    <link rel="stylesheet" href="{{ asset('users') }}/css/owl.carousel.min.css">
    <link rel="stylesheet" href="{{ asset('users') }}/css/owl.theme.default.min.css">
    <link rel="stylesheet" href="{{ asset('users') }}/css/magnific-popup.css">

    <link rel="stylesheet" href="{{ asset('users') }}/css/aos.css">

    <link rel="stylesheet" href="{{ asset('users') }}/css/ionicons.min.css">

    <link rel="stylesheet" href="{{ asset('users') }}/css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="{{ asset('users') }}/css/jquery.timepicker.css">

    
    <link rel="stylesheet" href="{{ asset('users') }}/css/flaticon.css">
    <link rel="stylesheet" href="{{ asset('users') }}/css/icomoon.css">
    <link rel="stylesheet" href="{{ asset('users') }}/css/style.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('sweetalert.css') }}">
    @stack('style')
  </head>
  <body>
    
	  <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
	    <div class="container">
	      <a class="navbar-brand" href="index.html">Lolokeran</a>
	      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
	        <span class="oi oi-menu"></span> Menu
	      </button>

	      <div class="collapse navbar-collapse" id="ftco-nav">
	        <ul class="navbar-nav ml-auto">
            @include('layouts.navbar')
	        </ul>
	      </div>
	    </div>
	  </nav>
    <!-- END nav -->
    
    @include('layouts.header')

    {{-- Section Yield --}}
    @yield('content')


    @include('layouts.footer')
    
  

  <!-- loader -->
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>

  <script src="{{ asset('users') }}/js/jquery.min.js"></script>
  <script src="{{ asset('users') }}/js/jquery-migrate-3.0.1.min.js"></script>
  <script src="{{ asset('users') }}/js/popper.min.js"></script>
  <script src="{{ asset('users') }}/js/bootstrap.min.js"></script>
  <script src="{{ asset('users') }}/js/jquery.easing.1.3.js"></script>
  <script src="{{ asset('users') }}/js/jquery.waypoints.min.js"></script>
  <script src="{{ asset('users') }}/js/jquery.stellar.min.js"></script>
  <script src="{{ asset('users') }}/js/owl.carousel.min.js"></script>
  <script src="{{ asset('users') }}/js/jquery.magnific-popup.min.js"></script>
  <script src="{{ asset('users') }}/js/aos.js"></script>
  <script src="{{ asset('users') }}/js/jquery.animateNumber.min.js"></script>
  <script src="{{ asset('users') }}/js/bootstrap-datepicker.js"></script>
  <script src="{{ asset('users') }}/js/jquery.timepicker.min.js"></script>
  <script src="{{ asset('users') }}/js/scrollax.min.js"></script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
  <script src="{{ asset('users') }}/js/google-map.js"></script>
  <script src="{{ asset('users') }}/js/main.js"></script>
  <script src="{{ asset('sweetalert.min.js') }}"></script>
  @include('sweet::alert')
  @stack('script')
    
  </body>
</html>
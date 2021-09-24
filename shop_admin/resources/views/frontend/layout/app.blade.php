<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="">
  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>@yield('title')</title>
  <link href="{{ asset('css/frontend/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ asset('css/frontend/font-awesome.min.css') }}" rel="stylesheet">
  <link href="{{ asset('css/frontend/prettyPhoto.css') }}" rel="stylesheet">
  <link href="{{ asset('css/frontend/price-range.css') }}" rel="stylesheet">
  <link href="{{ asset('css/frontend/animate.css') }}" rel="stylesheet">
  <link href="{{ asset('css/frontend/main.css') }}" rel="stylesheet">
  <link href="{{ asset('css/frontend/responsive.css') }}" rel="stylesheet">
  <link type="text/css" rel="stylesheet" href="{{ asset('css/rate.css') }}">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
  
  <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->
  <link rel="shortcut icon" href="images/ico/favicon.ico">
  <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
  <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
  <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
  <link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">
  <script src="{{ asset('js/frontend/jquery.js') }}"></script>
</head>
<!--/head-->

<body>
  @include('frontend.layout.header')

  @yield('slide');

  <section>
    <div class="container">
      <div class="row">

        @yield('menu-left')

        @yield('content')
        
      </div>
    </div>
  </section>

  @include('frontend.layout.footer')
  <!--/Footer-->



  <script src="{{ asset('js/frontend/jquery.js') }}"></script>
  <script src="{{ asset('js/frontend/jquery.scrollUp.min.js') }}"></script>
  <script src="{{ asset('js/frontend/price-range.js') }}"></script>
  <script src="{{ asset('js/frontend/bootstrap.min.js') }}"></script>
  <script src="{{ asset('js/frontend/jquery.prettyPhoto.js') }}"></script>
  <script src="{{ asset('js/frontend/main.js') }}"></script>
  <script src="{{ asset('js/frontend/comment.js') }}"></script>
  <script type="text/javascript">
    	$(document).ready(function(){
		    $("a[rel^='prettyPhoto']").prettyPhoto();
		});
    </script>
</body>

</html>

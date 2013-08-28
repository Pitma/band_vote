<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>.::AMALIVE.de::. {{ $title }}</title>
	<meta name="viewport" content="width=device-width, initial-scale=0.4, maximum-scale=0.5">
    <meta name="description" content="">
    <meta name="author" content="">
	
	<link href='http://fonts.googleapis.com/css?family=Oleo+Script+Swash+Caps' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Roboto:900,400' rel='stylesheet' type='text/css'>
   	<link href="//netdna.bootstrapcdn.com/font-awesome/3.0.2/css/font-awesome.css" rel="stylesheet">
   	{{ stylesheet() }}
    
    

    @yield('styles')
    <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="{{ URL::asset('js/html5shiv.js') }}"></script>
    <![endif]-->
    <script src="{{ URL::asset('js/modernizr.custom.70211.js') }}"></script>
     
</head>
<body>
	<div id="wrap">
		
		<div class="navbar navbar-inverse navbar-fixed-top ">
			<div class="navbar-inner">
				<div class="container">
					@section('nav')
					@include('layouts.nav')
					@show
				</div>
			</div>
		</div>

		<div id="main" class="container">
		
	 	
			  <div class="row-fluid">
				    <div class="span3">
					     @section('Sidebar')
							@include('layouts.countdown')
			 			 @show
				    </div>
				    <div class="span8 offset1">
				    	{{ Notification::showAll() }}
				      	@yield('content')
				    </div>
			  </div>
		</div>
	@section('Footer')
		@include('layouts.footer')
	@show
</body>
  
</html>

<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>.::AMALIVE.de::. {{ $title }}</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
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

					<ul class="nav">
						<a class="brand" href="{{ URL::to('/')}}"><img src="{{asset('img/logo.png') }}" alt="amalive.de"></a>
							<!--<li><a href={{ URL::to('/')}}>HOME</a></li>-->
							<li><a href={{ URL::route('check')}}>BANDCHECK</a></li>
							<li><a href={{ URL::route('details')}}>VOTEDETAILS</a></li>
							<li><a href={{ URL::Route('logout')}}>LOGOUT</a></li>
							
							
							
							
					</ul>
				</div>
			</div>
		</div>

		<div id="main" class="container">
		
	 	
			  <div class="row-fluid">
				    <div class="span12">
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

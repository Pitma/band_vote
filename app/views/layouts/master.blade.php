<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>.::AMALIVE.de::. @yield('title')</title>
	<meta name="viewport" content="width=device-width, initial-scale=0.3, maximum-scale=0.4">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="robots" content="NOINDEX, NOFOLLOW">
	
	<link href='http://fonts.googleapis.com/css?family=Oleo+Script+Swash+Caps' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Roboto:900,400' rel='stylesheet' type='text/css'>
   	<link href="//netdna.bootstrapcdn.com/font-awesome/3.0.2/css/font-awesome.css" rel="stylesheet">

   	
   	{{ stylesheet() }}
     <!--[if lt IE 9]>
      <link href="{{ URL::asset('css/ie.css') }}" rel="stylesheet">
    <![endif]-->
    

    @yield('styles')
   

    <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="{{ URL::asset('js/html5shiv.js') }}"></script>
       <!--<script src="{{ URL::asset('js/respond.js') }}"></script>-->
    <![endif]-->
    <script src="{{ URL::asset('js/modernizr.custom.70211.js') }}"></script>
   
     
</head>
<body>
	<!-- Facebook Like-->
	<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/de_DE/all.js#xfbml=1";
  fjs.parentNode.insertBefore(js, fjs);
	}(document, 'script', 'facebook-jssdk'));
</script>

	<div id="wrap">
		
		<div class="navbar navbar-inverse navbar-fixed-top ">
			<div class="navbar-inner">
				<div class="container">
					<ul class="nav">
						<a class="brand" href="{{ URL::to('/')}}"><img src="{{asset('img/logo.png') }}" alt="amalive.de"></a>
							<!--<li><a href={{ URL::to('/')}}>HOME</a></li>-->
							<li><a href={{ URL::to('/users')}}>VOTING</a></li>
							<li><a href={{ URL::to('/tickets/order')}}>TICKETS</a></li>
							
							@if(Auth::Check())
									@if(Auth::user()->admin == 1)
										<li><a href={{ URL::to('admin/check')}}>DASHBOARD</a></li>
									@else
										<li><a href={{ URL::to('users/'.Auth::User()->id.'/edit')}}>MY PROFILE</a></li>
									@endif
								<li><a href={{ URL::Route('logout')}}>LOGOUT</a></li>
							@else
								<li><a href="#" class="muted">GALLERY</a></li>
								<li><a href={{ URL::to('login')}}>LOGIN</a></li>
							@endif
					</ul>
				</div>
			</div>
		</div>

		<div id="main" class="container">
		
	 	
			  <div class="row-fluid">
				    <div class="span3">
					     @section('sidebar')
							@include('layouts.top10')
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

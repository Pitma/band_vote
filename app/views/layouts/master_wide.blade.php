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
							<li><a href={{ URL::to('/users')}}>VOTING</a></li>
							<li><a href={{ URL::to('/tickets/order')}}>TICKETS</a></li>
							<li><a href={{ URL::to('gallerie')}}>GALLERY</a></li>
							<li><a href={{ URL::to('users/create')}}>LOGIN</a></li>
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
	  <div id="push"></div>
    </div>
	<!-- <div id="contact"><a href="#">say<br>hello!</a></div> -->
    <div id="footer" class="navbar-fixed-bottom">

      <div class="container text-center">
      		<img src="http://placehold.it/200x60">
      		<img src="http://placehold.it/180x60">
      	 	<img src="http://placehold.it/150x60">
      	 	<img src="http://placehold.it/200x60">
	      <ul class="inline text-center">
	      	<li><a href="#">Kontakt</a></li> |
	      	<li><a href="#">Spielregeln</a></li> |
	      	<li><a href="#">Facebook</a></li> |
	      	<li><a href={{ URL::to('guestbooks')}}>Gästebuch</a></li> |
	      	<li><a href="#">Impressum</a></li>
	      </ul>
      
      </div>
    </div>
 	 <script src="//code.jquery.com/jquery-1.9.1.min.js"></script>
     <script src="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.1/js/bootstrap.min.js"></script>
     @yield('scripts')
     
     <script type="text/javascript"> 
		var $buoop = {vs:{i:9,f:15,o:,s:4,n:9}} 
		$buoop.ol = window.onload; 
		window.onload=function(){ 
		 try {if ($buoop.ol) $buoop.ol();}catch (e) {} 
		 var e = document.createElement("script"); 
		 e.setAttribute("type", "text/javascript"); 
		 e.setAttribute("src", "http://browser-update.org/update.js"); 
		 document.body.appendChild(e); 
		} 
	</script> 
</body>
  
</html>

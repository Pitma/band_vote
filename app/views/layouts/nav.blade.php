<ul class="nav">
						<a class="brand" href="{{ URL::to('/')}}"><img src="{{asset('img/logo.png') }}" alt="amalive.de"></a>
							<!--<li><a href={{ URL::to('/')}}>HOME</a></li>-->
							<li><a href={{ URL::to('/users')}}>VOTING</a></li>
							<li><a href={{ URL::to('/tickets/order')}}>TICKETS</a></li>
							<li><a href="#" class="muted">GALLERY</a></li>
							@if(Auth::Check())
							<li><a href={{ URL::Route('logout')}}>LOGOUT</a></li>
							@else
							<li><a href={{ URL::to('login')}}>LOGIN</a></li>
							@endif
</ul>
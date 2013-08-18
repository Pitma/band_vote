
  <div id="push"></div>
    </div>
	<!-- <div id="contact"><a href="#">say<br>hello!</a></div> -->
    <!--<div id="footer" class="navbar-fixed-bottom">-->
    <div id="footer">

      <div class="container text-center">
      		<!-- <img src="http://placehold.it/200x60">
      		<img src="http://placehold.it/180x60">
      	 	<img src="http://placehold.it/150x60">
      	 	<img src="http://placehold.it/200x60"> -->
	      <ul class="inline text-center">
	      	<li><a href="{{URL::to('kontakt')}}">Kontakt</a></li> |
	      	<li><a href="{{URL::to('spielregeln')}}">Spielregeln</a></li> |
	      	<li><a href="#">Facebook</a></li> |
	      	<li><a href={{ URL::to('guestbooks')}}>Gästebuch</a></li> |
	      	<li><a href="{{URL::to('impressum')}}">Impressum</a></li>
	      </ul>
      
      </div>
    </div>
 	 <script src="//code.jquery.com/jquery-1.9.1.min.js"></script>
 	 <script src={{URL::asset('js/jquery.js')}}></script>
     <!--<script src="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.1/js/bootstrap.min.js"></script>-->
     <script src={{URL::asset('js/bootstrap.js')}}></script>
     @yield('scripts')


     <script type="text/javascript"> 
		var $buoop = {} 
		$buoop.ol = window.onload; 
		window.onload=function(){ 
		 try {if($buoop.ol) $buoop.ol();}catch (e) {} 
		 var e = document.createElement("script"); 
		 e.setAttribute("type", "text/javascript"); 
		 e.setAttribute("src", "http://browser-update.org/update.js"); 
		 document.body.appendChild(e); 
		}

		$(document).on("click",".open-validateVote", function(){
		var bandID = $(this).data('id');
		var bandNAME = $(this).data('name');
		$(".modal-header h3").html(bandNAME);		
		$(".modal-footer #bandID").val(bandID);
		});
	</script> 
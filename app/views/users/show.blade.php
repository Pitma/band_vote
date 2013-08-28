@section('content')
<a href="{{ URL::to('users/sort/best')}}"><i class="icon-arrow-left"></i> Zurück zur Übersicht</a>

    
<div class="block">
@if ($band->picture != '')
    <img height="300px"class="img-polaroid" src="{{ URL::asset($band->picture) }}" alt="Logo der Band {{$band->name}}">
@else
    <img height="300px"class="img-polaroid" src="http://lorempixel.com/800/400/abstract/Kein-Bild-Vorhanden/" alt="Logo der Band {{$band->name}}">  
@endif
</div>
<div class="fb-like pull-right" id="fb" data-href="{{Request::url()}}" data-width="100" data-layout="button_count" data-show-faces="false" data-send="false"></div>
 <h3 class="">{{$band->name}}</h3>
 <span class="profile"><strong>{{ $band->genre }}</strong> aus {{ $band->origin }}</span>
<div class="user_info">
 
 <p>{{ $band->description }}</p>

 <p>Besuche unsere eigene <a href="http:\\band-vote.dev">Webseite</a></p>
 <p>Besuche unsere Facebookseite</p>
 
 </div>
 <a href="#validateVote" role="button" class="open-validateVote btn btn-primary" data-toggle="modal" data-id="{{$band->id}}" data-name="{{$band->name}}">vote!</a>
 <br>  

	@if($band->music != '')
	<!-- Display the audio player with control buttons. -->
    <div id="music" data-src="{{URL::asset($band->music)}}">
    <audio></audio>
	</div>
    @endif
  
   
	@if($band->youtube != '')
    <iframe width="640" height="360" src="http://www.youtube.com/embed/{{ $band->youtube }}?feature=player_detailpage" frameborder="0" allowfullscreen>
    </iframe>
    @endif

	 <div id="validateVote" class="modal hide fade">
	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">x</button>
			<h3 id="myModalLabel">{{$band->name}}</h3>
	</div>
    <div class="modal-body">
		<h3>Dein Vote!</h3>
		@if($voteIsAllowed)
		<p>Fülle einfach den Captcha aus und dein Vote wird gezählt!</p>
		{{ Form::open(array('route' => 'votes.store')) }}
		{{-- Form::captcha(array('theme' => 'clean')) --}}
		{{ HTML::image(Captcha::img(), 'Captcha image') }} 
		{{ Form::text('captcha') }}
		@else
		<p>Leider hat das Voting hat noch nicht begonnen! </p>
		@endif
	</div>
	<div class="modal-footer">
			
            {{ Form::hidden('user_id','',array('id'=>'bandID')) }}
            {{ Form::token() }}
            @if($voteIsAllowed)
             {{ Form::submit('Jetzt voten!',array('class'=>"btn btn-primary")) }}
            @endif
            <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
            
           
			{{ Form::close() }}
		<!-- <submit class="btn btn-primary">Jetzt voten!</button> -->
	</div>
</div>

@show

@section('scripts')
<script src="{{URL::asset('js/audiojs/audio.min.js')}}"></script>

<script>
 

    $(function() {
        var a = audiojs.createAll();
        var audio = a[0];
        first = $('div#music').attr('data-src');
        audio.load(first);
    });
</script>

@show
@extends('layouts.master')
@section('content')
<?php $count1 = 1;?>
<p><b> IHR gestaltet das Konzert. <br>
Jeder hat pro Tag 2 Stimmen zu vergeben. <br>
Die vier Bands mit den meisten Votes kommen ohne Umwege auf die große Bühne, <br>
und treten in die Fußstapfen von...</b></p>
{{ $bands->addQuery('order',$order)->links() }}


<a class="pull-right" href="{{URL::to('users/sort', array('order' => 'desc'))}}">
	<i class="icon-chevron-down"></i>
</a>
<a class="pull-right" href="{{URL::to('users/sort', array('order' => 'asc'))}}">
	<i class="icon-chevron-up"></i>
</a>
<a class="pull-right" href="{{URL::to('users/sort', array('order' => 'best'))}}">
	<i class="icon-star"></i>
</a>
<br>

@foreach($bands as $band)
<?php 	
$bandcount = Vote::where('user_id',$band->id)->count();
$prozent = ( $bandcount / $voteCount )*100;
?>
<div class="Vote_Item">
	<div class="position">{{ sprintf( "%02d",$count1) }}</div>
	<p><a href="{{ URL::to('users/'.$band->id)}}">{{ $band->name }}</a></p>
	<span><b>{{ $band->genre . '</b> aus ' . $band->origin }}</span>
	<div class="pull-right">
		<span class="">{{round($prozent,2)}} %</span>
		<a href="#validateVote" role="button" class="open-validateVote" data-toggle="modal" data-id="{{$band->id}}" data-name="{{$band->name}}">vote!</a>
</div>
	</div>
	
	
<?php $count1++; ?>
@endforeach
{{ $bands->addQuery('order',$order)->links() }}

<div id="validateVote" class="modal hide fade">
	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">x</button>
			<h3 id="myModalLabel">Upps keine Band ausgewählt</h3>
	</div>
	<div class="modal-body">
		<h3>Dein Vote!</h3>
		@if($voteIsAllowed)
		<p>Fülle einfach den Captcha aus und dein Vote wird gezählt!</p>
		{{ Form::open(array('route' => 'votes.store')) }}
		{{ Form::captcha(array('theme' => 'clean'))}}
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
@stop


@section('sidebar')

	@include('layouts.timer')

@show

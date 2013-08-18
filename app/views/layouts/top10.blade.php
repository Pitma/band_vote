<?php
	$top10 = DB::table('votes')
			->join('users', 'votes.user_id','=','users.id')
			->select(DB::raw('count(votes.user_id) as vote_count,users.id as id, users.name as name, users.genre as genre ,users.origin as origin,users.admin'))
			->where('users.admin','=','0')
			->groupBy('users.name','users.genre','users.origin','users.admin')
			->orderBy('vote_count','desc')
			->get(10);
	$count = 1;


?>
{{--dd($top10)--}}
@foreach($top10 as $top)
<div class="Vote_Item">
	<div class="position"><a href="{{URL::to('users/'.$top->id)}}">{{ sprintf( "%02d",$count) }}</a></div>
@if(strlen($top->name) > 29)
	<p class="small"><a href="{{ URL::to('users/'.$top->id)}}">{{ substr($top->name,0,28) }}...</a></p>
@elseif(strlen($top->name) > 22)
	<p class="small"><a href="{{ URL::to('users/'.$top->id)}}">{{ $top->name }}</a></p>
@else
	<p><a href="{{ URL::to('users/'.$top->id)}}">{{ $top->name }}</a></p>
@endif

	<span><b>{{ $top->genre }}</b> aus {{ $top->origin }}</span>
</div>
<?php $count++; ?>
@endforeach


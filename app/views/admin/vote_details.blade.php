@section('content')
<h2>Votingdetails</h2>
<ul>
	<?php $countVotes = Vote::get()->count();?>
@foreach($bands as $band)
<?php 	
$bandcount = Vote::where('user_id',$band->id)->count();
$prozent = ( $bandcount / $countVotes )*100;
?>
<li>{{$band->name}} | {{$bandcount}} votes | {{round($prozent,3)}} % </li>
@endforeach
</ul>

@stop
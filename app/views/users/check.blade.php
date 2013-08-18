@section('content')

<table class="table table-striped">
	<th>aktivieren</th>
	<th>Name</th>
	<th>beschreibung</th>
	<th>Genre</th>
	<th>Herkunft</th>
	<th>Bild</th>
	<th>Youtube</th>
	<th>music</th>
	<th>Vorname</th>
	<th>Nachname</th>
	<th>Wohnort</th>
	<th>Telefon</th>
	<th>email</th>
	<th>Registriert am</th>

@foreach($bands as $band)
<tr>
	<td>
		{{ Form::open(array('route'=>'activate')) }}
		{{ Form::hidden('band_id',$band->id) }}
		{{ Form::submit('ok') }}
		{{ Form::token() }}
		{{ Form::close() }}
	</td>
	<td>{{ $band->name }}</td>
	<td>{{ $band->description }}</td>
	<td>{{ $band->genre }}</td>
	<td>{{ $band->origin }}</td>
	<td>
		@if($band->picture)
		<img width="50px"src="{{ URL::asset($band->picture) }}" alt="logo">
		@endif
	</td>
	<td>
		@if($band->youtube)
		<a href="http://www.youtube.com/watch?v={{ $band->youtube }}" target="_blank">link</a>
		@endif
	</td>
	<td>
		<audio class="clearfix" src="{{ URL::asset($band->music) }}" controls loop> 
        HTML5 audio nicht unterstüzt supported
   		</audio>
	</td>
	<td>{{ $band->firstname }}</td>
	<td>{{ $band->lastname }}</td>
	<td>{{ $band->address }},{{ $band->city }}</td>
	<td>{{ $band->telefon }}</td>
	<td><a mailto="{{ $band->email }}">{{ $band->email }}</a></td>
	<td>{{ $band->created_at }}</td>
</tr>

@endforeach

</table>
@stop


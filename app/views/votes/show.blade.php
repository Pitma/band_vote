@section('content')
<h1>Hi User!</h1>
Deine IP ist: {{ $ip }} <br>
Du hast heute schon {{ $count }} mal gevotet<br>
{{ $minutes }} Minuten bis Morgen<br>

<?php
echo 'Nächster Cookie gültig bis '. date('Y-m-d H:i:s',strtotime(date('Y-m-d 00:00:00', time()+86400))-1). '<br>';
echo 'Aktuelle Zeit: ' .date('Y-m-d H:i:s',$now). '<br>';
?>
<h1>Cookies</h1>
@if ($cookie > 0)
Du besitzt bereits einen Cookie! <br>
Er verrät mir, dass du schon {{ $cookie }} mal gevotet hast! :-D <br>
@else
Du hast noch keinen Cookie Gespeichert!! <br>
@endif

<button><a href="/votes/create">Voten</a></button>

@endsection
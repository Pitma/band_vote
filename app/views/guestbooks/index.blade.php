<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Gästebuch Prototyp</title>
</head>
<body>
    {{ Notification::showAll() }}
    
	@foreach($guestbooks as $entry)
		<ul>
			<p>{{ $entry->message }}</p>
            <p>Geschrieben am {{ $entry->created_at->format('d.m.Y') }}  von
         <a href="mailto:{{ $entry->email }}">{{ $entry->name}}</a>
      </p>

        {{ Form::open(array('route' => array('guestbooks.destroy',$entry->id),'method' => 'delete')) }}
        {{ Form::submit('löschen') }}
        {{ Form::close() }}
        <hr />
		</ul>

	@endforeach
	   {{ Form::open(array('route' => 'guestbooks.store')) }}
    <ul>
        <li>
            {{ Form::label('name', 'Name:') }}
            {{ Form::text('name', Input::old('name')) }}
            {{ $errors->first('name') }}
        </li>

        <li>
            {{ Form::label('email', 'Email:') }}
            {{ Form::text('email', Input::old('email')) }}
            {{ $errors->first('email') }}
        </li>

        <li>
            {{ Form::label('message', 'Nachricht:') }}
            {{ Form::textarea('message', Input::old('message')) }}
            {{ $errors->first('message') }}
        </li>
            {{ Form::token()}}
        <li>
            {{ Form::submit() }}
        </li>
    </ul>
{{ Form::close() }}

</body>
</html>
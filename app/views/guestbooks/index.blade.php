 
	@section('content')
    @foreach($guestbooks as $entry)
		<ul>
    			<p>{{ $entry->message }}</p>

                <p>
                    Geschrieben am {{ $entry->created_at->format('d.m.Y') }}  von
                    <a href="mailto:{{ $entry->email }}">{{ $entry->name}}</a>
                </p>

                {{ Form::open(array('route' => array('guestbooks.destroy',$entry->id),'method' => 'delete')) }}
                    <button class="btn btn-link">löschen</button>
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
            <button class="btn btn-primary">senden</button>
            
        </li>
    </ul>
{{ Form::close() }}
@endsection


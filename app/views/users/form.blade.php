
{{ Form::open(array('route' => 'users.store')) }}
    <ul>
        <li>
            {{ Form::label('name', 'Name:') }}
            {{ Form::text('name') }}
        </li>

        <li>
            {{ Form::label('email', 'Email:') }}
            {{ Form::text('email') }}
        </li>

        <li>
            {{ Form::label('description', 'Beschreibung:') }}
            {{ Form::textarea('description') }}
        </li>

        <li>
            {{ Form::label('genre', 'Musikrichtung:') }}
            {{ Form::text('genre') }}
        </li>

        <li>
            {{ Form::label('origin', 'Herkunftsort:') }}
            {{ Form::text('origin') }}
        </li>

        <li>
            {{ Form::label('picture', 'Bild/Logo:') }}
            {{ Form::text('picture') }}
        </li>

        <li>
            {{ Form::label('youtube', 'Youtube:') }}
            {{ Form::text('youtube') }}
        </li>

        <li>
            {{ Form::file('music', 'Music (mp3):') }}
            {{ Form::text('music') }}
        </li>

        <li>
            {{ Form::label('firstname', 'Vorname:') }}
            {{ Form::text('firstname') }}
        </li>

        <li>
            {{ Form::label('lastname', 'Nachname:') }}
            {{ Form::text('lastname') }}
        </li>

        <li>
            {{ Form::label('address', 'Strasse:') }}
            {{ Form::text('address') }}
        </li>

        <li>
            {{ Form::label('city', 'PLZ/Ort:') }}
            {{ Form::text('city') }}
        </li>

        <li>
            {{ Form::label('telefon', 'Telefon:') }}
            {{ Form::text('telefon') }}
        </li>


        <li>
            {{ Form::submit() }}
        </li>
    </ul>
{{ Form::close() }}

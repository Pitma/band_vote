@section('content')

{{ Form::open(array('route' => 'votes.store')) }}
    <ul>
        <li>
            {{ Form::label('user_id', 'User id:') }}
            {{ Form::text('user_id') }}
        </li>

        
        <li>
            {{ Form::submit() }}
        </li>
    </ul>
{{ Form::close() }}

@endsection
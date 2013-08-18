@section('content')

<h1>Band Login</h1>
{{ Form::open(array('action' => 'UsersController@login_try','class'=>'form-horizontale')) }}

 <div class="control-group">  
            {{ Form::label('email', 'Email:',array('class'=>'control-label')) }}
        <div class="controls">
            <div class="input-prepend">
                <span class="add-on"><i class="icon-envelope"></i></span>
                {{ Form::text('email','',array('class'=>'input-xlarge')) }}
            </div>
        </div> 
    </div>

    <div class="control-group">  
            {{ Form::label('password', 'Passwort:',array('class'=>'control-label')) }}
        <div class="controls">
            <div class="input-prepend">
                <span class="add-on"><i class="icon-lock"></i></span>
                {{ Form::password('password', array('class'=>'input-xlarge')) }}
            </div>
        </div> 
    </div>

{{ Form::token() }}
{{ Form::submit() }}
{{ Form::close() }}
<p><a href="{{ URL::to('users/create') }}">Registrieren</a> | <a href="{{ URL::to('password/remind') }}">Passwort vergessen</a></p>

@stop
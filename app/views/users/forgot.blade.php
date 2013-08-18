@section('content')

<h1>Passwort vergessen?</h1>
<p>Kein Problem gib einfach deine Emailadresse ein die du bei der Registrierung benutzt hast und 
wir schicken dir eine E-mail zu mit der du dein Passwort zurücksetzen kannst!</p>
{{ Form::open(array('url' => 'password/remind','class'=>'form-horizontale')) }}

 <div class="control-group">  
            {{ Form::label('email', 'Email:',array('class'=>'control-label')) }}
        <div class="controls">
            <div class="input-prepend">
                <span class="add-on"><i class="icon-envelope"></i></span>
                {{ Form::text('email','',array('class'=>'input-xlarge')) }}
            </div>
        </div> 
    </div>

   

{{ Form::token() }}
{{ Form::submit() }}
{{ Form::close() }}

@stop
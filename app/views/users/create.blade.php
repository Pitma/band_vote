@section('content')
{{ Form::open(array('route' => 'users.store','class'=>'form-horizontale','files'=> true)) }}

<h2>Band Registrierung</h2>

    <div class="control-group">   
            {{ Form::label('name', 'Name:', array('class'=>'control-label')) }}
        <div class="controls">
            {{ Form::text('name','',array('class'=>'input-xlarge')) }}
            {{ $errors->first('name','<span class="text-error">:message</span>') }}
        </div> 
    </div>

    <div class="control-group">  
         	{{ Form::label('password', 'Passwort:',array('class'=>'control-label')) }}
        <div class="controls">
             <div class="input-prepend">
                <span class="add-on"><i class="icon-lock"></i></span>
            {{ Form::password('password', array('class'=>'input-xlarge')) }}
              </div>
            {{ $errors->first('password','<span class="text-error">:message</span>') }}
        </div> 
    </div>

    <div class="control-group">  
            {{ Form::label('email', 'Email:',array('class'=>'control-label')) }}
        <div class="controls">
            <div class="input-prepend">
                <span class="add-on"><i class="icon-envelope"></i></span>
                {{ Form::text('email','',array('class'=>'input-xlarge')) }}
            </div>
                {{ $errors->first('email','<span class="text-error">:message</span>') }}
        </div> 
    </div>

    <div class="control-group">  
            {{ Form::label('description', 'Beschreibung:',array('class'=>'control-label')) }}
        <div class="controls">
            {{ Form::textarea('description','',array('class'=>'input-xlarge')) }}
            {{ $errors->first('description','<span class="text-error">:message</span>') }}
        </div> 
    </div>

    <div class="control-group">  
            {{ Form::label('genre', 'Musikrichtung:',array('class'=>'control-label')) }}
        <div class="controls">
            {{ Form::text('genre','',array('class'=>'input-xlarge')) }}
            {{ $errors->first('genre','<span class="text-error">:message</span>') }}
        </div> 
    </div>

     <div class="control-group">  
            {{ Form::label('origin', 'Herkunftsort:',array('class'=>'control-label')) }}
        <div class="controls">
            {{ Form::text('origin','',array('class'=>'input-xlarge')) }}
            {{ $errors->first('origin','<span class="text-error">:message</span>') }}
        </div> 
    </div>

    <div class="control-group">  
            {{ Form::label('picture', 'Bild/Logo:',array('class'=>'control-label')) }}
        <div class="controls">
            {{ Form::file('picture') }}
            {{ $errors->first('picture','<span class="text-error">:message</span>') }}
        </div> 
    </div>

    <div class="control-group">  
            {{ Form::label('youtube', 'Youtube:',array('class'=>'control-label')) }}
        <div class="controls">
            <div class="input-prepend">
                <span class="add-on">web</span>
                {{ Form::text('youtube','',array('class'=>'input-xlarge')) }}
            </div>
                {{ $errors->first('youtube','<span class="text-error">:message</span>') }}
    </div> 

    </div>
     <div class="control-group">  
            {{ Form::label('music', 'Musik (6Mb Max.):',array('class'=>'control-label')) }}
        <div class="controls">
            {{ Form::file('musica') }}
            {{ $errors->first('music','<span class="text-error">:message</span>') }}
        </div> 
    </div>

<hr>
<h2>Persönlicher Ansprechpartner</h2>

        <div class="control-group"> 
            {{ Form::label('firstname', 'Vorname:',array('class'=>'control-label')) }}
            <div class="controls">
            {{ Form::text('firstname','',array('class'=>'input-xlarge')) }}
            {{ $errors->first('fistname','<span class="text-error">:message</span>') }}
            </div>
        </div>

        <div class="control-group"> 
            {{ Form::label('lastname', 'Nachname:',array('class'=>'control-label')) }}
            <div class="controls">
            {{ Form::text('lastname','',array('class'=>'input-xlarge')) }}
            {{ $errors->first('lastname','<span class="text-error">:message</span>') }}
            </div>
        </div>

        <div class="control-group"> 
            {{ Form::label('address', 'Strasse:',array('class'=>'control-label')) }}
            <div class="controls">
            {{ Form::text('address','',array('class'=>'input-xlarge')) }}
            {{ $errors->first('address','<span class="text-error">:message</span>') }}
            </div>
        </div>

        <div class="control-group"> 
            {{ Form::label('city', 'PLZ/Ort:',array('class'=>'control-label')) }}
            <div class="controls">
            {{ Form::text('city','',array('class'=>'input-xlarge')) }}
            {{ $errors->first('city','<span class="text-error">:message</span>') }}
            </div>
        </div>

        <div class="control-group"> 
            {{ Form::label('telefon', 'Telefon:',array('class'=>'control-label')) }}
            <div class="controls">
            {{ Form::text('telefon','',array('class'=>'input-xlarge')) }}
            {{ $errors->first('telefon','<span class="text-error">:message</span>') }}
            </div>
        </div>
			
		<div class="control-group"> 
            <div class ="controls">
            <label class="checkbox" for="agb">Ich habe die <a href="{{URL::to('spielregeln')}}" target="_blank">AGB's</a> gelesen und Akzeptiere diese!
            {{ Form::checkbox('agb') }} 
            </label>    
         {{ $errors->first('agb','<span class="text-error">:message</span>') }}   
            {{ Form::token()}}
          
       </div>
    </div>
    {{ Form::captcha(array('theme' => 'clean'))}}
    {{ $errors->first('recaptcha_response_field','<span class="text-error">:message</span>') }}
    <hr>
    {{ Form::submit('Registrieren') }}
    {{ Form::close() }}


@stop

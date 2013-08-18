@section('content')
{{ Form::open(array('action' => array('UsersController@edit_band', $band->id),'class'=>'form-horizontale')) }}

<h1>Daten der Band ändern</h1>

    @foreach ($errors->all('<li>:message</li>') as $error)
    {{$error}}

    @endforeach


    <div class="control-group">   
            {{ Form::label('name', 'Name:', array('class'=>'control-label')) }}
        <div class="controls">
            {{ Form::text('name',$band->name,array('class'=>'input-xlarge')) }}
            {{ $errors->first('name','<span class="text-error">:message</span>') }}
        </div> 
    </div>

    <div class="control-group">  
         	{{ Form::label('password', 'Passwort ändern:',array('class'=>'control-label')) }}
        <div class="controls">
            {{ Form::password('password', array('class'=>'input-xlarge')) }}
            {{ $errors->first('password_edit','<span class="text-error">:message</span>') }}
        </div> 
    </div>

    <div class="control-group">  
            {{ Form::label('email', 'Email:',array('class'=>'control-label')) }}
        <div class="controls">
            <div class="input-prepend">
                <span class="add-on"><i class="icon-envelope"></i></span>
                {{ Form::text('email',$band->email,array('class'=>'input-xlarge')) }}
            </div>
                {{ $errors->first('email','<span class="text-error">:message</span>') }}
        </div> 
    </div>

    <div class="control-group">  
            {{ Form::label('description', 'Beschreibung:',array('class'=>'control-label')) }}
        <div class="controls">
            {{ Form::textarea('description',$band->description,array('class'=>'input-xlarge')) }}
            {{ $errors->first('description','<span class="text-error">:message</span>') }}
        </div> 
    </div>

    <div class="control-group">  
            {{ Form::label('genre', 'Musikrichtung:',array('class'=>'control-label')) }}
        <div class="controls">
            {{ Form::text('genre',$band->genre,array('class'=>'input-xlarge')) }}
            {{ $errors->first('genre','<span class="text-error">:message</span>') }}
        </div> 
    </div>

	
     <div class="control-group">  
            {{ Form::label('origin', 'Herkunftsort:',array('class'=>'control-label')) }}
        <div class="controls">
            {{ Form::text('origin',$band->origin,array('class'=>'input-xlarge')) }}
            {{ $errors->first('origin','<span class="text-error">:message</span>') }}
        </div> 
    </div>

	<div class="control-group"> 
	            <div class ="controls">     
	            {{ Form::token()}}
	            {{ Form::submit('speichern') }}
	       </div>
	{{ Form::close() }}
<hr>
<h1>Medien ändern:</h1>
{{ Form::open(array('action' => array('UsersController@edit_media', $band->id),'class'=>'form-horizontale','files'=> true)) }}
    <div class="control-group">  
            {{ Form::label('picture', 'Bild/Logo:',array('class'=>'control-label')) }}
        @if ($band->picture != '')
	    <img width="100px"class="img-polaroid" src="{{ URL::asset($band->picture) }}" alt="Logo der Band {{$band->name}}">
		@else
			<span>Zur Zeit kein Bild vorhanden!</span>
		@endif
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
                {{ Form::text('youtube','http://www.youtube.com/watch?v='.$band->youtube,array('class'=>'input-xlarge')) }}
            </div>
                {{ $errors->first('youtube','<span class="text-error">:message</span>') }}
    </div> 

    </div>
     <div class="control-group">  
            {{ Form::label('music', 'Musik (6Mb Max.):',array('class'=>'control-label')) }}
         <audio class="clearfix" src="{{ URL::asset($band->music) }}" controls loop> 
        HTML5 audio nicht unterstüzt supported
    </audio>
        <div class="controls">
            {{ Form::file('musica') }}
            {{ $errors->first('music','<span class="text-error">:message</span>') }}
        </div> 
    </div>
	<div class="control-group"> 
	            <div class ="controls">     
	            {{ Form::token()}}
	            {{ Form::submit('speichern') }}
	       </div>
	{{ Form::close() }}
<hr>
<h1>Persönlicher Ansprechpartner</h1>
{{ Form::open(array('action' => array('UsersController@edit_personal', $band->id),'class'=>'form-horizontale',)) }}
        <div class="control-group"> 
            {{ Form::label('firstname', 'Vorname:',array('class'=>'control-label')) }}
            <div class="controls">
            {{ Form::text('firstname',$band->firstname,array('class'=>'input-xlarge')) }}
            {{ $errors->first('fistname','<span class="text-error">:message</span>') }}
            </div>
        </div>

        <div class="control-group"> 
            {{ Form::label('lastname', 'Nachname:',array('class'=>'control-label')) }}
            <div class="controls">
            {{ Form::text('lastname',$band->lastname,array('class'=>'input-xlarge')) }}
            {{ $errors->first('lastname','<span class="text-error">:message</span>') }}
            </div>
        </div>

        <div class="control-group"> 
            {{ Form::label('address', 'Strasse:',array('class'=>'control-label')) }}
            <div class="controls">
            {{ Form::text('address',$band->address,array('class'=>'input-xlarge')) }}
            {{ $errors->first('address','<span class="text-error">:message</span>') }}
            </div>
        </div>

        <div class="control-group"> 
            {{ Form::label('city', 'PLZ/Ort:',array('class'=>'control-label')) }}
            <div class="controls">
            {{ Form::text('city',$band->city,array('class'=>'input-xlarge')) }}
            {{ $errors->first('city','<span class="text-error">:message</span>') }}
            </div>
        </div>

        <div class="control-group"> 
            {{ Form::label('telefon', 'Telefon:',array('class'=>'control-label')) }}
            <div class="controls">
            {{ Form::text('telefon',$band->telefon,array('class'=>'input-xlarge')) }}
            {{ $errors->first('telefon','<span class="text-error">:message</span>') }}
            </div>
        </div>
			
		<div class="control-group"> 
            <div class ="controls">     
            {{ Form::token()}}
            {{ Form::submit('speichern') }}
       </div>
    </div>
    
    {{ Form::close() }}
<hr>
<br><br>
<span>* Felder müssen ausgefüllt werden</span>

@stop
@extends('layouts.master')
@section('content')
@if (Session::has('error'))
    <div class="alert">Passwort konnte nicht zurückgesetzt werden!</div>
@endif

<h1>Passwort zurücksetzen</h1>

{{ Form::open(array('route' => array('password.reset', $token))) }}
<input type="hidden" name="token" value="{{ $token }}">
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
 <div class="control-group">  
            {{ Form::label('password_confirmation', 'Wiederholung:',array('class'=>'control-label')) }}
        <div class="controls">
            <div class="input-prepend">
                <span class="add-on"><i class="icon-lock"></i></span>
                {{ Form::password('password_confirmation', array('class'=>'input-xlarge')) }}
            </div>
        </div> 
    </div>

{{ Form::submit()}}
{{ Form::close() }}
@stop
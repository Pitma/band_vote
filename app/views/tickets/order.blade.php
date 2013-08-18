@section('content')

<h2>Tickets</h2>

<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Repellendus, quis, magnam, quibusdam deleniti exercitationem reprehenderit ab possimus minima accusamus soluta provident dolor quam quisquam esse voluptas sequi totam nesciunt. Eius.</p>

{{Form::open(array('route'=>'tickets.order.post'))}}

<!-- Name -->
<div class="control-group">  
        <div class="controls">  
                {{ Form::text('name',Input::old('name'),array('class'=>'input-xlarge','placeholder'=>'Name')) }}
                {{ $errors->first('name','<span class="text-error">:message</span>') }}
        </div> 
    </div>
<!-- Email -->
<div class="control-group">  
        <div class="controls">
                {{ Form::email('email',Input::old('email'),array('class'=>'input-xlarge','placeholder'=>'Emailadresse')) }}
                {{ $errors->first('email','<span class="text-error">:message</span>') }}
        </div> 
    </div>

<!-- Ticketanzahl -->
<div class="control-group">  
        <div class="controls">
                {{ Form::text('ticketAmount',Input::old('ticketAmount'),array('class'=>'input-xlarge','placeholder'=>'Ticketanzahl')) }}
                {{ $errors->first('ticketAmount','<span class="text-error">:message</span>') }}
        </div> 
    </div>

<!-- Sonstiges -->
<div class="control-group">  
        <div class="controls">
                {{ Form::textarea('text',Input::old('text'),array('class'=>'input-xlarge','placeholder'=>'Sonstige Nachricht')) }}
                {{ $errors->first('text','<span class="text-error">:message</span>') }}
        </div> 
    </div>
<div class="control-group">  
        <div class="controls">
                {{ Form::captcha(array('theme' => 'clean'))}}
                {{ $errors->first('recaptcha_response_field','<span class="text-error">:message</span>') }}
        </div>
    </div>

{{Form::submit()}}
{{Form::token()}}
{{Form::close()}}
@stop
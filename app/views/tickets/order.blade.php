@section('content')

<h3>Tickets</h3>
<br>
<p>So einfach geht es. <br><br>

Gib deinen vollständigen Namen, deine Emailadresse und deine gewünschte Ticketanzahl an. <br>
Falls du noch eine Frage hast kannst du diese in das Feld Sonstiges schreiben. <br> 
Wenn du die Anfrage abgeschickt hast, erhältst du von uns eine Bestätigungsmail. Nach der Bearbeitung deiner Anfrage bekommst du eine E-Mail mit der Reservierungsbestätigung, dem Preis, der Ticketnummer und einer Bankverbindung. Sobald das Geld auf dem angegebenen Konto eingegangen ist, bekommst du deine elektronischen Tickets via E-Mail. Jedes Ticket hat einen einmaligen QR-Code. 

<br><br> Die Tickets kannst du ausdrucken oder per Smartphone am Eingang vorzeigen.

</p>
<br>

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
                {{ HTML::image(Captcha::img(), 'Captcha image') }} 
                {{ Form::text('captcha') }}
                {{ $errors->first('captcha','<span class="text-error">:message</span>') }}
        </div>
    </div>

{{Form::submit()}}
{{Form::token()}}
{{Form::close()}}
@stop
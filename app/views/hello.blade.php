

@section('content')
    
   <div class="timer">
      <p class="text-left">Ihr habt nur noch ...</p>

       
           <div id="countdown">
            
       
        </div>

      <p class="text-right">... um eure Lieblingsband auf die Bühne zu voten.</p>
  </div>


    <h3>Herzlich Willkommen</h3>

    <p>NRW braucht neue Musik</p>
    <p>Und wo kann man diese beser präsentieren als in der LIVE MUSIC HALL Köln?<br>
      Eine der Legendärsten Konzerhallen Deutschlands wartet auf euch. <br>
      Meldet euch kostenlos an und lasst euch ohne Umwege direkt auf die große Bühne voten. <br>
      Alle Teilnahmebedingungen findet ihr in unseren Spielregeln.

    </p>
   	
@stop

@section('styles')
   <!-- <link href="{{ URL::asset('css/flipclock.css') }}" rel="stylesheet">-->
          <style type="text/css">@import "{{ URL::asset('css/jquery.countdown.css') }}";</style> 
@stop

@section('scripts')
     <!-- <script src="{{ URL::asset('js/prefixfree.min.js') }}"></script>
     <script src="{{ URL::asset('js/flipclock.min.js') }}"></script>
     <script src="{{ URL::asset('js/myClock.js') }}"></script>-->

      <script src="{{ URL::asset('js/jquery.countdown.js') }}"></script>
      <script>
      $(function () {
        $('#countdown').countdown({until: new Date(2013, 9-1, 2), 
          layout:'<div class="block">Tage<span id="days">{dnn}&nbsp;:</span></div>'+
                '<div class="space">&nbsp;</div>'+            
                '<div class="block">Stunden<span id="hours">{hnn}&nbsp;:</span></div>'+
                '<div class="space">&nbsp;</div>'+
                '<div class="block">Minuten<span id="minutes">{mnn}</span></div>'
            
          });
      });
      //,
        // layout: '<div>{dn} : {hn} : {mn}'
      </script>
      <script src="{{ URL::asset('js/jquery.countdown-de.js') }}"></script>
@stop
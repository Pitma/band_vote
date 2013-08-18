 <div class="timer_small">
  @if(Vote::$voteIsAllowed)
      <p class="text-left">Nur noch ...</p>
  @else
   <p class="text-left">Bald gehts los ...</p>
  @endif
           <div id="countdown">
            
       
        </div>
  @if(Vote::$voteIsAllowed)
      <p class="text-right">Votet jetzt kostenlos für eure
      	Lieblingsband und gestaltet dadurch euer eigenes Konzert
      	in der Live Music Hall.</p>
  @else
  <p class="text-right">Votet bald kostenlos für eure
        Lieblingsband und gestaltet dadurch euer eigenes Konzert
        in der Live Music Hall.</p>
  @endif
  </div>

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
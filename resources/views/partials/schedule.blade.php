<div class="goals_timeline">
   @foreach($schedule as $s)
       @if($s->confirmed == 'yes')
            <div class="week week{{$s->schedule_id}} blue">
                <p>{{$s->schedule_id}}</p>
            </div>
        @elseif($s->confirmed == 'no')
            <div class="week week{{$s->schedule_id}} orange">
                <p>{{$s->schedule_id}}</p>
            </div>
        @elseif($s->confirmed == 'not yet'&&$s->schedule_id==$goalnow->id)
            <div class="week week{{$s->schedule_id}} grey">
                <p>{{$s->schedule_id}}</p>
            </div>
        @else
            <div class="week week{{$s->schedule_id}} none">
                <p>{{$s->schedule_id}}</p>
            </div>
        @endif
   @endforeach
</div>

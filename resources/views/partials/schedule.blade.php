@foreach($schedule as $s)
        <div class="bubblecontainer" id="bubble{{$s->schedule_id}}">
            <div class="bubble">
                <p>People who gained this challenge:</p>
                <div class="userimages">
                    @foreach($successusers as $user)
                        @if($user->schedule_id == $s->schedule_id)
                            <a href="/friends/{{$user->user->id}}"><img src="{{$user->user->avatar}}" alt="pic"></a>
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
@endforeach
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

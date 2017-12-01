<div class="goals_timeline">
   @foreach($schedule as $s)
       @if($s->confirmed == 'yes')
            <div class="bubblecontainer" id="bubble{{$s->schedule_id}}">
                <div class="bubble">
                    <p>People who gained these challenges:</p>
                    <div class="userimages">
                   @foreach($successusers as $user)
                       @if($user->schedule_id == $s->schedule_id)
                           <img src="{{$user->user->avatar}}" alt="pic">
                       @endif
                   @endforeach
                    </div>
                </div>
            </div>
            <div class="week week{{$s->schedule_id}} blue">
                <p>{{$s->schedule_id}}</p>
            </div>
        @elseif($s->confirmed == 'no')
                <div class="bubblecontainer" id="bubble{{$s->schedule_id}}">
                    <div class="bubble">
                        <p>People who gained these challenges:</p>
                        <div class="userimages">
                            @foreach($successusers as $user)
                                @if($user->schedule_id == $s->schedule_id)
                                    <img src="{{$user->user->avatar}}" alt="pic">
                                @endif
                            @endforeach
                        </div>

                    </div>
                </div>
            <div class="week week{{$s->schedule_id}} orange">
                <p>{{$s->schedule_id}}</p>
            </div>
        @elseif($s->confirmed == 'not yet'&&$s->schedule_id==$goalnow->id)
                <div class="bubblecontainer" id="bubble{{$s->schedule_id}}">
                    <div class="bubble">
                        <p>People who gained these challenges:</p>
                        <div class="userimages">
                            @foreach($successusers as $user)
                                @if($user->schedule_id == $s->schedule_id)
                                    <img src="{{$user->user->avatar}}" alt="pic">
                                @endif
                            @endforeach
                        </div>

                    </div>
                </div>
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

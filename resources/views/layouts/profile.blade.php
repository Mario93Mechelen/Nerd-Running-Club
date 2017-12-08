@extends('master')

@section('title', 'Home')

@section('content')

    <div class="motivation">
    <h1 id="counter">Only <?php

        date_default_timezone_set('Europe/Brussels');
        $from = strtotime('22-04-2018');
        $today = time();
        $difference = $from - $today;
        echo floor($difference / 86400 );
        ?> days to go!

    </h1>

    @include('partials/schedule')
    </div>

    <div class="goals">

        <h3>Challenge nr. {{$goalnow->week}}</h3>
        <p>{{$goalnow->goal}}</p>

    </div>

    @if($reachedBadges !== null)

    <div class="rankingBadges">

        <h1>Last three gained badges by some of the nerds</h1>

        <div class="rankingB">
            @foreach($reachedBadges as $r)

                <div class="rankingBB">

                    <div class="rankingBProf">
                        @foreach($reachedUser->where('id', ($r->user_id)) as $u)
                            <img src="{{$u->avatar}}" alt="avatar">
                            <h3>{{$u->firstname}} just received the </h3>

                        @endforeach
                    </div>

                    <div class="rankingBBadge">
                        @foreach($badges->where('id', ($r->badge_id)) as $b)

                            <img src="{{$b->badgeurl}}">

                            <div class="badgeText">
                                <h3>What to do to get this badge:</h3>
                                <p>{{$b->badgetext}} ! </p>
                            </div>


                        @endforeach
                    </div>



                </div>

            @endforeach
        </div>

    </div>

    <div class="ranking">

        <h1>Top 5 Longest Runs</h1>

        @foreach($winningActivities as $w)
            @foreach($user->where('id', ($w->user_id)) as $u)

                <div class="number">
                    <p>{{$w->distance/1000}} km</p>
                    <h4> by {{$u->firstname}} {{$u->lastname}}</h4><img src="{{$u->avatar}}">
                </div>

            @endforeach

        @endforeach
    </div>



    @endif







@endsection
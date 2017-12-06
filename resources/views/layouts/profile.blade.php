@extends('master')

@section('title', 'Home')

@section('content')

    <div>
        <p>Get ready for the 10 miles of Antwerp by completing challenges each week! <br />
        Add friends to compete against them. Try to get higher in the rankings by runner more and runner faster! Good luck!</p>
    </div>



    <div class="goals">

        <h3>Challenge nr. {{$goalnow->week}} :</h3>
        <p>{{$goalnow->goal}}</p>

    </div>


    @include('partials/schedule')

    <div class="tiles">


        <div class="tile miles" @mouseover="miles = true" @mouseleave="miles = false">
            <transition name="fade">
            <a href="" class="info clockbox" v-show="miles">You better hurry, the clock is ticking.</a>
            </transition>
            <a href="">

            <h1>Only <?php

                date_default_timezone_set('Europe/Brussels');
                $from = strtotime('22-04-2018');
                $today = time();
                $difference = $from - $today;
                echo floor($difference / 86400 );
                ?> days to go!</h1>

            </a>

        </div>

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

    @endif







@endsection
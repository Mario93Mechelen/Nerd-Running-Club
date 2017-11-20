@extends('master')

@section('content')

    <div class="profile">

        <a href="/profile"> <img  src="{{$user->avatar}}" alt="Profile Pic"></a>
        <h3>{{$user->firstname." ".$user->lastname}} </h3>

    </div>

    <div class="goals">

        <h3>Week nr. {{$goals->week}}</h3>
        <p>{{$goals->goal}}</p>

    </div>

    <div class="tiles">

        <div class="tile friends" @mouseover="friends = true" @mouseleave="friends = false">
            <transition name="fade">
            <a href="/friends" class="info friendsbox" v-show="friends">Add some friends to run with.</a>
            </transition>
            <a href="/friends">
                <img src="/img/icons/friends-badge-1.png" alt="Friends">
            </a>
            <h1>Your friends</h1>

        </div>

        <div class="tile runs" @mouseover="runs = true" @mouseleave="runs = false">
            <transition name="fade">
            <a href="/activities" class="info milesbox" v-show="runs">Checkout how many miles you ran so far.</a>
            </transition>
            <a href="/activities">
                <img src="/img/chronometer.png" alt="Chronometer">
            </a>
            <h1>Your latest activities</h1>

        </div>

        <div class="tile achiev" @mouseover="achiev = true" @mouseleave="achiev = false">
            <transition name="fade">
            <a href="/achievements" class="info badgesbox" v-show="achiev">See how many badges you gained!</a>
            </transition>
            <a href="/achievements">
                <img src="/img/badge.png" alt="Achievements">
            </a>
            <h1>Your badges</h1>
        </div>

        <div class="tile miles" @mouseover="miles = true" @mouseleave="miles = false">
            <transition name="fade">
            <a href="" class="info clockbox" v-show="miles">You better hurry, the clock is ticking.</a>
            </transition>
            <a href="">
                <img src="/img/vlagje.png" alt="Friends">
            </a>
            <h1>Only <?php

                date_default_timezone_set('Europe/Brussels');
                $from = strtotime('22-04-2018');
                $today = time();
                $difference = $from - $today;
                echo floor($difference / 86400 );
                ?> days to go!</h1>



        </div>

    </div>



@endsection
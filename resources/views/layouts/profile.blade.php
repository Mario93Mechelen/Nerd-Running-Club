@extends('master')

@section('title', 'Home')

@section('content')

    @include('partials.profilepic')

    <div class="goals">

        <h3>Challenge nr. {{$goalnow->week}} :</h3>
        <p>{{$goalnow->goal}}</p>

    </div>


    @include('partials/schedule')

    <div class="tiles">

        <div class="tile friends" @mouseover="friends = true" @mouseleave="friends = false">
            <transition name="fade">
            <a href="/friends/type/friends" class="info friendsbox" v-show="friends">Add some friends to run with.</a>
            </transition>
            <a href="/friends/type/friends">

            <h1>Friends</h1>
            </a>
        </div>

        <div class="tile runs" @mouseover="runs = true" @mouseleave="runs = false">
            <transition name="fade">
            <a href="/activities" class="info milesbox" v-show="runs">Checkout how many miles you ran so far.</a>
            </transition>
            <a href="/activities">

            <h1>Activities</h1>
            </a>
        </div>

        <div class="tile achiev" @mouseover="achiev = true" @mouseleave="achiev = false">
            <transition name="fade">
            <a href="/achievements" class="info badgesbox" v-show="achiev">See how many badges you gained!</a>
            </transition>
            <a href="/achievements">

            <h1>Badges</h1>
            </a>
        </div>

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
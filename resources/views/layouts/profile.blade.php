@extends('master')

@section('content')

    <div class="profile">

        <a href="/profile"> <img  src="{{$user->avatar}}" alt="Profile Pic"></a>
        <h3>{{$user->firstname." ".$user->lastname}} </h3>

    </div>

    <div class="goals">

        <h3>{{$goals->week}}</h3>
        <p>{{$goals->goal}}</p>

    </div>

    <div class="tiles">

        <div class="tile friends">

            <a href="/friends">
                <img src="/img/icons/friends-badge-1.png" alt="Friends">
            </a>
            <h1>Your friends</h1>

        </div>

        <div class="tile runs">

            <a href="/activities">
                <img src="/img/chronometer.png" alt="Chronometer">
            </a>
            <h1>Your latest activities</h1>

        </div>

        <div class="tile achiev">

            <a href="/achievements">
                <img src="/img/badge.png" alt="Achievements">
            </a>
            <h1>Your badges</h1>
        </div>

        <div class="tile miles">

            <a href="">
                <img src="/img/vlagje.png" alt="Friends">
            </a>
            <h1>Only <p id="diffDays"></p> days to go!</h1>

        </div>

    </div>

    <script>

        var oneDay = 24*60*60*1000;
        var firstDate = new Date(2017,11,02);
        var secondDate = new Date(2018,04,22);

        var daystogo = Math.round(Math.abs((firstDate.getTime() - secondDate.getTime())/(oneDay)));

        document.getElementById('diffDays').innerHTML= daystogo;

    </script>


@endsection
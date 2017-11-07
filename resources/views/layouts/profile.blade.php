@extends('master')
<style>

    .tiles {

        display: flex;
        flex-direction: row;
        justify-content: flex-start;
        flex-wrap:wrap;
    }
    .tile  {

        width: 50%;
        height: 170px;
        display: flex;
        flex-direction: column;
        justify-content: center;
    }

    .tile a {

        align-self: center;
    }

    .tile a img {

        width: 40px;
        height: auto;
        align-self: center;

    }

    .tile h1 {
        color:white;
        text-align: center;
        margin-top: 15px;
        width: 50%;
        margin-left: 25%;

    }

    .friends h1 {

        color: #9db4e0;

    }

    .friends a img {

        width: 70px;
        margin-top: -10px;
    }



    .miles h1 {

        color: #9db4e0;
    }


    .miles {

        background-color: white;
    }

    .runs {

        background-color: #FDF0BC;

    }


    .achiev {

        background-color: #8CBD9C;
    }



</style>
@section('content')

    <div class="profile">

    <a href="/profile"> <img  src="{{$user->avatar}}" alt="Profile Pic"></a>
    <h3>{{$user->firstname." ".$user->lastname}} </h3>

    </div>

    <div class="tiles">

        <div class="tile friends">

            <a href="/friends"><img src="{{URL::asset('/img/icons/friends-badge-1.png')}}" alt="Friends"></a>
            <h1>Your friends</h1>

        </div>

        <div class="tile runs">

            <a href="/activities"><img src="{{URL::asset('/img/chronometer.png')}}" alt="Chronometer"></a>
            <h1>Your latest activities</h1>

        </div>

        <div class="tile achiev">

            <a href="/achievements"><img src="{{URL::asset('/img/badge.png')}}" alt="Achievements"></a>
            <h1>Your badges</h1>
        </div>

        <div class="tile miles">

            <a href=""><img src="{{URL::asset('/img/vlagje.png')}}" alt="Friends"></a>
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



    <!--<div class="goal">

        <div class="goal_logo">

            <div id="bg_goal"></div>

            <img src="{{URL::asset('/img/vlagje.png')}}" alt="flag">

            <p>This week's goal :</p>
            <h3>25 km</h3>

        </div>

        <div class="text_goal">

            <h3>32 IMD'ers completed this goal!</h3>
        </div>

    </div>

    <div class="achievement">

        <div class="text_achiev">

            <h3>Don't run alone</h3>
            <p>Earn your first badge by sending your friends some friendrequests!</p>
        </div>

        <div class="achiev_logo">

            <div id="bg_achiev"></div>

            <img src="{{URL::asset('/img/badge.png')}}" alt="flag">

        </div>

    </div>


    <div class="chron">

        <div class="chron_logo">

            <div id="bg_chron"></div>

            <img src="{{URL::asset('/img/chronometer.png')}}" alt="flag">

            <p>Duration :</p>
            <h3>1h35</h3>

            <p>Kcal :</p>
            <h3>245</h3>

        </div>

        <div class="text_chron">

            <p>Last run: </p>
            <h3>15, 450 km</h3>
        </div>

    </div>-->

@endsection
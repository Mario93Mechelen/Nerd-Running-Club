@extends('master')

<style>

    .badges a {

        text-decoration: none;
    }

    #linkAchievements p  {

        background-color: #FDF0BC;
        height: 25px;
        padding-top: 15px;
        color: #1b6d85;
        font-size: 0.8em;
        border-radius: 10px;
        margin-top: 20px;
        margin-bottom: 50px;
    }

</style>
@section('content')

    <div class="badges">

        <h2>All the badges</h2>
        <p>For every achievement, you earn a badge!</p>

        <div class="badges_filled">

            @foreach ($badge as $b)

                <img src="{{$b->badgeurl}}">

            @endforeach

        </div>

        <a href="/achievements" id="linkAchievements"><p>Your already earned badges</p></a>

        <h2>Good luck at the 10 miles!</h2>

    </div>


@endsection
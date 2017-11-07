@extends('master')
<style>

    .badges a {

        text-decoration: none;
    }

    #linkBadges p  {

        background-color: #FDF0BC;
        height: 25px;
        padding-top: 15px;
        color: #1b6d85;
        font-size: 0.8em;
        border-radius: 10px;
        margin-top: 200px;
        margin-bottom: 50px;
    }

</style>
@section('content')

    <div class="badges">

        <h2>Your earned badges</h2>
        <p>For every achievement, you earn a badge!</p>

        <div class="badges_filled">

            @foreach ($badge as $b)

                <img src="{{$b->badgeurl}}">

            @endforeach

        </div>

        <a href="/badges" id="linkBadges"><p>See all the badges you need to earn</p></a>

        <h2>Good luck at the 10 miles!</h2>

    </div>


@endsection
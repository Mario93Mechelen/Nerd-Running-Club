@extends('master')

@section('badges')

    <div class="badges">

        <h2>Your earned badges</h2>
        <p>For every achievement, you earn a badge!</p>

        <div class="badges_filled">

            <img class="badge_unfilled" src="{{URL::asset('/img/badge.png')}}" alt="badges">
            <img class="badge_unfilled" src="{{URL::asset('/img/badge.png')}}" alt="badges">
            <img class="badge_unfilled" src="{{URL::asset('/img/badge.png')}}" alt="badges">
            <img class="badge_unfilled" src="{{URL::asset('/img/badge.png')}}" alt="badges">
            <img class="badge_unfilled" src="{{URL::asset('/img/badge.png')}}" alt="badges">
            <img class="badge_unfilled" src="{{URL::asset('/img/badge.png')}}" alt="badges">
            <img class="badge_unfilled" src="{{URL::asset('/img/badge.png')}}" alt="badges">
            <img class="badge_unfilled" src="{{URL::asset('/img/badge.png')}}" alt="badges">
            <img class="badge_unfilled" src="{{URL::asset('/img/badge.png')}}" alt="badges">

        </div>

    </div>


@endsection
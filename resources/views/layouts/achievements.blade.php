@extends('master')

@section('content')

    <div class="badges">

        <h2>Your earned badges</h2>
        <p>For every achievement, you earn a badge!</p>

        <div class="badges_filled">

            @foreach ($badge as $b)

                <img src="{{$b->badgeurl}}">

            @endforeach

        </div>

        <h2>Good luck at the 10 miles!</h2>

    </div>


@endsection
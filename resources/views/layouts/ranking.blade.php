@extends('master')

@section ('content')

    <div class="ranking">

        <h1>Top 5 Longest Runs</h1>

        @foreach($winningActivities as $w)
            @foreach($user->where('id', ($w->user_id)) as $u)

            <div class="number number1">
            <img src="{{$u->avatar}}">
            <h4>{{$u->firstname}} {{$u->lastname}}</h4>
            <p>{{$w->distance}} miles</p>
            </div>

            @endforeach

        @endforeach

    </div>


@endsection
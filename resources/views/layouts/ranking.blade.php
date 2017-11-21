@extends('master')

@section ('content')

    <div class="ranking">

        <h1>Top 5 Longest Runs</h1>

        @foreach($winningActivities as $w)

            <div class="number number1">
            <h2>1</h2>
            <h3>{{$w->user_id}}</h3>
            <p>{{$w->distance}} miles</p>
            </div>

        @endforeach

    </div>


@endsection
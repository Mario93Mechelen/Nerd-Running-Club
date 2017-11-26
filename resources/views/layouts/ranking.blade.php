@extends('master')

@section ('content')

    <div class="ranking">

        <h1>Top 5 Longest Runs</h1>

        @foreach($winningActivities as $w)
            @foreach($user->where('id', ($w->user_id)) as $u)

            <div class="number number1">
            <p>{{$w->distance}} miles</p>
                <h4> by </h4><img src="{{$u->avatar}}">
            </div>

            @endforeach

        @endforeach

    </div>


@endsection
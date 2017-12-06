@extends('master')

@section('title', $friend->firstname." ".$friend->lastname)

@section('content')

    <div class="friendsprofile">

        <img src="{{  $friend->avatar  }}" alt="friends profile">

        <h2>{{  $friend->firstname  }} {{  $friend->lastname  }}</h2>




        <div class="badges_friend">

            <h3>{{$friend->firstname}} already earned {{$badge->count()}} badges!</h3>
            @foreach ($badge as $b)

                <img src="../{{ $b->badgeurl }}">

            @endforeach
        </div>

        <div class="latestruns">

            @foreach ($activity as $a)

                @include('partials.activitiesView')

            @endforeach


        </div>

    </div>

@endsection
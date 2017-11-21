@extends('master')

@section('content')

    <div class="friendsprofile">

        <img src="{{  $friend->avatar  }}" alt="friends profile">

        <h2>{{  $friend->firstname  }} {{  $friend->lastname  }}</h2>


        <h2>Achieved badges</h2>

        <div class="badges_friend">
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
@extends('master')

@section('title', $friend->firstname." ".$friend->lastname)

@section('content')

    @if($userid == $id)
    <div class="friendsprofile">
        <div class="leveluser">

            <img src="{{  $friend->avatar  }}" alt="friends profile">

            <h2>{{  $friend->firstname  }} {{  $friend->lastname  }}</h2>
        </div>

            <div class="level">
                <div class="levelinfo">
                <img src="/img/profile-icon.png" alt="icon">
                <h2>NerdLevel {{$level}}</h2>
                </div>
                <div class="progressbar"><span class="progress" style="width:{{$xpPoints}}%"></span></div>
            </div>


        <div class="badges_friend">
            <h3>My Badges</h3>
            <div class="badgesbox">
            @if($badge->count()>0)
            @foreach ($badge as $b)

                <img src="../{{ $b->badgeurl }}">

            @endforeach
                @else
                    <h3>WOOPS! Seems like you have no badges.</h3>
                @endif
        </div>
        </div>

        <div class="latestruns">
            <h2>My Activities</h2>
            @if($activity->count()>0)
            @foreach ($activity as $a)

                @include('partials.activitiesView')

            @endforeach
            @else
                <h2>WOOPS! Seems like you better ge to work.</h2>
            @endif
        </div>
    </div>
    @else
        <div class="friendsprofile">
            <div class="leveluser">

                <img src="{{  $friend->avatar  }}" alt="friends profile">

                <h2>{{  $friend->firstname  }} {{  $friend->lastname  }}</h2>
            </div>

            <div class="level">
                <div class="levelinfo">
                    <img src="/img/profile-icon.png" alt="icon">
                    <h2>NerdLevel {{$level}}</h2>
                </div>
                <div class="progressbar"><span class="progress" style="width:{{$xpPoints}}%"></span></div>
            </div>


            <div class="badges_friend">
                <h3>{{$friend->firstname}}'s Badges</h3>
                <div class="badgesbox">
                    @if($badge->count()>0)
                    @foreach ($badge as $b)

                        <img src="../{{ $b->badgeurl }}">

                    @endforeach
                    @else
                    <h3>WOOPS! Seems like you have no badges.</h3>
                    @endif
                </div>
            </div>

            <div class="latestruns">
                <h2>{{$friend->firstname}}'s Activities</h2>
                @if($activity->count()>0)
                @foreach ($activity as $a)

                    @include('partials.activitiesView')

                @endforeach
                @else
                    <h2>WOOPS! Seems like you better get to work.</h2>
                @endif
            </div>
        </div>
    @endif
@endsection
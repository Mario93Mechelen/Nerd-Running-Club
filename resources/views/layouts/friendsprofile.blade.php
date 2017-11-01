@extends('master')

@section('content')

    <div class="friendsprofile">

        <img src="{{  $friend->avatar  }}" alt="friends profile">

        <h2>{{  $friend->firstname  }} {{  $friend->lastname  }}</h2>

        <div class="activities">

            @foreach ($activity as $run)

                <div class="activity_run">

                    <p>Name : {{ $run->name }}</p>

                    <p>Distance : {{ $run->distance  }} m</p>

                    <p>Time : {{ $run->time  }} sec</p>

                    <p>Average Speed : {{ $run->averageSpeed  }} m/s</p>

                    <hr/>

                </div>

            @endforeach

        </div>

    </div>

@endsection
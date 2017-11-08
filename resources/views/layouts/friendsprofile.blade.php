@extends('master')

@section('content')

    <div class="friendsprofile">

        <img src="{{  $friend->avatar  }}" alt="friends profile">

        <h2>{{  $friend->firstname  }} {{  $friend->lastname  }}</h2>

        <div class="latestruns">

            @foreach ($activity as $a)

                @include('partials.activitiesView')

            @endforeach


        </div>

    </div>

@endsection
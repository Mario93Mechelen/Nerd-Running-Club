@extends('master')

@section('content')

    <div class="friendsprofile">

        <img src="{{  $friend->avatar  }}" alt="friends profile">

        <p>{{  $friend->firstname  }} {{  $friend->lastname  }}</p>

    </div>

@endsection
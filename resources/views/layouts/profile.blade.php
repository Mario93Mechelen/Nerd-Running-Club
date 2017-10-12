@extends('master')

@section('content')


<div class="profile">

    <img src="{{$user->avatar}}" alt="Profile Pic">
    <h3>{{$user->firstname." ".$user->lastname}} </h3>
    
    <div class="menu">
        <ul>
            <li class="options"></li>
            <li class="options"></li>
            <li class="options"></li>
            <li class="options"></li>
            <li class="options"></li>
            <li class="options"></li>
        </ul>
    </div>

</div>

    @endsection
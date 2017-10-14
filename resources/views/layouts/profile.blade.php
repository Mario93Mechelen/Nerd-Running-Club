@extends('master')

@section('content')

    <div class="profile">

    <a href="/profile"> <img  src="{{$user->avatar}}" alt="Profile Pic"></a>
    <h3>{{$user->firstname." ".$user->lastname}} </h3>
    <a href="/logout" id="logout">Logout</a>



    </div>



@endsection

@section('dashboard')


    <!--<div class="menu">
        <ul>
            <li class="options"></li>
            <li class="options"></li>
            <li class="options"></li>
            <li class="options"></li>
            <li class="options"></li>
            <li class="options"></li>
        </ul>
    </div>-->




@endsection
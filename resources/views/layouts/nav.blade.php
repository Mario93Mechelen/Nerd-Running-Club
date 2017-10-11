@extends('master')

<style>

    .nav {

        background-color: #8CBD9C ;
        display: flex;
        flex-direction: row;
        justify-content: space-between;
        width: 100%;
        height: 70px;
    }

    .nav img {

        width: 100px;
        height: 100px;
        margin-left: 50px;
        margin-top: 10px;
    }

    .nav a {

        text-decoration: none;
        margin-right: 150px;
        color: white;
        margin-top: 30px;
    }

</style>

@section('navigation')

<div class="nav">

    <img src="{{URL::asset('/img/logorunapp.png')}}" alt="Logo Nerd Running App">

    <a>Settings</a>

</div>

@endsection
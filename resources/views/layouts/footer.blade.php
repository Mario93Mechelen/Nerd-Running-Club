@extends('master')

<style>

    .footer {

        width: 100%;
        height: 70px;
        background-color: #8CBD9C ;
        display: flex;
        flex-direction: row;
        justify-content: space-around;

    }


    .footer a {

        text-decoration: none;
        font-family: 'Lato', sans-serif;
        color: white;
        margin-top: 30px;
    }

</style>

@section('footer')
<div class="footer">

    <a>Friends</a>
    <a>Medailles</a>

</div>
@endsection
@extends('master')

@section('content')
    <style>

    .latestruns {

        display: flex;
        flex-direction: column;
        justify-content: center;
        width: 80%;
        margin-left: 10%;
        margin-bottom: 100px;
    }


    .run {

            display: flex;
            flex-direction: column;
            justify-content: flex-start;
            margin-top: 20px;
            margin-bottom: 20px;
            border: 1px solid #FCF0BB;
            padding: 20px;
        }

    .run #date h1 {

        font-size: 1em;
        color: #1b6d85;
        text-align: center;
    }

    .run #info {

        display: flex;
        flex-direction: column;
        justify-content: space-between;
        width: 80%;
        margin-left: 10%;
    }

    .run #info h3{
        color: #2ab27b;

    }

    </style>

    <div class="latestruns">

        @foreach ($activity as $a)

        <div class="run">

            <div id="date">

                <h1>{{ $a->name }}</h1>

            </div>

            <div id="info">

                <div id="distance">

                    <h3>Distance</h3>
                    <p>{{$a->distance}} km</p>

                </div>

                <div id="time">

                    <h3>Time</h3>
                    <p>{{$a->averageSpeed}} minutes</p>

                </div>

            </div>

        </div>

        @endforeach


    </div>

    @endsection

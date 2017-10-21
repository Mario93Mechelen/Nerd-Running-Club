@extends('master')

@section('runs')
    <style>

        .run {

            display: flex;
            flex-direction: row;
           justify-content: center;
        }

        #distance, #time, #kcal {
        display: flex;
        flex-direction: row;
        justify-content: space-between;

        }

        #date {

        display: flex;
        flex-direction: column;
        justify-content: space-between;

        }

        #date h1 {

            color: darkgray;
            letter-spacing: 2px;
            text-transform: uppercase;
            font-size: 1.2em;
        }

        #date img {

            width: 100px;
            height: 100px;
            background-color: #1b6d85;
        }

        #info {

            margin-top: 20px;
        }

        #info h3 {

            color: darkgray;
            letter-spacing: 2px;
            text-transform: uppercase;
            font-size: 1em;
        }



    </style>

    <div class="latestruns">

        <div class="run">

            <div id="date">

            <h1>2 days ago</h1>
                <img src="" alt="Parcours">

            </div>

            <div id="info">

                <div id="distance">

                    <h3>Distance</h3>
                    <p>5 km</p>

                </div>

                <div id="time">

                    <h3>Time</h3>
                    <p>1h30m</p>

                </div>


                <div id="kcal">

                    <h3>Kcal</h3>
                    <p>214</p>

                </div>

            </div>

        </div>


    </div>

    @endsection

<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Nerd Running Club</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700,900" rel="stylesheet">

        <!-- Styles -->
        <style>

            body {


                width: 80%;
                margin-left: 10%;
                font-family: 'Lato', sans-serif;
                font-weight: 300;
            }

            .loginStrava {

                background-color: #8CBD9C;
                width: 100%;
                height: 100vh;
                display: flex;
                flex-direction: column;
            }

            .loginStrava img {

                width:200px;
                height: auto;
                margin-top: 200px;
                align-self: center;
            }

            .loginStrava a {

                background-color: white;
                width: 300px;
                align-self: center;
                padding: 2%;
                display: flex;
                flex-direction: row;
                justify-content: center;

                border-radius: 10px;
                margin-top: 50px;
            }

            .loginStrava a p {

                text-decoration: none;
                color: #90C8C8;
                font-size: 1em;
                text-transform: uppercase;
            }

            .loginStrava a img {

                width: 100px;
                height: 20px;
                margin-top: 2px;
                margin-left: 15px;
            }


        </style>
    </head>
    <body>

        <div class="loginStrava">

            <img src="{{URL::asset('/img/logorunapp.png')}}" alt="Logo Nerd Running App">

            <a href="/login/strava"><p>Login with</p><img src="{{URL::asset('/img/stravalogo.png')}}" alt="profile Pic" height="50" width="200"></a>


        </div>
    </body>
</html>

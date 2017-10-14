<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Nerd Running Club</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700,900" rel="stylesheet">

        <!-- Favicon -->
        <link rel="shortcut icon" href="/img/logorunapp.png" />

        <!-- CSS Styling -->
        <link rel="stylesheet" href="{{ url('/') }}./css/reset.css" type="text/css"/>
        <link rel="stylesheet" href="{{ url('/') }}./css/style.css" type="text/css"/>
        
    </head>
    <body>

        <div class="loginStrava">

            <img src="{{URL::asset('/img/logorunapp.png')}}" alt="Logo Nerd Running App">

            <a href="/login/strava">
                <p>Login with</p>
                <img src="{{URL::asset('/img/stravalogo.png')}}" alt="Strava" height="50" width="200">
            </a>
            
        </div>
    </body>
</html>

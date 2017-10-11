<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title></title>

    <style>

        body {


            width: 80%;
            margin-left: 10%;
            font-family: 'Lato', sans-serif;
            font-weight: 300;
        }

        .profile img {


        }
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

</head>
<body>

@include('layouts.nav')

@yield('content')

@include('layouts.footer')

</body>
</html>
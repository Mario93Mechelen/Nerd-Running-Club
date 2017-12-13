<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700,900" rel="stylesheet">

    <!-- Favicon -->
    <link rel="shortcut icon" href="/img/logorunapp.png"  type="image/png" />

    <!-- CSS Styling -->
    <link rel="stylesheet" href="/css/reset.css" type="text/css"/>
    <link rel="stylesheet" href="/css/min-style.css" type="text/css"/>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <title>@yield('title') | Nerd Running Club</title>

</head>
<body>
    @include('partials.nav')

    <div class="container">

        @yield('content')

    </div>

    @include('partials.footer')
    <script src="https://unpkg.com/vue"></script>
    <script src="/js/script.js"></script>
    <script src="/js/vuescript.js"></script>
    <script src="/js/vuescript2.js"></script>
</body>
</html>
<?php
$baseUrl = 'http://'.$_SERVER['HTTP_HOST'].'/';
?>
<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laboratorium medyczne</title>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,300,700' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/main.css') }}">
    <script src="{{ asset('assets/js/jquery-2.2.2.min.js') }}"></script>
    <script src="{{ asset('assets/js/master.js') }}"></script>
</head>
<body>

<nav class="navbar navbar-default">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="{{ route('home') }}">Asortyment</a>
        </div>
        <div class="nav navbar-nav navbar-right">
            <li><a href="{{ route('odczynniki.index') }}">Odczynniki</a></li>
            <li><a href="{{ route('urzadzenia.index') }}">Urządzenia</a></li>
            <li><a href="{{ route('sprzet_jednorazowy.index') }}">Sprzęt jednorazowy</a></li>
            <li><a href="{{ route('material_biologiczny.index') }}">Materiał biologiczny</a></li>
            <li><a href="{{ route('kalkulator.index') }}">Kalkulatory chemiczne</a></li>
            <li><a href="{{Auth::check() ? url('auth/logout') : url('auth/login')}}"><i
                            class="fa fa-lock"></i> {{Auth::check() ? 'Logout' : 'Login'}}</a></li>
        </div>
    </div>
</nav>

<main>
    <div class="container">
        <div id="warnings">

        </div>
        @yield('content')
    </div>
</main>

</body>
</html>
<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laboratorium medyczne</title>
    <link rel="stylesheet" href="http://localhost/labmed/resources/views/css/bootstrap.min.css">
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
        </div>
    </div>
</nav>

<main>
    <div class="container">
        @yield('content')
    </div>
</main>

</body>
</html>
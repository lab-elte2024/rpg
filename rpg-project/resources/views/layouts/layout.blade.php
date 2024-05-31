<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{ asset('css/mainstyle.css') }}" rel="stylesheet">
    <link href="{{ asset('css/missions.css') }}" rel="stylesheet">
    <title>@yield('title')</title>
</head>

<body>
    <div class="parent">
        <div class="div1">
            <a href="/mission">Fő küldetéseid</a>
        </div>
        <div class="div2">
            <a href="/sidemission">Mellék küldetéseid</a>
        </div>
        <div class="div5">
            <a href="/village" id="exit">Vissza</a>
        </div>
    </div>

    <div class="content">
        @yield('content')
    </div>
</body>

</html>

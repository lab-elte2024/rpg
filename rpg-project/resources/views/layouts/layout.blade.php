<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{ asset('css/missions.css') }}" rel="stylesheet">
    <link href="{{ asset('css/mainstyle.css') }}" rel="stylesheet">
    <title>@yield('title')</title>
</head>

<body>
    <div class="parent">
        <div class="div1">
            <h3><a href="/mission">Fő küldetéseid:</a></h3>
        </div>
        <div class="div2">
            <h3><a href="/sidemission">Mellék küldetéseid:</a></h3>
        </div>
        <div class="div4">
            <a href="/village" id="btn">exit</a>
        </div>
    </div>

    <div class="content">
        @yield('content')
    </div>
</body>

</html>

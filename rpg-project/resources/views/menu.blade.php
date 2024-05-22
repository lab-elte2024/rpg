<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link href="{{ asset('css/mainstyle.css') }}" rel="stylesheet">
            <link href="{{ asset('css/menu.css') }}" rel="stylesheet">


    <title>Menu</title>
</head>
<body>
    <div class="parent">
        @php
            $players = new App\Models\Player();
            $player = $players->getByUserID(session('ID'));
        @endphp


        <div class="div2"><h1>Cím</h1></div>
        <div class="div1" ><a href="/newgame">Új játék</a></div>
        @if($player)
        <div class="div3" ><a href="/village">Játék folytatása</a></div>
        @endif
        <div class="div4" ><a href="/logout">Kilépés</a></div>
        </div>
</body>
</html>

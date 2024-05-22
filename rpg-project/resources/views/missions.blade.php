<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{ asset('css/missions.css') }}" rel="stylesheet">
        <link href="{{ asset('css/mainstyle.css') }}" rel="stylesheet">

    <title>Küldetések</title>
</head>

<body>
    <div class="parent">
        <div class="div1"><h3>küldetéseid:</h3></div>
        <div class="div2"><h3>teljesített küldetéseid:</h3></div>
        <div class="div4"><a href="/village" id ="btn">exit</a></div>
    </div>

    <ul class="mission-list">
        @foreach ($missions as $mission)
            <li>
                <form method="POST" action="sorting">
                    @csrf
                    <input type="hidden" name="missionID" value="{{ $mission->id }}">
                    {{$mission->description}}
                    <input type="submit" value="{{ $mission->name }}">
                </form>
            </li>
        @endforeach
    </ul>





</body>

</html>

<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{asset('css/mainstyle.css')}}" rel= "stylesheet">
    <link href="{{ asset('css/tavern.css') }}" rel="stylesheet">


    <title>Tavern</title>



</head>
<body>



</body>

    <div class="parent">
        <div class="div1">
            <form action="{{route('heal')}}" method="POST">
                @csrf
                <button><h1>Sör 10$ (5 életerő pont)</h1></button><br>
                Pénzed: {{ $money }}
            </form>

        </div>
        <div class="div2">
            <button><a href="logic"><h1>JÁTÉKGÉP</h1></a></button>
        </div>
        <div class="div3">
            <a href = "/village" >Vissza</a>
        </div>

    </div>

</html>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{ asset('css/mk_player.css') }}" rel="stylesheet">
    <title>Új karakter</title>
</head>
<body>
    <div class="parent">
            <div class="div1">
                <h1>cím</h1>
            </div>

            <div class="div2">
                <img alt="left_arrow">
            </div>

            <div class="div3">
                <img alt="right_arrow">
            </div>

            <div class="div4">
                <form action="">

                    <input type="text"><br>
                    <input type="submit" value="Létrehoz">
                </form>
            </div>
    </div>

    <ul>
        @foreach ($classes as $class)
            <li>{{ $class->name }}</li>
        @endforeach
    </ul>
</body>
</html>

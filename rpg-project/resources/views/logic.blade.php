<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{ asset('css/mainstyle.css') }}" rel="stylesheet">
    <link href="{{ asset('css/logic.css') }}" rel="stylesheet">

    <title>logic</title>
</head>

<body>

    {{ $question }}

    <form action="checkAnswer" method="POST">
        @csrf
        <input type="text" name="answer">
        <input type="submit">
    </form>
    <a href="/mission" id = "btn"> Vissza </a>

</body>

</html>

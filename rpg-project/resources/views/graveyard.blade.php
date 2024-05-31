<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{asset('css/mainstyle.css')}}" rel= "stylesheet">
    <link href="{{ asset('css/graveyard.css') }}" rel="stylesheet">
    <title>Graveyard</title>
</head>
<body>
    <div class="parent">
        <div class="div1">Meghaltál!</div>
        <form action="{{ route('delete-character') }}" method="POST">
            @csrf
            <button type="submit">Új játék</button>
        </form>
    </div>
</html>

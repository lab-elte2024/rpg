<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{ asset('css/login.css') }}" rel="stylesheet">
        <link href="{{ asset('css/mainstyle.css') }}" rel="stylesheet">

    <title>Regisztráció</title>
</head>

<body>

    <div class="parent">
        <div class="div1"><h1>Regisztráció</h1> </div>
        <div class="div2">
        <form method="POST" action="{{ route('register') }}">
                @csrf
                <input type="text" name="username">
                <input type="text" name="password"><br>

                <input type="submit" id="btn" value="Regisztráció">
            </form>
        </div>
    </div>


</body>

</html>

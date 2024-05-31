<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link href="{{ asset('css/mainstyle.css') }}" rel="stylesheet">
        <link href="{{ asset('css/login.css') }}" rel="stylesheet">


    <title>Document</title>
</head>

<body>

    <div class="parent">
        <div class="div1"><h1>Login</h1> </div>
        <div class="div2">
            <form method="POST" action="{{ route('log') }}">
                @csrf
                <input type="text" name="username">
                <input type="password" name="password"><br>

                <input type="submit"  value="Login" id="btn"><br>
                <a href="/registration" id ="btn">Regisztráció</a><br>

                <a href="https://github.com/lab-elte2024/rpg.git" id ="btn">Github</a>

            </form>
        </div>
    </div>


</body>



</html>

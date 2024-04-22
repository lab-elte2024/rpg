<!DOCTYPE html>
<html>
<head>
    <title>Fegyverek listája</title>
</head>
<body>
    <h1>Fegyverek listája</h1>

    <ul>
        @php
           foreach ($enemy as $e) {
            $name = $e->name;
           }

        @endphp

        {{$name}}

        @foreach ($enemy as $e)
            <li>{{ $e->name }}</li>
        @endforeach
    </ul>
</body>
</html>

<!DOCTYPE html>
<html>
<head>
    <title>Fegyverek listája</title>
</head>
<body>
    <h1>Fegyverek listája</h1>

    <ul>
        @foreach ($weapons as $weapon)
            <li>{{ $weapon->name }}</li>
        @endforeach
    </ul>
</body>
</html>

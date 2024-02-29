<!DOCTYPE html>
<html>
<head>
    <title>Fegyverek listája</title>
</head>
<body>

    <h1>Fegyverek listája</h1>

    <ul>
        @foreach ($weapons as $weapon)
            <li>{{ $weapon->getRarity($weapon->rarity) }}</li>
        @endforeach
    </ul>
</body>
</html>

<!DOCTYPE html>
<html>
<head>
    <title>Felhasználók listája</title>
</head>
<body>
    <h1>Felhasználók listája</h1>

    <ul>
        @foreach ($weapons as $weapon)
            <li>{{ $weapon->name }}</li>
        @endforeach
    </ul>
</body>
</html>

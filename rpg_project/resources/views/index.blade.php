<!DOCTYPE html>
<html>
<head>
    <title>Felhasználók listája</title>
</head>
<body>
    <h1>Felhasználók listája</h1>

    <ul>
        @foreach ($users as $user)
            <li>{{ $user->username }}</li>
        @endforeach
    </ul>
</body>
</html>

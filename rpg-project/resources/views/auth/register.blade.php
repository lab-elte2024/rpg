<!-- create.blade.php -->

<form method="POST" action="{{ route('register') }}">
    @csrf

    <div>
        <label for="name">Név</label>
        <input id="name" type="text" name="username" value="{{ old('username') }}" required autofocus>
    </div>



    <div>
        <label for="password">Jelszó</label>
        <input id="password" type="password" name="password" required>
    </div>


    <div>
        <button type="submit">Regisztráció</button>
    </div>
</form>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{ asset('css/mk_player.css') }}" rel="stylesheet">
        <link href="{{ asset('css/mainstyle.css') }}" rel="stylesheet">

    <title>Új karakter</title>
</head>
<body>

    @php
        use Illuminate\Support\Facades\DB;
        $classes = new App\Models\Classes();
        $weapons = new App\Models\Weapon();
        $armors = new App\Models\Armor();

        $playerCtrl =  new  App\Http\Controllers\PlayerController();



        $data = $classes::paginate(1);
        $user_id = session('ID');
    @endphp

    <div class="parent">
        <div class="div1">
            <h1>cím</h1>

        </div>

        <div class="div2">
            {{ $data-> links('vendor.pagination.left')}}
        </div>

        <div class="div3">
            {{ $data-> links('vendor.pagination.right')}}
        </div>

        <div class="div4">

            <form action="/mk_player" method="POST">
                @csrf
                    @foreach($data as $d)
                        @php

                           $classID =  $d->ID;
                           $weapon = $weapons->getWeaponByClass($classID);
                           $armor = $armors->getArmorByClass($classID);

                            $name = $d->name;

                            $wid = 0;
                            $aid = 0;


                        @endphp
                        <input type="hidden" value={{$classID}} name="classID">
                        <input type="hidden" value={{$user_id}} name="userID">
                        Kasztod:{{ $name }}<br>
                        Támadás:{{ $d->attack }}<br>
                        Védekezés:{{ $d->defense }}<br>
                        Sebesség:{{ $d->speed }}<br>



                    @endforeach

                    @foreach ($weapon as $w)
                        @php
                            $wid = $w->ID;
                        @endphp
                        <input type="hidden" value={{$wid}} name="weaponID">
                        Fegyvered:{{ $w->name }}
                    @endforeach

                    @foreach ($armor as $a)
                        @php
                            $aid = $a->ID;

                        @endphp
                        <input type="hidden" value={{$aid}} name="armorID">
                        Páncélod:{{ $a->name }}<br>
                    @endforeach




                    <label for="name">Neved:</label>
                <input type="text" name="name"><br>
                <input type="submit" value="Létrehoz" id="btn">

            </form>
        </div>
    </div>





</body>
</html>

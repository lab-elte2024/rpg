<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{ asset('css/mk_player.css') }}" rel="stylesheet">
    <title>Új karakter</title>
</head>
<body>

    @php
        $classes = new App\Models\Classes();
        $weapons = new App\Models\Weapon();
        $armors = new App\Models\Armor();

        $data = $classes::paginate(1);
    @endphp

    <div class="parent">
        <div class="div1">
            <h1>cím</h1>
        </div>

        <div class="div2">
            @php
                //gomb helye
            @endphp
            {{ $data-> links('vendor.pagination.left')}}
        </div>



        <div class="div3">
            @php
                //gomb helye
            @endphp
            {{ $data-> links('vendor.pagination.right')}}
        </div>

        <div class="div4">
            <form action="" method="POST">

                    @foreach($data as $d)
                        @php
                           $class_id =  $d->ID;
                           $weapon = $weapons->getWeaponByClass($class_id);
                           $armor = $armors->getArmorByClass($class_id);

                            $name = $d->name;

                        @endphp

                        Kasztod:{{ $name }}<br>
                        Támadás:{{ $d->attack }}<br>
                        Védekezés:{{ $d->defense }}<br>
                        Sebesség:{{ $d->speed }}<br>



                    @endforeach

                    @foreach ($weapon as $w)
                        Fegyvered:{{ $w->name }}
                    @endforeach

                    @foreach ($armor as $a)
                        Páncélod:{{ $a->name }}<br>
                    @endforeach

                    <label for="name">Neved:</label>
                <input type="text" name="name"><br>
                <input type="submit" value="Létrehoz">
            </form>
        </div>
    </div>



</body>
</html>

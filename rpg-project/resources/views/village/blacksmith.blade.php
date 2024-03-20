<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{ asset('css/blacksmith.css') }}" rel="stylesheet">
    <title>Document</title>



</head>
<body>
    @php
    $player = new App\Models\Player();
    $classes = new App\Models\Classes();
    $weapons = new App\Models\Weapon();
    $armors = new App\Models\Armor();

    $current_player = $player->getByUserID(session('ID'))->first();

    $weapon = $weapons->getWeaponByID($current_player->weaponID)->first();
    $armor = $armors->getArmorByID($current_player->armorID)->first();

    $next_weapon = $weapons->getNextWeapon($current_player->classID,$weapon->lvl)->first();
    $next_armor = $armors->getNextArmor($current_player->classID,$armor->lvl)->first();
    @endphp





<div class="parent">

    <div class="div1">
        {{$weapon->name}}
    </div>

    <div class="div2" id="upgrade_weapon">
        @if($next_weapon)
            -Fejleszt->(Költség: {{$next_weapon->price}})

            <form action="/upgrade_weapon" method="POST">
                @csrf
                <input type="hidden" value="{{$next_weapon->ID}}" name="weaponID">
                <input type="hidden" value="{{$current_player->ID}}" name="playerID">
                <input type="submit" value="Küldés">
            </form>
        @endif
    </div>

    <div class="div3">
        @if($next_weapon)
            {{$next_weapon->name}}
        @endif
    </div>

    <div class="div4">
        {{$armor->name}}
    </div>

    <div class="div5">
        @if($next_armor)
            -Fejleszt->(Költség: {{$next_armor->price}})
            <form action="/upgrade_armor" method="POST">
                @csrf
                <input type="hidden" value="{{$next_armor->ID}}" name="armorID">
                <input type="hidden" value="{{$current_player->ID}}" name="playerID">
                <input type="submit" value="Küldés">
            </form>
        @endif
    </div>

    <div class="div6">
        @if($next_armor)
            {{$next_armor->name}}
        @endif
    </div>
    <div class="div7">Pénzed: {{$current_player->money}}$</div>
    <div class="div8"><a href="/village">Kilépés</a></div>
</div>



    <script>
        $lvl = $next_weapon->lvl;
        if($lvl == 4){
            document.getElementById("upgrade_weapon").disabled = true;
        }
    <scpript>

</body>




</html>

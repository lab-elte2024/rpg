<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{asset('css/mainstyle.css')}}" rel= "stylesheet">
    <link href="{{ asset('css/blacksmith.css') }}" rel="stylesheet">


    <title>Document</title>



</head>
<body>
    @php
    $player = new App\Models\Player();
    $classes = new App\Models\Classes();
    $weapons = new App\Models\Weapon();
    $armors = new App\Models\Armor();

    $current_player = $player->getByUserID(session('ID'));

    $weapon = $weapons->getWeaponByID($current_player->weaponID)->first();
    $armor = $armors->getArmorByID($current_player->armorID)->first();

    $next_weapon = $weapons->getNextWeapon($current_player->classID,$weapon->lvl)->first();
    $next_armor = $armors->getNextArmor($current_player->classID,$armor->lvl)->first();



    @endphp





<div class="parent">

    <div class="div1">
        <img src="{{ asset('images/weapons/'.$current_player->classID."/".$weapon->pictureID.".png") }}">
    </div>

    <div class="div2" id="upgrade_weapon">
        @if($next_weapon)
            -Fejleszt->(Költség: {{$next_weapon->price}})

            <form action="/upgrade_weapon" method="POST">
                @csrf
                <input type="hidden" value="{{$next_weapon->ID}}" name="weaponID">
                <input type="hidden" value="{{$next_weapon->price}}" name="price">
                <input type="hidden" value="{{$current_player->ID}}" name="playerID">
                <input type="hidden" value="{{$current_player->money}}" name="money">
                <input type="submit" id='btn' value="Upgrade">
            </form>
        @endif
    </div>

    <div class="div3">
        @if($next_weapon)
        <img src="{{ asset('images/weapons/'.$current_player->classID."/".$next_weapon->pictureID.".png") }}">
        @endif
    </div>

    <div class="div4">
        <img src="{{ asset('images/armors/'.$current_player->classID."/".$armor->pictureID.".png") }}">
    </div>

    <div class="div5">
        @if($next_armor)
            -Fejleszt->(Költség: {{$next_armor->price}})
            <form action="/upgrade_armor" method="POST">
                @csrf
                <input type="hidden" value="{{$next_armor->price}}" name="price">
                <input type="hidden" value="{{$next_armor->ID}}" name="armorID">
                <input type="hidden" value="{{$current_player->ID}}" name="playerID">
                <input type="hidden" value="{{$current_player->money}}" name="money">
                <input type="submit" id='btn' value="Upgrade">
            </form>
        @endif
    </div>

    <div class="div6">
        @if($next_armor)
            <img src="{{ asset('images/armors/'.$current_player->classID."/".$next_armor->pictureID.".png") }}">
        @endif
    </div>
    <div class="div7">Pénzed: {{$current_player->money}}$</div>
    <div class="div8"><a href="/village">Kilépés</a></div>
</div>




</body>




</html>

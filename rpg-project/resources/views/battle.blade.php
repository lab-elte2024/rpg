<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{ asset('css/battle.css') }}" rel="stylesheet">
    <title>Figth</title>
</head>
<body>
    @php
    use Illuminate\Support\Facades\DB;

    $players = new App\Models\Player();
    $enemies = new App\Models\Enemy();
    $classes = new App\Models\Classes();
    $skills = new App\Models\Skills();
    $weapons = new App\Models\Weapon();
    $armors = new App\Models\Armor();




    $player = $players->getByUserID(session('ID'))->first();

    $enemy = $enemies->getById(1)->first();

    $enemyMaxHp = $enemy->hp;

    $enemyHp =  $enemy->hp;

    $weapon = $weapons->getWeaponByID($player->weaponID)->first();

    $armor = $armors->getArmorByClass($player->armorID)->first();

    $attack = $player->attack;

    $defense = $player->defense;

    $speed = $player->speed;

    $min_dmg = $weapon->min_attack;
    $max_dmg = $weapon->max_attack;

    $armor = $armor->armor;

    $skill1 = $skills->getById($player->skill1_ID)->first();
    $skill2 = $skills->getById($player->skill2_ID)->first();
    $skill3 = $skills->getById($player->skill3_ID)->first();



    $t = 10;

    function asd(){
        $message = "wrong answer";
        echo "<script type='text/javascript'>alert('$message');</script>";
    }

@endphp


    <div class="parent">
        <div class="div1">player</div>
        <div class="div2"><progress id="hp_bar" value={{$player->hp}} max={{$player->maxHP}}></progress></div>
        <div class="div3" onclick="useSkill({{$skill1->damage}},{{$skill1->is_healing}})">{{$skill1->name}} </div>
        <div class="div4" onclick="useSkill({{$skill2->damage}},{{$skill2->is_healing}})">{{$skill2->name}} </div>
        <div class="div5" onclick="useSkill({{$skill3->damage}},{{$skill3->is_healing}})">{{$skill3->name}} </div>
        <div class="div6" onclick="endTurn()">end turn </div>
        <div class="div7" onclick="tryToflee()" id="flee">try to flee</div>
        <div class="div8">{{$enemy->name}}</div>
        <div class="div9"><progress id="ehp_bar" value={{$enemyHp}} max={{$enemyMaxHp}}></progress></div>
    </div>




</body>

<script>
    function tryToflee(){
       $speed =  {{$player->speed}};


        if($speed >= 7){
            alert('sikeresen elmenekültél!');
            window.location.href = '/menu ';
        }
        else{
            alert('nem sikerült!');
            var x= document.getElementById("flee");
            x.style.display = "none";
        }

    }


    function useSkill($sdmg,$is_healing,$cooldown){


        if($is_healing == 1){


        }else{

            var weapon_dmg = Math.floor(Math.random() * ({{$max_dmg}} - {{$min_dmg}} + 1) ) + {{$min_dmg}};
            var dmg = $sdmg + weapon_dmg + ({{$attack}} / 2);


            var enemyHP = document.getElementById('ehp_bar').value*1;
            enemyHP -= dmg;


            document.getElementById('ehp_bar').value = enemyHP;
            console.log(dmg);
            console.log(enemyHP);
        }

        if(enemyHP <= 0){
            alert("Győzelem")
        }else{
        alert("Az ellenség következik");
        setTimeout(() => {
           endTurn()
        }, 3000);
    }

    }


    function endTurn(){
    var enemyHP = document.getElementById('ehp_bar').value * 1;
    var playerHP = document.getElementById('hp_bar').value * 1;

    if(enemyHP > 0){
        var enemyAttack = 1;


        var playerDamage = {{$attack}} + ({{$speed}} / 2);
        playerHP -= enemyAttack;
        playerHP -= playerDamage;


        document.getElementById('ehp_bar').value = enemyHP;
        document.getElementById('hp_bar').value = playerHP;





        if(playerHP <= 0){
            alert('Vesztettél!');
        }
    } else {
        alert('Az ellenfél már halott!');

    }

    public function GameOver(eredmeny){
        //kiiertekeles eredmeny alapjan
        //kell egy graveyard ahova aplayer kerul ha meghal
        //az xp keplete: ????
        //penz random (?)
    }

}


</script>

</html>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{ asset('css/mainstyle.css') }}">
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

        $player = $players->getByUserID(session('ID'));

        foreach ($enemy as $e) {
            $enemyMaxHp = $e->hp;
            $enemyHp = $e->hp;
            $enemyName = $e->name;
            $enemyPicture = $e->pictureID;
            $eCounter = $e->isCounter;
            $eSpd = $e->speed;
            $eAt = $e->attack;
            $eDef = $e->defense;
            $eDmg = $eSpd / 2 + $eAt; // attack dmg
            $eCdmg = $eSpd / 2 + $eDef; //counter attack dmg
        }

        $weapon = $weapons->getWeaponByID($player->weaponID)->first();

        $armor = $armors->getArmorByID($player->armorID)->first();

        $attack = $player->attack;

        $defense = $player->defense;

        $speed = $player->speed;

        $min_dmg = $weapon->min_attack;
        $max_dmg = $weapon->max_attack;

        $armor = $armor->armor;

        $skill1 = $skills->getById($player->skill1_ID)->first();
        $skill2 = $skills->getById($player->skill2_ID)->first();
        $skill3 = $skills->getById($player->skill3_ID)->first();

        $pCounter = $player->isCounter;
        $pCdmg = $speed / 2 + $defense; //counter attack dmg player

    @endphp

<a href= "/mission">Vissza</a>
    <div class="parent">
        <div class="div1"><img id="karakterkep" src="{{ asset('images/classes/' . $player->classID . '.png') }}">
        </div>
        <div class="div2"><progress id="hp_bar" value={{ $player->hp }} max={{ $player->maxHP }}></progress>
        </div>
        <div class="div3" id="skill1"
            onclick="useSkill({{ $skill1->damage }}, {{ $skill1->is_healing }}, {{ $skill1->cooldown }}, 'skill1')">
            <img src="{{ asset('images/skills/' . $player->classID . "/$skill1->pictureID.png") }}">
        </div>
        <div class="div4"
            onclick="useSkill({{ $skill2->damage }}, {{ $skill2->is_healing }}, {{ $skill2->cooldown }}, 'skill2')">
            <img src="{{ asset('images/skills/' . $player->classID . "/$skill2->pictureID.png") }}">
        </div>
        <div class="div5"
            onclick="useSkill({{ $skill3->damage }}, {{ $skill3->is_healing }}, {{ $skill3->cooldown }}, 'skill3')">
            <img src="{{ asset('images/skills/' . $player->classID . "/$skill3->pictureID.png") }}">
        </div>
        <div class="div6" onclick="endTurn()">end turn </div>
        <div class="div7" onclick="tryToflee()" id="flee">try to flee</div>
        <div class="div8"><img id="karakterkep" src="{{ asset('images/enemies/' . $enemyPicture. '.png') }}"></div>
        <div class="div9"><progress id="ehp_bar" value={{ $enemyHp }} max={{ $enemyMaxHp }}></progress>
        </div>
    </div>

    <form action="afterWin" method="POST" id="gameOverForm" style="display:none;">
        @csrf
        <div id="xp">
            <input type="hidden" id="xpInput" name="xp">
        </div>
        <div id="money">
            <input type="hidden" id="moneyInput" name="money">
        </div>
        <div id="hp">
            <input type="hidden" id="hpInput" name="hp">
        </div>
        <input type="submit" value="Vissza a menüre">
    </form>




</body>

<script>
    var totalDMG = 0;
    var money = 0;
    var rounds = 0;
    var enemyAttack = Math.ceil({{ $eDmg }});
    var classID = {{ $player->classID }};
    var eC = {{ $eCounter }};
    var pC = {{ $pCounter }};
    var enemyHP = document.getElementById('ehp_bar').value * 1;
    var playerHP = document.getElementById('hp_bar').value * 1;

    var skillCooldowns = {
        skill1: 0,
        skill2: 0,
        skill3: 0
    };

    function tryToflee() {
        var speed = {{ $player->speed }};

        if (speed >= 7) {
            alert('Sikeresen elmenekültél!');
            window.location.href = '/menu';
        } else {
            alert('Nem sikerült!');
            var x = document.getElementById("flee");
            x.style.display = "none";
        }
    }

    function useSkill($sdmg, $is_healing, $cooldown, skillName) {
        // player attack

        if (skillCooldowns[skillName] > 0) {
            alert('Ezt még nem használhatod!');
            return;
        }

        if ($is_healing == 1) {
            playerHP += $sdmg;
            document.getElementById('hp_bar').value = playerHP;
        } else {
            if (classID == 2) {
                // musketer
                switch (skillName) {
                    case 'skill2':
                        pC = 1;
                        break;

                    default:
                        pC = 0;
                        break;
                }
            }

            if (classID == 3) {
                // bandita
                console.log(pC);
                switch (skillName) {
                    case 'skill2':
                        pC = 1;
                        break;

                    default:
                        pC = 0;
                        break;
                }
            }

            var weapon_dmg = Math.floor(Math.random() * ({{ $max_dmg }} - {{ $min_dmg }} + 1)) +
                {{ $min_dmg }};
            var dmg = $sdmg + weapon_dmg + ({{ $attack }} / 2);

            enemyHP -= dmg;

            if (eC == 1 && pC == 1) {
                totalDMG += enemyAttack;
                playerHP -= enemyAttack;
                document.getElementById('hp_bar').value = playerHP;
            }

            document.getElementById('ehp_bar').value = enemyHP;
            console.log(dmg);
            console.log(enemyHP);
        }
        skillCooldowns[skillName] = $cooldown;

        if (enemyHP <= 0) {
            GameOver(1);
        } else {
            setTimeout(() => {
                alert("Az ellenség következik");
            }, 1000);

            setTimeout(() => {
                endTurn();
            }, 3000);
        }
    }

    function endTurn() {
        // enemy attack

        if (enemyHP > 0) {
            playerHP -= enemyAttack;
            totalDMG += enemyAttack;

            if (pC == 1) {
                enemyHP -= {{ $pCdmg }};
            }

            document.getElementById('ehp_bar').value = enemyHP;
            document.getElementById('hp_bar').value = playerHP;

            if (playerHP <= 0) {
                alert('Meghaltál!');
                GameOver(0);
                return;
            }

            for (var skill in skillCooldowns) {
                if (skillCooldowns[skill] > 0) {
                    skillCooldowns[skill]--;
                }
            }

            rounds++;
        }
    }

    function GameOver(eredmeny) {
        if (eredmeny == 0) {
            // Vesztettél
            window.location.href = '/graveyard';
        } else {
            // Win
            var xp = (100 - (totalDMG - rounds));
            var money = Math.floor(Math.random() * 30) + 10;

            document.getElementById('xpInput').value = xp;
            document.getElementById('moneyInput').value = money;
            document.getElementById('hpInput').value = playerHP;

            document.getElementById('gameOverForm').style.display = 'block';
        }
    }
</script>

</html>

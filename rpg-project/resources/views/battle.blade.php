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
    $missions = new App\Models\Missions();


    $player = $players->getByUserID(session('ID'))->first();

    $enemy = $enemies-getById()->first();
    $enemyMaxHp = $enemy->hp;
    $skill1 = $skills->getById($player->skill1_ID)->first();
    $skill2 = $skills->getById($player->skill2_ID)->first();
    $skill3 = $skills->getById($player->skill3_ID)->first();

@endphp


    <div class="parent">
        <div class="div1">player</div>
        <div class="div2"><progress id="hp_bar" value={{$player->hp}} max={{$player->maxHP}}></progress></div>
        <div class="div3">{{$skill1->name}} </div>
        <div class="div4">{{$skill2->name}} </div>
        <div class="div5">{{$skill3->name}} </div>
        <div class="div6">end turn </div>
        <div class="div7" onclick="tryToflee()" id="flee">try to flee</div>
        <div class="div8">{{$enemy->name}}</div>
        <div class="div9"><progress id="ehp_bar" value={{$enemy->hp}} max={{$enemyMaxHp}}></progress></div>
    </div>




</body>

<script>
    function tryToflee(){
       $speed =  {{$player->speed}};

        //window.location.href = '/menu';
        //alert($speed);
        if($speed >= 7){
            window.location.href = '/menu ';
        }
        else{
            alert('nem sikerült!');
            document.getElementById("flee").disabled = true;
        }

    }
</script>

</html>


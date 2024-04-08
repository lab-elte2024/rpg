<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{ asset('css/asd.css') }}" rel="stylesheet">
    <title>Figth</title>
</head>
<body>
    @php
        use Illuminate\Support\Facades\DB;
        $players = new App\Models\Player();
        $enemies = new App\Models\Enemy();
        $classes = new App\Models\Classes();
        $skills = new App\Models\Skills();
        $player = $players->getByUserID(session('ID'))->first();

        $skill1 = $skills->getById($player->skill1_ID)->first();
        $skill2 = $skills->getById($player->skill2_ID)->first();
        $skill3 = $skills->getById($player->skill3_ID)->first();

    @endphp


    <div class="parent">
        <div class="div1">enemy </div>
        <div class="div2">enemy health </div>
        <div class="div3">try to flee </div>
        <div class="div4">end turn </div>
        <div class="div5">{{$skill1->name}} </div>
        <div class="div6">{{$skill2->name}} </div>
        <div class="div7">{{$skill3->name}} </div>
        <div class="div8"><progress id="hp_bar" value={{$player->hp}} max={{$player->maxHP}}></progress></div>
        <div class="div9">player </div>
        </div>

</body>
</html>


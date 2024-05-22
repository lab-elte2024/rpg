<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Player;
use App\Models\Skills;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\RedirectResponse;

class PlayerController extends Controller
{
    //

    public function create($data){

        $classData = DB::table('classes')->where('ID', $data['classID'])->first();

        $cID = $data['classID'];

        $skills = new Skills();
        $sk = $skills->getByClassID($cID*1);
        $skillsT = [];

        foreach ($sk as $s) {
            $skillsT[] = $s->ID;
        }



        return Player::create([
            'name' => $data['name'],
            'classID' => $data['classID'],
            'attack' => $classData->attack,
            'defense' => $classData->defense,
            'speed' => $classData->speed,
            'weaponID' => $data['weaponID'],
            'armorID' => $data['armorID'],
            'userID' => $data['userID'],
            'skill1_ID' => $skillsT[0],
            'skill2_ID' => $skillsT[1],
            'skill3_ID' => $skillsT[2],
            'isCounter' => $classData->counter,
          ]);
    }





    public function mk_player(Request $request) {
        $data = $request->all();
        $check = $this->create($data);

        return redirect("menu");
    }


    public function update_stat(){



        return redirect("stat");
    }

        public function loadPlayerStat(){
        //miután kész a küldi a statust át kell állítani a réginél és betölteni az újat.
        //0 nincs elkezdve
        //1 elkezdve
        //2 befejezve
        $player = Player::where('userID',session('ID'))->get();

        foreach($player as $p){
            $weaponID = $p->weaponID;
            $armorID = $p->armorID;
        }
        $weapon = Weapon::where('ID',$weaponID)->first();
        $armor = Armor::where('ID',$armorID)->first();

        /*
        return view('stat')
        ->with('player',$player)
        ->with('weapon',$weapon)
        ->with('armor',$armor);
        */

        return view('stat',compact('player','weapon','armor'));

    }

    public function update(Request $request)
    {
        $data = $request->all();


            $at = $data['attack'];
            $def = $data['defense'];
            $spd = $data['speed'];
            $tp = $data['tpoint'];
            $maxHP = $data['maxHP'];
            $playerId = $data['playerID'];axios



            DB::table('players')
            ->where('id', $playerId)
            ->update([
                'attack' => $at,
                'defense' => $def,
                'speed' => $spd,
                'maxHP' => $maxHP,
                'points' => $tp
            ]);




        return redirect('stat');

    }

    public function afterWin(Request $request)
    {
        // Validate and process the data
        $data = $request->all();
        $money = $data['money'];
        $xp = $data['xp'];
        $hp = $data['hp'];

        DB::table('players')
        ->where('id', session('ID'))
        ->update([
            'money' => $money,
            'xp_count' => $xp,
            'hp' => $hp,
        ]);

    }




}

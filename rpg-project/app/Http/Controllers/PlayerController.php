<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Player;
use App\Models\Skills;
use App\Models\Enemy;
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
            'userID' => session('ID'),
            'skill1_ID' => $skillsT[0],
            'skill2_ID' => $skillsT[1],
            'skill3_ID' => $skillsT[2],
            'isCounter' => $classData->counter,
          ]);
    }





    public function mk_player(Request $request) {
        $data = $request->all();
        $userId = session('ID');


        $existingPlayer = DB::table('players')->where('userID', $userId)->first();


        if ($existingPlayer) {
            DB::table('players')->where('userID', $userId)->delete();
        }

        $check = $this->create($data);

        return redirect("village");
    }


    public function update_stat(){



        return redirect("stat");
    }

        public function loadPlayerStat(){

        $player = Player::where('userID',session('ID'))->get();

        foreach($player as $p){
            $weaponID = $p->weaponID;
            $armorID = $p->armorID;
        }
        $weapon = Weapon::where('ID',$weaponID)->first();
        $armor = Armor::where('ID',$armorID)->first();



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
            $playerId = $data['playerID'];



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


        $data = $request->all();
        $money = $data['money'];
        $xp = (int)$data['xp'];
        $hp = $data['hp'];
        $userID = session('ID');
        $player = DB::table('players')->where('userID', $userID)->first();
        $currentXP = $player->xp_count;

        if($xp <= 0){
            $xp = 15;
        }

        DB::table('players')
        ->where('userID', session('ID'))
        ->update([
            'money' => $money,
            'xp_count' => $xp+$currentXP,
            'hp' => $hp,
        ]);


        $this->checkAndLevelUpPlayer($userID,$currentXP);

        if($player->current_mission == 13){
            return redirect('victory');
        }

        return redirect('village');

    }

    public function checkAnswer(Request $request)
    {
        $data = $request->all();
        $answer = $data['answer'];

        $player = DB::table('players')->where('userID', session('ID'))->first();

        if ($player) {
            $mission = DB::table('missions')
            ->where('missionID', $player->current_mission)
            ->where('type', 1)
            ->first();

            if ($mission) {
                if ($answer == $mission->answer) {
                    $reward = $mission->reward;
                    list($xp, $money) = explode(';', $reward);
                    DB::table('players')->where('userID', session('ID'))->update([
                        'xp_count' => $player->xp_count + $xp,
                        'money' => $player->money + $money,
                    ]);

                    return redirect('village');
                } else {

                    $fightMission = DB::table('missions')
                    ->where('missionID', $player->current_mission)
                    ->where('type', 0)
                    ->first();

                    $enemy = Enemy::where('ID', $fightMission->enemy_id)->get();
                    return view('battle', compact('enemy'));
                }
            } else {
                return back()->with('error', 'Mission not found.');
            }
        } else {
            return back()->with('error', 'Player not found.');
        }
    }

    private function checkAndLevelUpPlayer($userID,$currentXP)
    {

        $player = DB::table('players')->where('userID', $userID)->first();
        $missionID = $player->current_mission;
        $currentXP = $player->xp_count;
        $currentLevel = $player->lvl;


        if ($currentXP >= 100*$currentLevel) {

            DB::table('players')
                ->where('userID', $userID)
                ->update([
                    'xp_count' => $currentXP - 100*$currentLevel,
                    'lvl' => $currentLevel + 1,
                    'points' => $player->points + 3,
                ]);
        }
    }

    public function healPlayer(){
        $player = Player::where('userID', session('ID'))->first();

        if ($player->money >= 10 && $player->hp < $player->maxHP) {
            DB::table('players')
            ->where('userID', session('ID'))
            ->update([
                'money' => $player->money - 10,
                'hp' => $player->hp + 5,
            ]);
        }

        return redirect('tavern');
    }


    public function deleteCharacter(Request $request)
    {
            DB::table('players')->where('userID', session('ID'))->delete();
            return redirect('menu');

    }


}

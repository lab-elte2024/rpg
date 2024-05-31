<?php

namespace App\Http\Controllers;
use App\Models\Weapon;
use App\Models\Classes;
use App\Models\Missions;
use App\Models\SideMission;
use App\Models\Player;
use App\Models\Armor;
use App\Models\enemy;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Http\Request;

class GameController extends Controller
{
    public $missionTable;


    public function __construct()
    {
        $this->missionTable = 2;
    }


    public function createPlayer(){
        return view('mkplayer');
    }

    public function shwMissions()
    {
        $this->missionTable = 1;
        error_log($this->missionTable);
        $player = Player::where('userID', session('ID'))->first();
        $currentMission = $player->current_mission;

        if($currentMission == 13){
            return view('victory');
        }

        $missions = Missions::where('pre_id', $currentMission)->get();
        return view('missions', compact('missions'));
    }

    public function shwSideMissions()
    {
        $id = 0;
        $this->missionTable = 0;
        error_log($this->missionTable);
        $player = Player::where('userID', session('ID'))->first();
        if($player->sideMissionID == 0){
            $id = rand(1,2);

            DB::table('players')
            ->where('userID', session('ID'))
            ->update([
                'sideMissionID' => $id,
            ]);

        }

        $missions = SideMission::where('id', $player->sideMissionID)->get();
        return view('sidemissions', compact('missions'));
    }



    public function sortMission(Request $request){
        $data = $request->all();
            $mission = Missions::where("id",$data['missionID'])->first();

            DB::table('players')
            ->where('userID', session('ID'))
            ->update([
                'current_mission' => $mission->missionID,
            ]);

            if($mission->type == 0){
                $enemy = Enemy::where('ID',$mission->enemy_id)->get();
                return view('battle', compact('enemy'));
            }
            if($mission->type == 1){
                $id = $mission->id;
                return view('logic',['id' => $id]);
            }
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

    function loadTavern(){

        $player = Player::where('userID',session('ID'))->first();
        $money = $player->money;
        return view('village.tavern',['money' => $money]);
    }



}

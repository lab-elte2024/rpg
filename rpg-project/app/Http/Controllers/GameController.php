<?php

namespace App\Http\Controllers;
use App\Models\Weapon;
use App\Models\Classes;
use App\Models\Missions;
use App\Models\Player;
use App\Models\Armor;
use App\Models\enemy;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Http\Request;

class GameController extends Controller
{

    //sablon ne töröld
    public function index(){

        $weapons = Weapon::where('classID',1)->get(); // Fegyverek lekérése az adatbázisból

        return view('weapons', compact('weapons')); // Nézet átadása a fegyverek listájával
    }

    public function createPlayer(){
        return view('mkplayer');
    }

    public function shwMissions()
    {
        $player = Player::where('userID', session('ID'))->first();
        $currentMission = $player->current_mission;
        $missions = Missions::where('pre_id', $currentMission)->get();
        return view('missions', compact('missions'));
    }

    public function shwSideMissions()
    {
        // Assuming similar logic for side missions
        $player = Player::where('userID', session('ID'))->first();
        $currentMission = $player->current_mission;
        $missions = Missions::where('pre_id', $currentMission)->get();
        return view('sidemissions', compact('missions'));
    }



    public function sortMission(Request $request){
        $data = $request->all();

        $mission = Missions::where("id",$data['missionID'])->first();

        DB::table('players')
        ->where('userID', session('ID'))
        ->update([
            'current_mission' => $mission->id,
        ]);

        if($mission->type == 0){
            $enemy = Enemy::where('ID',$mission->enemy_id)->get();
            return view('battle', compact('enemy'));
        }
        if($mission->type == 1){
            $question = $mission->description;
            return view('logic',compact('question'));
        }
        else{
            return view('talk');
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

}

<?php

namespace App\Http\Controllers;
use App\Models\Weapon;
use App\Models\Classes;
use App\Models\Missions;
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

    public function shwMissions(){
        $missions = Missions::where("status",1)->get();
        return view('missions',compact('missions'));
    }


    public function sortMission(Request $request){
        $data = $request->all();

        $mission = Missions::where("id",$data['missionID'])->first();

        if($mission->type == 0){
            $enemy = Enemy::where('ID',$mission->enemy_id)->get();
            return view('battle', compact('enemy'));
        }
        else{
            return view('menu');
        }
    }

    public function loadNextMission(){
        //miután kész a küldi a statust át kell állítani a réginél és betölteni az újat.
        //0 nincs elkezdve
        //1 elkezdve
        //2 befejezve





    }

}

<?php

namespace App\Http\Controllers;
use App\Models\Weapon;
use App\Models\Classes;
use App\Models\Missions;
use App\Models\enemy;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

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
        $missions = Missions::all();
        return view('missions',compact('missions'));
    }

    public function LoadMission(){

        $enemy = Enemy::where('ID',1)->get(); // Fegyverek lekérése az adatbázisból

        return view('battle', compact('enemy')); // Nézet átadása a fegyverek listájával

        //a datában lesz az enemy/fejtoro id es a type
        // itt meg majd a type alapjan jon a lekerdezes es kiiertekeles vagy mi fene




    }



}

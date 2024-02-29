<?php

namespace App\Http\Controllers;

use App\Models\Weapons;
use Illuminate\Http\Request;

class GameController extends Controller
{

    function index(){
        $weapons = Weapons::all();
        return view('weaponTest', compact('weapons'));

    }

}

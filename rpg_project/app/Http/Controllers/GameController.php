<?php

namespace App\Http\Controllers;

use App\Models\Weapons;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GameController extends Controller
{

    function index(){
        $weapons = Weapons::all();
        return view('weaponTest', compact('weapons'));

    }

}

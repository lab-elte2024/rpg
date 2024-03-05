<?php

namespace App\Http\Controllers;
use App\Models\Weapon;


use Illuminate\Http\Request;

class GameController extends Controller
{

    public function index(){

        $weapons = Weapon::all(); // Fegyverek lekérése az adatbázisból

        return view('weapons', compact('weapons')); // Nézet átadása a fegyverek listájával

    }

}

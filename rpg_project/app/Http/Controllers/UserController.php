<?php

namespace App\Http\Controllers;

use App\Models\Weapons;
use Illuminate\Http\Request;

class UserController extends Controller
{
    // Az összes felhasználó lekérdezése és megjelenítése
    public function index()
    {
        $weapons = Weapons::all();
        return view('index', compact('weapons'));
    }
}

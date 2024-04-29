<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GameController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PlayerController;
use App\Models\Weapon;
use App\Models\Armor;



Route::get('/stat', [GameController::class, 'loadPlayerStat']);


Route::get('/', function () {
    return view('battlev2');
});


Route::get('/village', function () {
    return view('village.village');
});

Route::get('/menu', function () {
    return view('menu');
});

Route::get('/blacksmith', function () {
    return view('village.blacksmith');
});

/////////////////////////---- Login ----/////////////////////////////
Route::get('/login', function () {
    return view('auth.login');
});

Route::get('/registration', function () {
    return view('auth.register');
});

Route::post('/register', [LoginController::class, 'register'])->name('register');

Route::post('/login', [LoginController::class, 'login'])->name('log');

Route::get('/logout', [LoginController::class, 'logout']);

//////////////////////////////////////////////////////



/////////////---Menu items------///////////////

Route::get('/weapons', [GameController::class, 'index']);


Route::get('/newgame', [GameController::class, 'createPlayer'])->name('newgame');


Route::post('/mk_player', [PlayerController::class, 'mk_player']);

////////////////////////////


////////////--- Upgrade----////////////

Route::post('/upgrade_weapon', [Weapon::class, 'upgrade']);

Route::post('/upgrade_armor', [Armor::class, 'upgrade']);

//////////////////////////


//////////////--- Mission ---////////////////
Route::get('/mission', [GameController::class, 'shwMissions']);

Route::post('/sorting',[GameController::class,'sortMission']);



///////////////////////////////

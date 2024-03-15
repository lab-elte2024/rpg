<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GameController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PlayerController;



Route::get('/stat', function () {
    return view('stat');
});


Route::get('/', function () {
    return view('blacksmith');
});

Route::get('/menu', function () {
    return view('menu');
});

/////////////////////////---- Login ----/////////////////////////////
Route::get('/login', function () {
    return view('auth.login');
});

Route::get('/registration', function () {
    return view('auth.register');
});

Route::post('/register', [LoginController::class, 'register'])->name('register');

Route::post('/login', [LoginController::class, 'login']);

Route::get('/logout', [LoginController::class, 'logout']);

//////////////////////////////////////////////////////



/////////////---Menu items------///////////////

Route::get('/weapons', [GameController::class, 'index']);


Route::get('/newgame', [GameController::class, 'createPlayer'])->name('newgame');


Route::post('/mk_player', [PlayerController::class, 'mk_player']);


////////////////////////////


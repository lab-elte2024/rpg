<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GameController;
use App\Http\Controllers\LoginController;



Route::get('/', function () {
    return view('menu');
});


/////////////////////////---- Login ----/////////////////////////////
Route::get('/login', function () {
    return view('auth.login');
});

Route::get('/registration', function () {
    return view('auth.register');
});

Route::get('/register', [LoginController::class, 'register']);

Route::get('/login', [LoginController::class, 'login']);

Route::get('/logout', [LoginController::class, 'logout']);

//////////////////////////////////////////////////////



/////////////---Menu items------///////////////

Route::get('/weapons', [GameController::class, 'index']);


Route::get('/newgame', [GameController::class, 'getClasses',]);

Route::get('/continue', function () {
    return view('mkplayer');
});

////////////////////////////

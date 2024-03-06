<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GameController;



Route::get('/', function () {
    return view('welcome');
});

Route::get('/weapons', [GameController::class, 'index']);

Route::get('/login', function () {
    return view('auth.login');
});

Route::get('/register', function () {
    return view('auth.register');
});

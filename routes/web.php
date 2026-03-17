<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\SessionController;
use App\Http\Controllers\Animals\AnimalsController;
use App\Http\Controllers\Animals\AnimalsMatchs;

Route::get('/', function () {
    return view('home.home');
});

Route::middleware('auth')->group(function() {
    Route::post('/logout', [SessionController::class, 'destroy']);

    Route::get('/registerPrefrences', [RegisterController::class, 'createPrefrences']);
    Route::post('/registerPrefrences', [RegisterController::class, 'storePrefrences']);

    Route::get('/animal', [AnimalsController::class, 'index']);
    Route::post('/animals/like', [AnimalsController::class, 'like']);

    Route::get("/animals", [AnimalsMatchsController::class])

});

Route::middleware('guest')->group(function() {
    Route::get('/register', [RegisterController::class, 'create']);
    Route::post('/register', [RegisterController::class, 'store']);

    Route::get('/login', [SessionController::class, 'create']);
    Route::post('/login', [SessionController::class, 'store']);
});



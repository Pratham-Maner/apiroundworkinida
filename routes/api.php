<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


// Matches routes
Route::get('/matches', [MatchController::class,'index']);
Route::get('/matches/{id}', [MatchController::class,'show']);

// Players routes
Route::get('/players', [PlayersController::class,'index']);
Route::get('/players/{id}', [PlayersController::class,'show']);

// Admin routes
Route::middleware('auth:api', 'admin')->group(function () {
    Route::post('/matches', [MatchController::class,'store']);
    Route::put('/matches/{id}', [MatchController::class,'update']);
    Route::delete('/matches/{id}', [MatchController::class,'destroy']);
    
    Route::post('/players', [PlayersController::class,'store']);
    Route::put('/players/{id}', [PlayersController::class,'update']);
    Route::delete('/players/{id}', [PlayersController::class,'delete']);
});

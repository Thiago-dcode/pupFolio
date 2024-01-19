<?php

use App\Http\Controllers\BreedController;
use App\Http\Controllers\DogController;
use App\Http\Controllers\SizeController;
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

Route::get('/dogs', [DogController::class, 'index']);
Route::get('/dogs/{id}', [DogController::class, 'show']);
Route::post('/dogs', [DogController::class, 'create']);


Route::get('/breeds', [BreedController::class, 'index']);
Route::get('/breeds/{name}', [BreedController::class, 'show']);


Route::get('/sizes', [SizeController::class, 'index']);

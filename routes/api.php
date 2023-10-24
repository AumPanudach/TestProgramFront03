<?php

use App\Http\Controllers\Api\AnimalController;
use App\Http\Controllers\Api\PetController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('/pet', [PetController::class, 'pet_list']);
Route::get('/animal', [AnimalController::class, 'animal_list']);
Route::get('/pet/{animal?}',[PetController::class, 'pet_list']);
Route::post('/pet/search', [PetController::class, 'pet_search'] );
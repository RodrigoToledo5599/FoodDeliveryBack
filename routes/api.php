<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\User\AuthController;
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


Route::post('/home',[HomeController::class, 'LoadHomePage']);
Route::get('/serving/{id}',[HomeController::class, 'PickAServing'])->middleware("auth:api");

Route::post('/login',[AuthController::class, 'Login']);
Route::get('/test',[AuthController::class, 'TestAuth'])->middleware('auth:api');

Route::get('/anything',function(){
    return "piruleiba";
});

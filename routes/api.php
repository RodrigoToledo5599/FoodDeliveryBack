<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\User\AuthController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

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


Route::get('/home',[HomeController::class, 'LoadHomePage']);
// Route::get('/serving/{id}',[HomeController::class, 'PickAServing'])->middleware("auth:api");
Route::get('/serving/{id}',[HomeController::class, 'PickAServing']);

Route::post('/login',[AuthController::class, 'Login']);
Route::get('/test',[AuthController::class, 'TestAuth'])->middleware('auth:api');

Route::get('/anything',function(){
    Log::debug('whatever');
    return "whatever";
});

Route::post('/test-datadog',function(){
    $number = 0;
    $data= [
        "message" => "aaa " . $number,
        "requestDate" => date('d/m/Y H:i:s')
    ];
    $response = Http::withHeaders([
        'Content-Type' => 'application/json',
        'DD-API-KEY' => env('DD_API_KEY'),
    ])->post('https://api.datadoghq.com/api/v1/events',[
        'title' => 'Test Event from Laravel',
        'text' => $data["message"],
        'priority' => 'normal',
        'tags' => ['laravel', 'testing'],
    ]);
    DB::table('logsdatadog')->insert($data);
    return("msg enviada " . $number);
});

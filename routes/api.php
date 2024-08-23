<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\User\AuthController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Monolog\LogRecord;
use NewRelic\Monolog\Enricher\NewRelicEnricher;

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
    // Log::debug('whatever');
    // Log::channel('newrelic')->info('testando aq');
    Log::error('testando se aparece algo');
    // throw new Exception('gagareqwfdasea');
    // return "agora testando oq deu certo";
});

Route::post('/testnewrelic2',function(){
    $response = Http::withHeaders([
        'Api-Key' => env('NRELIC_API_KEY'),
        'Content-Type' => 'application/json',
        // 'Host' => 'log-api.newrelic.com'
        ])->post('https://gov-log-api.newrelic.com/log/v1',[
            'message' => 'deu bom agora'
        ]);
        Log::channel('newrelic')->info('testando aq');
        // $monolog = app('log')->getHandler('newrelic');
        // $monolog->log(Logger::INFO, 'Custom log message with Monolog');

        return $response;
});

Route::post('/testnewrelic',function(){
    Log::channel('newrelic')->info('testando essa nova query');
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

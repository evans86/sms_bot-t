<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\v1\CountryController;
use App\Http\Controllers\Api\v1\OperatorController;
use App\Http\Controllers\Api\v1\UserController;
use App\Http\Controllers\Api\v1\ProductController;
use App\Http\Controllers\Api\v1\BotController;
use App\Http\Controllers\Api\v1\OrderController;

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

Route::resources([
    'countries' => CountryController::class,
    'operators' => OperatorController::class,
    'services' => ProductController::class,
]);

Route::get('setCountry', [CountryController::class, 'setCountry']);
Route::get('setOperator', [OperatorController::class, 'setOperator']);
Route::get('setLanguage', [UserController::class, 'setLanguage']);
Route::get('getUser', [UserController::class, 'getUser']);
Route::get('balance', [UserController::class, 'balance']);

//api bot
Route::get('ping', [BotController::class, 'ping']);
Route::get('create', [BotController::class, 'create']);
Route::get('error', [BotController::class, 'error']);
Route::get('get', [BotController::class, 'get']);
Route::get('update', [BotController::class, 'update']);

//api order
Route::get('createOrder', [OrderController::class, 'createOrder']);
Route::get('getOrder', [OrderController::class, 'getOrder']);
Route::get('orders', [OrderController::class, 'orders']);

Route::get('closeOrder', [OrderController::class, 'closeOrder']);
Route::get('reportOrderSms', [OrderController::class, 'reportOrderSms']);
Route::get('secondSms', [OrderController::class, 'secondSms']);
Route::get('confirmOrder', [OrderController::class, 'confirmOrder']);

Route::get('getActive', [OrderController::class, 'getActive']);
Route::get('getStatus', [OrderController::class, 'getStatus']);


//Route::get('getUser', [\App\Http\Controllers\ApiController::class, 'getUser']);

//Route::get('setOperator', [\App\Http\Controllers\ApiController::class, 'setOperator']);
//Route::get('setLanguage', [\App\Http\Controllers\ApiController::class, 'setLanguage']);

//Route::get('services', [\App\Http\Controllers\ApiController::class, 'services']);



<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\v1\CountryController;
use App\Http\Controllers\Api\v1\OperatorController;
use App\Http\Controllers\Api\v1\UserController;
use App\Http\Controllers\Api\v1\ProductController;

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


//Route::get('getUser', [\App\Http\Controllers\ApiController::class, 'getUser']);

//Route::get('setOperator', [\App\Http\Controllers\ApiController::class, 'setOperator']);
//Route::get('setLanguage', [\App\Http\Controllers\ApiController::class, 'setLanguage']);

//Route::get('services', [\App\Http\Controllers\ApiController::class, 'services']);



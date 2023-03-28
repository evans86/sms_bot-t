<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [Controller::class, 'welcome'])->name('welcome');

/**
 * Роуты для админки (страны, операторы, сервисы)
 */
Route::group(['namespace' => 'Activate', 'prefix' => 'activate'], function () {
    // Ресурсы:
    Route::resource('resources', ResourceController::class)
        ->only(['index', 'edit', 'update', 'destroy'])->names('activate.resource');

    // Страны
    Route::resource('countries', CountryController::class)
        ->only(['index', 'edit', 'update', 'destroy'])->names('activate.country');

    Route::get('product', 'ProductController@index')->name('activate.product.index');

    Route::get('order', 'OrderController@index')->name('activate.order.index');

    Route::get('bot', 'BotController@index')->name('activate.bot.index');
});

/**
 * Роуты для админки (пользователи)
 */
Route::group(['namespace' => 'User', 'prefix' => ''], function () {
    Route::get('users', 'UserController@index')->name('users.index');
});


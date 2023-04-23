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

Route::get('/', [Controller::class, 'home'])->name('home');

/**
 * Роуты для админки (страны, операторы, сервисы)
 */
Route::group(['namespace' => 'Activate', 'prefix' => 'activate'], function () {
    // Ресурсы:
    Route::resource('resources', ResourceController::class)
        ->only(['index', 'edit', 'update', 'destroy'])->names('activate.resource')->middleware('auth');
    // Ресурсы генерация подтаблиц :
    Route::get('country/{id}', 'ResourceController@country')->name('activate.resource.country')->middleware('auth');
    Route::get('countryReset/{id}', 'ResourceController@countryReset')->name('activate.resource.countryReset')->middleware('auth');
    Route::get('services/{id}', 'ResourceController@services')->name('activate.resource.services')->middleware('auth');
    Route::get('servicesReset/{id}', 'ResourceController@servicesReset')->name('activate.resource.servicesReset')->middleware('auth');
    Route::get('resourceServicesCountries/{id}', 'ResourceController@resourceServicesCountries')->name('activate.resource.resourceServicesCountries')->middleware('auth');
    Route::get('updateServicesCountries', 'ResourceController@updateServicesCountries')->name('activate.resource.updateServicesCountries')->middleware('auth');

    // Страны
    Route::resource('countries', CountryController::class)
        ->only(['index', 'edit', 'update', 'destroy'])->names('activate.country')->middleware('auth');

    //Сервисы
    Route::resource('product', ProductController::class)
        ->only(['index', 'edit', 'update', 'destroy'])->names('activate.service')->middleware('auth');

    //Заказы
    Route::get('order', 'OrderController@index')->name('activate.order.index')->middleware('auth');

    //Боты
    Route::get('bot', 'BotController@index')->name('activate.bot.index')->middleware('auth');
    Route::get('bot/{id}', 'BotController@resource')->name('activate.bot.resource')->middleware('auth');
});

/**
 * Роуты для админки (пользователи)
 */
Route::group(['namespace' => 'User', 'prefix' => ''], function () {
    Route::get('users', 'UserController@index')->name('users.index')->middleware('auth');
});


Auth::routes();

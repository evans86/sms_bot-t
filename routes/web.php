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
    Route::get('countries', 'CountryController@index')->name('activate.countries.index');
    Route::get('countries/{country}/update', 'CountryController@update')->name('activate.countries.update');
    Route::delete('countries/{country}', 'CountryController@delete')->name('activate.countries.delete');
    Route::get('countries/all-update', 'CountryController@allUpdate')->name('activate.countries.all-update');
    Route::get('countries/all-delete', 'CountryController@allDelete')->name('activate.countries.all-delete');

    Route::get('product', 'ProductController@index')->name('activate.product.index');

    Route::get('order', 'OrderController@index')->name('activate.order.index');

    Route::get('bot', 'BotController@index')->name('activate.bot.index');

    // Ресурсы:
    Route::get('resources', 'ResourceController@index')->name('activate.resource.index');
    Route::get('resources/edit/{resource}', 'ResourceController@edit')->name('activate.resource.edit');
    Route::post('resources/update/{id}', 'ResourceController@update')->name('activate.resource.update');

    Route::post('/resources', 'ResourceController@store')->name('activate.resource.store');
    Route::delete('resources/{resource}', 'ResourceController@delete')->name('activate.resource.delete');
});

/**
 * Роуты для админки (пользователи)
 */
Route::group(['namespace' => 'User', 'prefix' => ''], function () {
    Route::get('users', 'UserController@index')->name('users.index');
});


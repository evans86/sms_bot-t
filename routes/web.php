<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

/**
 * Роуты для админки (страны, операторы, сервисы)
 */
Route::group(['namespace' => 'Activate', 'prefix' => 'activate'], function () {
    Route::get('countries', 'CountryController@index')->name('activate.countries.index');
    Route::get('countries/update', 'CountryController@update')->name('activate.countries.update');
    Route::get('countries/delete', 'CountryController@delete')->name('activate.countries.delete');
    Route::get('operators/{operators}', 'OperatorController@index')->name('activate.operators.index');
    Route::get('product', 'ProductController@index')->name('activate.product.index');
    Route::get('order', 'OrderController@index')->name('activate.order.index');
});

/**
 * Роуты для админки (пользователи)
 */
Route::group(['namespace' => 'User', 'prefix' => ''], function () {
    Route::get('users', 'UserController@index')->name('users.index');
});


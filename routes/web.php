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

Route::get('/', 'App\Http\Controllers\HomeController@index')->name("home.index");
Route::get('/composers', 'App\Http\Controllers\ComposerController@index')->name("composer.index");
Route::get('/composers/{id}', 'App\Http\Controllers\ComposerController@show')->name("composer.show");

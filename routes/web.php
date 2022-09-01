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
Route::get('/composer/{id}', 'App\Http\Controllers\ComposerController@show')->name("composer.show");

Route::get('/styles', 'App\Http\Controllers\StyleController@index')->name("style.index");
Route::get('/style/{id}', 'App\Http\Controllers\StyleController@show')->name("style.show");

Route::get('/concerts', 'App\Http\Controllers\ConcertController@index')->name("concert.index");
Route::get('/concert/{id}', 'App\Http\Controllers\ConcertController@show')->name("concert.show");

Route::get('/musicsources', 'App\Http\Controllers\MusicsourceController@index')->name("musicsource.index");
Route::get('/musicsource/{id}', 'App\Http\Controllers\MusicsourceController@show')->name("musicsource.show");

Route::get('/music', 'App\Http\Controllers\MusicController@index')->name("music.index");
Route::get('/piece/{id}', 'App\Http\Controllers\MusicController@show')->name("music.show");

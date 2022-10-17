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

Route::get(
    '/',
    'App\Http\Controllers\HomeController@index'
)->name("home.index");

Route::get(
    '/composers',
    'App\Http\Controllers\ComposerController@index'
)->name("composer.index");

Route::get(
    '/composer/{id}',
    'App\Http\Controllers\ComposerController@show'
)->name("composer.show");

Route::get(
    '/styles',
    'App\Http\Controllers\StyleController@index'
)->name("style.index");

Route::get(
    '/style/{id}',
    'App\Http\Controllers\StyleController@show'
)->name("style.show");

Route::get(
    '/concerts',
    'App\Http\Controllers\ConcertController@index'
)->name("concert.index");

Route::get(
    '/concert/{id}',
    'App\Http\Controllers\ConcertController@show'
)->name("concert.show");

Route::get(
    '/musicsources',
    'App\Http\Controllers\MusicsourceController@index'
)->name("musicsource.index");

Route::get(
    '/musicsource/{id}',
    'App\Http\Controllers\MusicsourceController@show'
)->name("musicsource.show");

Route::get(
    '/music',
    'App\Http\Controllers\MusicController@index'
)->name("music.index");

Route::get(
    '/piece/{id}',
    'App\Http\Controllers\MusicController@show'
)->name("music.show");

Route::get(
    '/admin',
    'App\Http\Controllers\Admin\AdminHomeController@index'
)->name('admin.home.index');

Route::get(
    '/admin/composers',
    'App\Http\Controllers\Admin\AdminComposerController@index'
)->name('admin.composer.index');

Route::post(
    '/admin/composers/store',
    'App\Http\Controllers\Admin\AdminComposerController@store'
)->name('admin.composer.store');

Route::get(
    '/admin/composers/{id}/edit}',
    'App\Http\Controllers\Admin\AdminComposerController@edit'
)->name('admin.composer.edit');

Route::put(
    '/admin/composers/{id}/update}',
    'App\Http\Controllers\Admin\AdminComposerController@update'
)->name('admin.composer.update');

Route::delete(
    '/admin/composers/{id}/delete}',
    'App\Http\Controllers\Admin\AdminComposerController@delete'
)->name('admin.composer.delete');

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

/*
 *      Admin Panel Route
 */

Route::get(
    '/admin',
    'App\Http\Controllers\Admin\AdminHomeController@index'
)->name('admin.home.index');

/*
 *      Composers Admin Panel Routes
 */

Route::get(
    '/admin/composers',
    'App\Http\Controllers\Admin\AdminComposerController@index'
)->name('admin.composer.index');

Route::post(
    '/admin/composers/store',
    'App\Http\Controllers\Admin\AdminComposerController@store'
)->name('admin.composer.store');

Route::get(
    '/admin/composers/{id}/edit',
    'App\Http\Controllers\Admin\AdminComposerController@edit'
)->name('admin.composer.edit');

Route::put(
    '/admin/composers/{id}/update',
    'App\Http\Controllers\Admin\AdminComposerController@update'
)->name('admin.composer.update');

Route::delete(
    '/admin/composers/{id}/delete',
    'App\Http\Controllers\Admin\AdminComposerController@delete'
)->name('admin.composer.delete');

/*
 *      Musical Styles Admin Panel Routes
 */

Route::get(
    '/admin/styles',
    'App\Http\Controllers\Admin\AdminStyleController@index'
)->name('admin.style.index');

Route::post(
    '/admin/styles/store',
    'App\Http\Controllers\Admin\AdminStyleController@store'
)->name('admin.style.store');

Route::get(
    '/admin/styles/{id}/edit',
    'App\Http\Controllers\Admin\AdminStyleController@edit'
)->name('admin.style.edit');

Route::put(
    '/admin/styles/{id}/update',
    'App\Http\Controllers\Admin\AdminStyleController@update'
)->name('admin.style.update');

Route::delete(
    '/admin/styles/{id}/delete}',
    'App\Http\Controllers\Admin\AdminStyleController@delete'
)->name('admin.style.delete');

/*
 *      Music Admin Panel Routes
 */

Route::get(
    '/admin/music',
    'App\Http\Controllers\Admin\AdminMusicController@index'
)->name('admin.music.index');

Route::post(
    '/admin/music/store',
    'App\Http\Controllers\Admin\AdminMusicController@store'
)->name('admin.music.store');

Route::get(
    '/admin/music/{id}/edit',
    'App\Http\Controllers\Admin\AdminMusicController@edit'
)->name('admin.music.edit');

Route::put(
    '/admin/music/{id}/update',
    'App\Http\Controllers\Admin\AdminMusicController@update'
)->name('admin.music.update');

Route::delete(
    '/admin/music/{id}/delete}',
    'App\Http\Controllers\Admin\AdminMusicController@delete'
)->name('admin.music.delete');

/*
 *      Concerts Admin Panel Routes
 */

Route::get(
    '/admin/concert',
    'App\Http\Controllers\Admin\AdminConcertController@index'
)->name('admin.concert.index');

Route::post(
    '/admin/concert/store',
    'App\Http\Controllers\Admin\AdminConcertController@store'
)->name('admin.concert.store');

Route::get(
    '/admin/concert/{id}/edit',
    'App\Http\Controllers\Admin\AdminConcertController@edit'
)->name('admin.concert.edit');

Route::put(
    '/admin/concert/{id}/update',
    'App\Http\Controllers\Admin\AdminConcertController@update'
)->name('admin.concert.update');

Route::delete(
    '/admin/concert/{id}/delete',
    'App\Http\Controllers\Admin\AdminConcertController@delete'
)->name('admin.concert.delete');

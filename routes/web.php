<?php

use App\Http\Controllers\EventController;
use App\Http\Controllers\SongController;
use App\Http\Controllers\PhotoController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
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

Auth::routes();

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/repertoire', [SongController::class, 'index']);
Route::get('/song/{song:id}', [SongController::class, 'show']);
Route::resource('song', SongController::class);


Route::resource('photo', PhotoController::class);

Route::get('/events', [EventController::class, 'index']);
Route::resource('event', EventController::class);

//repertoire -> song
//         |
//         V
//          -> playlists -> playlist
//photo albums -> photoAlbum -> photo
//events -> event





<?php

use App\Http\Controllers\EventController;
use App\Http\Controllers\PlaylistController;
use App\Http\Controllers\PhotoAlbumController;
use App\Http\Controllers\SongController;
use App\Http\Controllers\PhotoController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

Auth::routes();

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::resource('songs', SongController::class);
Route::post('songs/{song:id}/favourite', [SongController::class, 'favourite'])->name('song.favourite');
Route::get('favourites', [SongController::class, 'showFavourites'])->name('favourites');

Route::resource('playlists', PlaylistController::class);

Route::resource('photos', PhotoController::class);

Route::resource('PhotoAlbums', PhotoAlbumController::class);

Route::resource('events', EventController::class);





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

Route::group(['middleware' => 'auth'], function () {
    Route::resource('songs', SongController::class);
});

Route::group(['middleware' => 'auth'], function () {
    Route::post('songs/{song:id}/favourite', [SongController::class, 'favourite'])->name('song.favourite');
});

Route::group(['middleware' => 'auth'], function () {
    Route::get('favourites', [SongController::class, 'showFavourites'])->name('favourites');
});

Route::group(['middleware' => 'auth'], function () {
    Route::resource('playlists', PlaylistController::class);
});

Route::group(['middleware' => 'auth'], function () {
    Route::resource('photos', PhotoController::class);
});

Route::group(['middleware' => 'auth'], function () {
    Route::resource('PhotoAlbums', PhotoAlbumController::class);
});

Route::resource('events', EventController::class);





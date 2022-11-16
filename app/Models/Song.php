<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Song extends Model
{
    protected $fillable = [
        'name',
        'artist',
        'album',
        'song_text',
        'song_text_dutch',
        'cover_art',
        'path_0',
        'path_1',
        'path_2',
        'path_3',
        'path_4',
        'path_5',
        'active'
    ];

    public static function sortAZ(): \Illuminate\Database\Eloquent\Collection|array
    {
        return Song::All()->sortBy('name');
    }

    public static function sortZA(): \Illuminate\Database\Eloquent\Collection|array
    {
        return Song::All()->sortByDesc('name');
    }
use HasFactory;
}

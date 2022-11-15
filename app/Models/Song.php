<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Song extends Model
{
    protected $fillable = ['name', 'artist', 'album', 'song_text', 'song_text_dutch', 'cover_art', 'path', 'path_instrumental', 'path_contralto', 'path_soprano','path_tenor', 'path_bass', 'active'];

    use HasFactory;
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Song extends Model
{
    use HasFactory;

    protected $table = 'songs';
    protected $fillable = [
        'title',
        'artist',
        'album',
        'genre',
        'public',
        'path_song_text',
        'path_song_text_dutch',
        'path_sheets',
        'path_directions',
        'path_cover_art',
        'path_track',
        'path_track_instrumental',
        'path_track_soprano',
        'path_track_contralto',
        'path_track_tenor',
        'path_track_bass'
    ];

    public function playlists(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(Playlist::class, 'playlist_song', 'song_id', 'playlist_id');
    }

    public static function sortAZ(): \Illuminate\Database\Eloquent\Collection|array
    {
        return Song::All()->sortBy('title');
    }

    public static function sortZA(): \Illuminate\Database\Eloquent\Collection|array
    {
        return Song::All()->sortByDesc('title');
    }
}

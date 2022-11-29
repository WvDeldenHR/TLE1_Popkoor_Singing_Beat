<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Playlist extends Model
{
    protected $fillable = [
        'title',
        'description',
        'public_private',
        'user_id'
    ];

    public function tracks(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(Song::class, 'playlist_track', 'playlist_id', 'song_id');
    }

    public static function sortAZ(): \Illuminate\Database\Eloquent\Collection|array
    {
        return Playlist::All()->sortBy('title');
    }

    public static function sortZA(): \Illuminate\Database\Eloquent\Collection|array
    {
        return Playlist::All()->sortByDesc('title');
    }

    use HasFactory;
}

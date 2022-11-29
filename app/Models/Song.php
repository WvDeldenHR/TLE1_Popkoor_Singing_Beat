<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

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
        'active',
        'genre'
    ];

    public function scopeFilter($query, array $filters)
    {
        if ($filters['search'] ?? false) {
            $query->where('name', 'like', '%' . request('search') . '%')
                ->orWhere('artist', 'like', '%' . request('search') . '%')
                ->orWhere('genre', 'like', '%' . request('search') . '%');
        }
    }

    public function playlists(): BelongsToMany
    {
        return $this->belongsToMany(Playlist::class, 'playlist_track', 'track_id', 'playlist_id');
    }

    use HasFactory;
}

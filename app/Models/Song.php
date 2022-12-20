<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Maize\Markable\Markable;
use Maize\Markable\Models\Favorite;

class Song extends Model
{
    use HasFactory;

    protected $table = 'songs';
    use markable;

    protected static array $marks = [
        Favorite::class,
    ];

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

    public function scopeFilter($query, array $filters)
    {
        if ($filters['search'] ?? false) {
            $query->where('title', 'like', '%' . request('search') . '%')
                ->orWhere('artist', 'like', '%' . request('search') . '%')
                ->orWhere('genre', 'like', '%' . request('search') . '%');
        }
    }

    public function playlists(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(Playlist::class, 'song_playlist', 'song_id', 'playlist_id');
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

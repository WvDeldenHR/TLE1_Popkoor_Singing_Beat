<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class playlist extends Model
{
    use HasFactory;

    protected $table = 'playlists';
    protected $fillable = [
        'title',
        'description',
    ];

    public function songs(): BelongsToMany
    {
        return $this->belongsToMany(Song::class, 'playlist_track', 'playlist_id', 'song_id');
    }
}

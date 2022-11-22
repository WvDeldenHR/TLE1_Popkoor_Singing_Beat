<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Maize\Markable\Markable;
use Maize\Markable\Models\Favorite;

class Song extends Model
{
    use markable;

    protected static array $marks = [
        Favorite::class,
    ];

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
    use HasFactory;
}

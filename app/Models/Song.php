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

    public function scopeFilter($query, array $filters){
        if ($filters['search'] ?? false){
            $query-> where('name', 'like', '%' . request('search') . '%');
            $query-> orWhere('artist', 'like', '%' . request('search') . '%');
        }
    }

    use HasFactory;
}

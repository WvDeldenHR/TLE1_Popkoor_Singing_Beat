<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class PhotoAlbum extends Model
{
    use HasFactory;

    protected $table = 'albums';
    protected $fillable = [
        'title',
        'description',
        'public',
    ];

    public function photos(): HasMany
    {
//        return $this->hasMany(Photo::class);
//        In case above statement doesn't work we could try the option below
        return $this->hasMany(Photo::class, 'album_id');
    }
}

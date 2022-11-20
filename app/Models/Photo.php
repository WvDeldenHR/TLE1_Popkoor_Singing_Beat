<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    use HasFactory;

    protected $table = 'photos';
    protected $fillable = [
        'path',
    ];

    public function album(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(PhotoAlbum::class);
//        In case above statement doesn't work we could try the option below
//        return $this->hasMany(PhotoAlbum::class, 'album_id');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Song extends Model
{
    protected $fillable = [
        'artist_id',
        'album_id',
        'title',
        'duration',
        'song_cover',
        'song_source'
    ];

    
    public function artist(){return $this->belongsToMany(Artist::class);}
    public function album(){return $this->belongsToMany(Album::class);}
}

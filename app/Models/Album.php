<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
    protected $fillable = [
        'artist_id',
        'title',
        'album_cover'
    ];


    public function artist(){return $this->belongsToMany(Artist::class);}
    public function songs(){return $this->hasMany(Song::class);}
}

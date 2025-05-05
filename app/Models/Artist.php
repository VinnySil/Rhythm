<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Artist extends Model
{
    protected $fillable = [
        'user_id',
        'name',
        'email'
    ];

    public function getRouteKeyName(){return 'name';}

    public function user(){return $this->belongsTo(User::class);}
    public function albums(){return $this->hasMany(Album::class);}
    public function songs(){return $this->hasMany(Song::class);}
    
}

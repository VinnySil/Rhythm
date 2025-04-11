<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Artist extends Model
{
    protected $fillable = ['name'];

    public function getRouteKeyName(){return 'name';}

    public function user(){return $this->belongsTo(User::class);}
    
}

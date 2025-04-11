<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ArtistRequest extends Model
{
    protected $fillable = [
        'stage_name',
        'user_id',
        'professional_email',
        'music_file',
    ];
}

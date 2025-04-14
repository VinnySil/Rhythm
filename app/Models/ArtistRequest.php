<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class ArtistRequest extends Model
{
    protected $fillable = [
        'stage_name',
        'user_id',
        'professional_email',
        'music_file',
    ];

    public function getFormattedDate($field){
        return isset($this->$field) ? Carbon::parse($this->$field)->format('d/m/Y') : 'N/A';
    }
}

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
        'title',
        'status'
    ];


    public function user(){return $this->belongsTo(User::class);}

    public function getFormattedDate($field){
        return isset($this->$field) ? Carbon::parse($this->$field)->format('d/m/Y') : 'N/A';
    }
}

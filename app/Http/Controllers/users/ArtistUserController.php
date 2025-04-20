<?php

namespace App\Http\Controllers\users;

use App\Http\Controllers\Controller;
use App\Models\Artist;
use Illuminate\Http\Request;

class ArtistUserController extends Controller
{
    public function index(Artist $artist){

        return view('artists.dashboard');

    }
}

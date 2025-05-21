<?php

namespace App\Http\Controllers\users;

use App\Http\Controllers\Controller;
use App\Models\Artist;
use Illuminate\Http\Request;

class ArtistUserController extends Controller
{
    public function index(){

        $user = auth()->user();
        $artist = auth()->user()->artist;
        $songs = $artist->songs()->latest()->take(5)->get();
        $albums = $artist->albums()->latest()->take(5)->get();

        return view('artists.dashboard', compact('user', 'songs', 'albums', 'artist'));
    }

    public function songList(Artist $artist){
        $songs = $artist->songs;
        return view('artists.songs', compact('songs'));
    }

    public function albumList(Artist $artist){
        $albums = $artist->albums;
        return view('artists.albums', compact('albums', 'artist'));
    }
}

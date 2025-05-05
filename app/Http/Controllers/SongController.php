<?php

namespace App\Http\Controllers;

use App\Models\Song;
use Illuminate\Http\Request;

class SongController extends Controller
{
    public function index(Request $request){

        //validación de los datos del formulario de filtro
        // $request->validate([
        //    'searcher' => 'nullable|string|max:30',
        // ]);

        // $searcher = $request->input('searcher');

        // //init querry
        // $query = Album::query();
        // //aplicamos los filtros a cada parametro que nos llega
        // if(!empty($searcher)) {$query->where('title', 'like', '%'.$searcher.'%');}

        // $albums = $query->paginate(3);
        $songs = Song::all();
        return view('songs.index', compact('songs'));
    }

    public function create(){

        $albums = auth()->user()->artist->albums;

        return view('songs.create', compact('albums'));
    }

    public function store(Request $request){
        
        $request->validate([
            'title' => 'required|string|max:30',
            'song-cover-input' => 'nullable|image|mimes:jpeg,png,jpg,gif',
            'music-artist-file' => 'required|file|mimes:mp3,wav,flac|max:10240', // máximo 10MB
            'albums' => 'required|string'
        ]);

        $artist = auth()->user()->artist;
        $duration = '00:00';

        



    }
}

<?php

namespace App\Http\Controllers;

use App\Models\ArtistRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ArtistRequestController extends Controller
{
    public function formRequest(){
        return view('artists.artist-request-form');
    }


    public function submitRequest(Request $request){

        //validación de los datos del formulario
        $request->validate([
            'stage_name' => 'required|string|max:255',
            'professional_email' => 'required|email|max:255',
            'music-artist-file' => 'required|file|mimes:mp3,wav,flac|max:10240', // máximo 10MB
        ]);

        $songFile = $request->file('music-artist-file');
        $songName = time().'.'.$songFile->getClientOriginalExtension();
        $songFile->move(public_path('artists-request/songs/'), $songName);

        // Crear la solicitud de artista
        ArtistRequest::create([
            'stage_name' => $request->stage_name,
            'user_id' => Auth::user()->id,
            'professional_email' => $request->professional_email,
            'music_file' => $songName,
        ]);

        return redirect()->route("artist.request.success");
    }


    public function successPage(){
        return view('artists.success-request');
    }
}

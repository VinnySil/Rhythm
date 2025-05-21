<?php

namespace App\Http\Controllers;

use App\Models\Artist;
use App\Models\ArtistRequest;
use App\Models\Song;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ArtistRequestController extends Controller
{


    public function index(Request $request){

        $artistRequests = ArtistRequest::all();
        return view('artistRequests.index',  compact('artistRequests'));
    }

    public function show(ArtistRequest $artistRequest){

        $user = $artistRequest->user;

        return view('artistRequests.show',  compact('artistRequest', 'user'));;
    }


    public function destroy(ArtistRequest $artistRequest){
        
        if(Storage::disk('private')->exists($artistRequest->music_file))
            Storage::disk('private')->delete($artistRequest->music_file);

        $artistRequest->delete();

        return redirect()->route('artistRequests.index');
    }

    public function formRequest(){
        return view('artists.artist-request-form');
    }


    public function submitRequest(Request $request){

        //validación de los datos del formulario
        $request->validate([
            'stage_name' => 'required|string|max:255',
            'professional_email' => 'required|email|max:255',
            'title' => 'required|string|max:255',
            'music-artist-file' => 'required|file|mimes:mp3,wav,flac|max:10240', // máximo 10MB
        ]);

        $path = $request->file('music-artist-file')->store('music_files_requests', 'private');

        // Crear la solicitud de artista
        ArtistRequest::create([
            'stage_name' => $request->stage_name,
            'user_id' => Auth::user()->id,
            'professional_email' => $request->professional_email,
            'title' => $request->title,
            'music_file' => $path,
        ]);

        return redirect()->route("artist.request.success");
    }


    public function streamSong(Song $song){

        $path = storage_path('app/private/'.$song->song_source);

        if(!file_exists($path))
            abort(404);

        return response()->file($path, [
            'Content-Type' => 'audio/mpeg',
            'Content-Disposition' => 'inline; filename="track.mp3"',
        ]);

    }

    public function acceptRequest(ArtistRequest $artistRequest){

        $artistRequest->status = 'accepted';
        $artistRequest->save();

        Artist::create([
            'user_id' => $artistRequest->user_id,
            'name' => $artistRequest->stage_name,
            'email' => $artistRequest->professional_email
        ]);

        return redirect()->route("artistRequests.index");

    }

    public function rejectRequest(ArtistRequest $artistRequest){

        $artistRequest->status = 'rejected';
        $artistRequest->save();
        return redirect()->route("artistRequests.index");
    }


    public function successPage(){
        return view('artists.success-request');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Album;
use App\Models\Song;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\ImageManager;

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

    public function show(Song $song){
        $artist = $song->artist;
        return view('songs.show', compact('song', 'artist'));
    }

    public function create(){

        $user = auth()->user();

        if($user->rol === 'admin' ){
             $albums = Album::all();
        }
        else if($user->artist){
            $albums = auth()->user()->artist->albums;
        }
        else
            return redirect()->route("home");

        return view('songs.create', compact('albums'));
    }

    public function store(Request $request){

        $user = auth()->user();

        if($user->rol !== 'admin' && $user->artist === null)
            return redirect()->route("home");

        $request->validate([
            'title' => 'required|string|max:30',
            'song-cover-input' => 'nullable|image|mimes:jpeg,png,jpg,gif',
            'music-artist-file' => 'required|file|mimes:mp3,wav,flac|max:10240', // máximo 10MB
            'albums' => 'required|string'
        ]);

        $artist = auth()->user()->artist;
        $song_source_path = $request->file('music-artist-file')->store('songs', 'private');

        $song = Song::create([
            'artist_id' => $artist->id,
            'album_id' => $request->input('albums'),
            'title' => $request->input('title'),
            'duration' => 0,
            'song_cover' => 'default_cover.png',
            'song_source' => $song_source_path,
        ]);

        if($request->has('song-cover-input')){

            $file = $request->file('song-cover-input');
            $filename = time().".".$file->getClientOriginalExtension();
            $file->move(storage_path("app/public/img/musics/covers/"), $filename);

            $imgManager = new ImageManager(new Driver());
            $profilePhoto = $imgManager->read(storage_path("app/public/img/musics/covers/").$filename);

            $profilePhoto->resize(300,300);

            $profilePhoto->save(storage_path("app/public/img/musics/covers/").$filename);

            //Actualizo el nombre de la foto en la base de datos
            $song->song_cover = $filename;
            //Guardo los cambios y vuelvo a la página del usuario
            $song->save();
        }

        if($user->rol === 'admin' ){
            return redirect()->route("songs.index");
        }
        else if($user->artist){
            return redirect()->route("artist.dashboard");
        }

        
    }

    public function edit(Song $song){

        $user = auth()->user();
        if($user->rol !== 'admin' && $user->artist === null)
            return redirect()->route("home");

        return view('songs.edit', compact('song'));
    }

    public function update(Request $request, Song $song){

        $user = auth()->user();

        if($user->rol !== 'admin' && $user->artist === null)
            return redirect()->route("home");

        $request->validate([
            'title' => 'required|string|max:30',
            'song-cover-input' => 'nullable|image|mimes:jpeg,png,jpg,gif',
        ]);

        if($request->has('song-cover-input')){
            if($song->song_cover){
                $oldCover = public_path('storage/img/musics/covers/'.$song->song_cover);
                $file = File::delete($oldCover);
            }

            $song->update($request->all());

            $file = $request->file('song-cover-input');
            $filename = time().".".$file->getClientOriginalExtension();
            $file->move(storage_path("app/public/img/musics/covers/"), $filename);

            $imgManager = new ImageManager(new Driver());
            $profilePhoto = $imgManager->read(storage_path("app/public/img/musics/covers/").$filename);

            $profilePhoto->resize(300,300);

            $profilePhoto->save(storage_path("app/public/img/musics/covers/").$filename);

            //Actualizo el nombre de la foto en la base de datos
            $song->song_cover = $filename;
            //Guardo los cambios y vuelvo a la página de la musica
            $song->save();
            return redirect()->route("songs.show", $song);
        }

        $song->update($request->all());
        $song->save();

        if($user->rol === 'admin' ){
            return redirect()->route("songs.show", $song);
        }
        else if($user->artist){
            return redirect()->route("artist.dashboard");
        }

    }

    public function destroy(Song $song){
        
        $user = auth()->user();
        if($user->rol !== 'admin' && $user->artist === null)
            return redirect()->route("home");

        $song->delete();

        if($user->rol === 'admin' ){
            return redirect()->route('songs.index');
        }
        else if($user->artist){
            return redirect()->route("artist.dashboard");
        }  
    }
}

<?php

namespace App\Http\Controllers;

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

        return redirect()->route("songs.index");
    }

    public function edit(Song $song){
        return view('songs.edit', compact('song'));
    }

    public function update(Request $request, Song $song){

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
        return redirect()->route("songs.show", $song);

    }

    public function destroy(Song $song){
        $song->delete();
        return redirect()->route('songs.index');
    }
}

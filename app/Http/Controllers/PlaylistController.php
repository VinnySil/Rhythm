<?php

namespace App\Http\Controllers;

use App\Models\Playlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\ImageManager;

class PlaylistController extends Controller
{
    public function index(){
        $playlists = Playlist::all();
        return view('playlists.index', compact('playlists'));
    }

    public function create(){
        return view('playlists.create');
    }

    public function store(Request $request){
        $request->validate([
            'name' => 'required|string|max:30',
            'playlist-cover-input' => 'nullable|image|mimes:jpeg,png,jpg,gif'
        ]);

        $user = auth()->user();
        //Hago primero una asignacion masiva para poder tener todos los campos actualizados
        $playlist = Playlist::create(
            [
                'user_id' => $user->id,
                'name' => $request->input('title'),
                'playlist_cover' => 'album_cover_default.webp'
            ]
        );

        $playlist->update($request->all());
        //Guardo la nueva portada 
        $file = $request->file("playlist-cover-input");
        $filename = time().".".$file->getClientOriginalExtension();
        $file->move(storage_path("app/public/img/playlists/covers/"), $filename);

        $imgManager = new ImageManager(new Driver());
        $profilePhoto = $imgManager->read(storage_path("app/public/img/playlists/covers/").$filename);

        $profilePhoto->resize(300,300);

        $profilePhoto->save(storage_path("app/public/img/playlists/covers/").$filename);

        //Actualizo el nombre de la foto en la base de datos
        $playlist->playlist_cover = $filename;
        //Guardo los cambios y vuelvo a la página del usuario
        $playlist->save();
        return redirect()->route("playlists.show", $playlist);
    }

    public function edit(Playlist $playlist){
        $songs = $playlist->songs;
        return view('playlists.edit', compact('playlist', 'songs'));
    }

    public function update(Request $request, Playlist $playlist){
        $request->validate([
            'name' => 'required|string|max:30',
            'playlist-cover-input' => 'nullable|image|mimes:jpeg,png,jpg,gif'
        ]);
        
        if($request->has('playlist-cover-input')){
            if($playlist->playlist_cover){
                $oldCover = public_path('storage/img/playlists/covers/'.$playlist->playlist_cover);
                $file = File::delete($oldCover);
            }

           $playlist->update($request->all());
           //Guardo la nueva portada 
           $file = $request->file("playlist-cover-input");
           $filename = time().".".$file->getClientOriginalExtension();
           $file->move(storage_path("app/public/img/playlists/covers/"), $filename);

           $imgManager = new ImageManager(new Driver());
           $profilePhoto = $imgManager->read(storage_path("app/public/img/playlists/covers/").$filename);

           $profilePhoto->resize(300,300);

           $profilePhoto->save(storage_path("app/public/img/playlists/covers/").$filename);

           //Actualizo el nombre de la foto en la base de datos
           $playlist->playlist_cover = $filename;
           //Guardo los cambios y vuelvo a la página del usuario
           $playlist->save();
           return redirect()->route("playlists.show", $playlist);
        }

        $playlist->update($request->all());
        $playlist->save();
        return redirect()->route("playlists.show", $playlist);
    }

    public function destroy(Playlist $playlist){
        $playlist->delete();
        return redirect()->route('playlists.index');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Album;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\ImageManager;

class AlbumController extends Controller
{
    //

    public function index(Request $request){

        //validación de los datos del formulario de filtro
        $request->validate([
           'searcher' => 'nullable|string|max:30',
        ]);

        $searcher = $request->input('searcher');

        //init querry
        $query = Album::query();
        //aplicamos los filtros a cada parametro que nos llega
        if(!empty($searcher)) {$query->where('title', 'like', '%'.$searcher.'%');}

        $albums = $query->paginate(3);

        return view('albums.index', compact('albums'));
    }

    public function create(){

        $user = auth()->user();

        if($user->rol !== 'admin' && $user->artist === null)
            return redirect()->route("home");

        return view('albums.create');
    }

    public function store(Request $request){

        $user = auth()->user();

        if($user->rol !== 'admin' && $user->artist === null)
            return redirect()->route("home");

        $request->validate([
            'title' => 'required|string|max:30',
            'album-cover-input' => 'nullable|image|mimes:jpeg,png,jpg,gif'
        ]);

        $artist = auth()->user()->artist;

        //Hago primero una asignacion masiva para poder tener todos los campos actualizados
        $album = Album::create(
            [
                'artist_id' => $artist->id,
                'title' => $request->input('title'),
                'album_cover' => 'album_cover_default.webp'
            ]
        );

        if($request->has('album-cover-input')){
            //Guardo la nueva portada 
            $file = $request->file("album-cover-input");
            $filename = time().".".$file->getClientOriginalExtension();
            $file->move(storage_path("app/public/img/albums/covers/"), $filename);

            $imgManager = new ImageManager(new Driver());
            $profilePhoto = $imgManager->read(storage_path("app/public/img/albums/covers/").$filename);

            $profilePhoto->resize(300,300);

            $profilePhoto->save(storage_path("app/public/img/albums/covers/").$filename);

            //Actualizo el nombre de la foto en la base de datos
            $album->album_cover = $filename;
            //Guardo los cambios y vuelvo a la página del usuario
            $album->save();
        }

        return redirect()->route("albums.index");
    }

    public function edit(Album $album){
        $user = auth()->user();

        if($user->rol !== 'admin' && $user->artist === null)
            return redirect()->route("home");
        
        return view('albums.edit', compact('album'));
    }

    public function update(Request $request, Album $album){

        $user = auth()->user();

        if($user->rol !== 'admin' && $user->artist === null)
            return redirect()->route("home");

        $request->validate([
            'title' => 'required|string|max:30',
            'album-cover-input' => 'nullable|image|mimes:jpeg,png,jpg,gif'
        ]);

        if($request->has('album-cover-input')){
            if($album->album_cover){
                $oldCover = public_path('storage/img/albums/covers/'.$album->album_cover);
                $file = File::delete($oldCover);
            }

            $album->update($request->all());
           //Guardo la nueva portada 
           $file = $request->file("album-cover-input");
           $filename = time().".".$file->getClientOriginalExtension();
           $file->move(storage_path("app/public/img/albums/covers/"), $filename);

           $imgManager = new ImageManager(new Driver());
           $profilePhoto = $imgManager->read(storage_path("app/public/img/albums/covers/").$filename);

           $profilePhoto->resize(300,300);

           $profilePhoto->save(storage_path("app/public/img/albums/covers/").$filename);

           //Actualizo el nombre de la foto en la base de datos
           $album->album_cover = $filename;
           //Guardo los cambios y vuelvo a la página del usuario
           $album->save();
           return redirect()->route("albums.show", $album);
        }

        $album->update($request->all());
        $album->save();
        return redirect()->route("albums.show", $album);
    }

    public function destroy(Album $album){

        $user = auth()->user();
        if($user->rol !== 'admin' && $user->artist === null)
            return redirect()->route("home");

        $album->delete();
        return redirect()->route('albums.index');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Album;
use Illuminate\Http\Request;
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
        return view('albums.create');
    }

    public function store(Request $request){
        $request->validate([
            'title' => 'required|string|max:30',
            'album-cover-input' => 'nullable|image|mimes:jpeg,png,jpg,gif'
        ]);

        $artist = auth()->user()->artist;

        // if(!$artist)

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
            $prueba = $file->move(storage_path("app/public/img/albums/covers/"), $filename);

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
}

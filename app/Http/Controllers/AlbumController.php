<?php

namespace App\Http\Controllers;

use App\Models\Album;
use Illuminate\Http\Request;

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
}

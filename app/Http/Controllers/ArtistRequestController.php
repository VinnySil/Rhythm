<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ArtistRequestController extends Controller
{
    public function formRequest(){
        return view('artists.artist-request-form');
    }


    public function submitRequest(Request $request){

        //validación de los datos del formulario
        $request->validate([
           'searcher' => 'nullable|string|max:30',
        ]);
    }
}

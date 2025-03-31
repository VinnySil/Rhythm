<?php

namespace App\Http\Controllers\users;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //validación de los datos del formulario de filtro
        $request->validate([
           'searcher' => 'nullable|string|max:30',
        ]);

        $searcher = $request->input('searcher');

        //init querry
        $query = User::query();
        //aplicamos los filtros a cada parametro que nos llega
        if(!empty($searcher)) {$query->where('name', 'like', '%'.$searcher.'%');}
        if(!empty($nick)) {$query->where('nick', 'like', '%'.$searcher.'%');}
        if(!empty($rol)) {$query->where('rol', 'like', '%'.$searcher.'%');}

        $users = $query->paginate(3);

        return view('users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        //
    }
}

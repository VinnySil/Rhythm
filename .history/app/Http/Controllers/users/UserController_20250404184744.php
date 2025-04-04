<?php

namespace App\Http\Controllers\users;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\ImageManager;

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
        // if(!empty($searcher)) {$query->where('nick', 'like', '%'.$searcher.'%');}
        // if(!empty($searcher)) {$query->where('rol', 'like', '%'.$searcher.'%');}
        if(!empty($searcher)) {$query->where('name', 'like', '%'.$searcher.'%');}

        $users = $query->paginate(3);

        return view('users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //validamos los datos que nos llega del formulario
        $request->validate([
            'name' => 'required|string|max:30',
            'nick' => 'required|string|max:30|unique:users',
            'email' => 'required|string|email|max:255|unique:users',
            'rol' => 'nullable|string',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif'
        ]);


        if(!$request->hasFile('photo')){ //Compruebo que me llega la foto nueva de usuario

            //Creo un nuevo usuario con los datos que me llegan del formulario
            //por medio de la asignación masiva
            $user = User::create($request->all());

            //Guardo los cambios y vuelvo a la página del usuario
            $user->save();

            //Mando el usuario para la página principal de los usuarios
            return redirect()->route("users.index");
        }

            //Creo un nuevo usuario con los datos que me llegan del formulario
            //por medio de la asignación masiva
            $user = User::create($request->all());

            //Guardo la nueva imagen
            $file = $request->file("photo");
            $filename = time().".".$file->getClientOriginalExtension();
            $file->move(public_path('images/profile_photos/'), $filename);

            $imgManager = new ImageManager(new Driver());
            $profilePhoto = $imgManager->read(public_path("images/profile_photos/").$filename);

            $profilePhoto->resize(300,300);

            $profilePhoto->save(public_path("images/profile_photos/").$filename);

            //Actualizo el nombre de la foto en la base de datos
            $user->photo = $filename;


            //Guardo los cambios y vuelvo a la página del usuario
            $user->save();

        //Mando el usuario para la página principal de los usuarios
        return redirect()->route("users.index");
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        return view('users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        return view('users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required|string|max:30',
            'nick' => "required|string|max:30|unique:users,nick,{$user->id}",
            'email' => "required|string|email|max:255|unique:users,email,{$user->id}",
            'old_password' => 'nullable|string|min:6|',
            'password' => 'nullable|string|min:6|',
            'rol' => 'required|string',
            'deleted' => 'required|in:0,1'
        ]);

        if($request->filled('old_password')){ //Compruebo que me llegue la contraseña antigua
            if(!Hash::check($request->old_password, $user->password)) //Compruebo que el usuario haya introducido la contraseña antigua para poder cambiarla
                return back()->withErrors(["old_password" => "La contraseña no es correcta"]);
        }//END if old_password

        if(!$request->filled('password')){
            $request->merge(['password' => $user->password]);
        }

        $user->update($request->all());
        return redirect()->route("users.show", $user);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $user->deleted = true;
        $user->save();
        return redirect()->route('users.index');
    }
}

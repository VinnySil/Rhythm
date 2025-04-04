<?php

namespace App\Http\Controllers\users;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
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
        ]);

        //Creo un nuevo usuario con los datos que me llegan del formulario
        $user = User::create($request->all());
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
            'deleted' => 'required|in:0,1',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif'
        ]);

        if($request->filled('old_password')){ //Compruebo que me llegue la contraseña antigua
            if(!Hash::check($request->old_password, $user->password)) //Compruebo que el usuario haya introducido la contraseña antigua para poder cambiarla
                return back()->withErrors(["old_password" => "La contraseña no es correcta"]);
        }//END if old_password

        if(!$request->filled('password')){ //Compruebo que me llega una contraseña a cambiar
            $request->merge(['password' => $user->password]);
        }//END if password

        if($request->hasFile('photo')){ //Compruebo que me llega la foto nueva de usuario
            if($user->photo){//Compruebo que el usuario tenga una foto de perfil antigua a borrar

                //Saco la ruta de la foto de perfil antigua
                $oldPhoto = public_path('images/profile_photos/'.$user->photo);

                //Borro la foto de perfil antigua
                $file = File::delete($oldPhoto);
            }//End if

            try {
                 //Hago primero una asignacion masiva para poder tener todos los campos actualizados
                $user->update($request->all());

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
                return redirect()->route("users.show", $user);

            } catch (\Nette\Schema\ValidationException $error) {
                return "Error en el DNI";
            }
        }//End if validaPhoto
            
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

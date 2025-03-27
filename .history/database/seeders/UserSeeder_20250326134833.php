<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //Creacion de administradores para la aplicacion

        $administrador = new User();
        
        $administrador->nick = 'admin';
        $administrador->name = 'administrador';
        $administrador->email = 'admin@example.com';
        $administrador->password = Hash::make("administrador"); //Hasheamos la contraseña
        $administrador->rol = 'admin';

        $administrador->save();


        $user = new User();
        
        $user->nick = 'admin';
        $user->name = 'user';
        $user->email = 'admin@example.com';
        $user->password = Hash::make("usuario"); //Hasheamos la contraseña
        $user->rol = 'admin';

        $user->save();


    }
}

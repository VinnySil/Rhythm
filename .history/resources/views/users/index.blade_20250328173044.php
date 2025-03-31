<x-app-layout>
    <h1>todos los usuarios:</h1>
    @foreach ($users as $user)
        {{$user->nick}} 
    @endforeach


    <x-table
    :headers="['Nombre', 'Nick', 'Correo', 'Rol', 'Creado', 'Ultima actualización']"
    :filds="['name', 'nick', 'email', 'rol', 'created_at', 'update_at']"
    :items=
    />
</x-app-layout>
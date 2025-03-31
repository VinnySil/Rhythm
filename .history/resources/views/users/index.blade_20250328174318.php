<x-app-layout>
    <h1 class="text-5xl text-white">todos los usuarios:</h1>

    @foreach ($users as $user)
        <p class="text-white">{{$user->nick}}</p>
    @endforeach

    <x-table
    :headers="['Nombre', 'Nick', 'Correo', 'Rol', 'Creado', 'Ultima actualización']"
    :fields ="['name', 'nick', 'email', 'rol', 'created_at', 'update_at']"
    :items="$users"
    />
</x-app-layout>
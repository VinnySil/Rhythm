<x-app-layout>
    <h1 class="">todos los usuarios:</h1>

    <x-table
    :headers="['Nombre', 'Nick', 'Correo', 'Rol', 'Creado', 'Ultima actualización']"
    :filds="['name', 'nick', 'email', 'rol', 'created_at', 'update_at']"
    :items="$users"
    />
</x-app-layout>
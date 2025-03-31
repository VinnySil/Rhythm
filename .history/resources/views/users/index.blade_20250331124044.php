<x-app-layout>
    <div>
        
    </div>
    <x-table
    :headers="['Nombre', 'Nick', 'Correo', 'Rol', 'Creado', 'Ultima actualización']"
    :fields="['name', 'nick', 'email', 'rol', 'created_at', 'update_at']"
    :items="$users"
    />
</x-app-layout>
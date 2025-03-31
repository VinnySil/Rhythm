<x-app-layout>
    <div>
        <x-table class=""
        :headers="['Nombre', 'Nick', 'Correo', 'Rol', 'Creado', 'Ultima actualización']"
        :fields="['name', 'nick', 'email', 'rol', 'created_at', 'update_at']"
        :items="$users"
        />
    </div>
</x-app-layout>
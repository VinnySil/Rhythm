<x-app-layout>
    <div class="p-16">

        <div>
            <a href="">Crear usuario</a>
        </div>
        <x-table
        :headers="['Actions','Nombre', 'Nick', 'Correo', 'Rol', 'Creado', 'Ultima actualización']"
        :fields="['name', 'nick', 'email', 'rol', 'created_at', 'update_at']"
        :items="$users"
        />
    </div>
</x-app-layout>
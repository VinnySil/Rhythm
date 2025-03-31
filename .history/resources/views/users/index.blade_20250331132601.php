<x-app-layout>
    <div class="p-16">

        <div class="text-white flex">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v6m3-3H9m12 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
              </svg>              
            <a href="">Crear usuario</a>
        </div>
        <x-table
        :headers="['Actions','Nombre', 'Nick', 'Correo', 'Rol', 'Creado', 'Ultima actualización']"
        :fields="['name', 'nick', 'email', 'rol', 'created_at', 'update_at']"
        :items="$users"
        />
    </div>
</x-app-layout>
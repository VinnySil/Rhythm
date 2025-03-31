<x-app-layout>
    <div class="p-16">

        <div class="text-white ">             
            <a href="" class="flex gap-1 bg-[#FF73A6] p-2">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                </svg> 
                Crear usuario
            </a>
        </div>
        <x-table
        :headers="['Actions','Nombre', 'Nick', 'Correo', 'Rol', 'Creado', 'Ultima actualización']"
        :fields="['name', 'nick', 'email', 'rol', 'created_at', 'update_at']"
        :items="$users"
        />
    </div>
</x-app-layout>
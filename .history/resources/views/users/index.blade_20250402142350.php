<x-app-layout>
    <div class="p-16">
        <div class="text-white mb-10 flex justify-between">             
            <a href={{ route('users.create')}} class="flex gap-1 bg-[#FF73A6] py-2 px-4 w-fit hover:bg-pink-400 transition-colors rounded-lg">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                </svg> 
                Crear usuario
            </a>

            <form method="GET" action={{ route('users.index')}} id="searcher-container" class="flex bg-slate-800 rounded-2xl px-4 justify-center items-center">
                <button>
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />
                    </svg>
                </button>
                <input type="text" placeholder="Buscar..." name="searcher" id="searcher" :value="old('name')" class="bg-slate-800 border-none focus:outline-none focus:border-transparent focus:ring-0">
            </form>
        </div>
        <x-table
        :headers="['Actions','Nombre', 'Nick', 'Correo', 'Rol', 'Creado', 'Ultima actualización']"
        :fields="['name', 'nick', 'email', 'rol', 'created_at', 'update_at']"
        :items="$users"
        :type="['users']"
        />
        <div class="mt-4">
            {{ $users->links() }}
        </div>
    </div>
    <button x-on:click.prevent="$dispatch('open-modal', 'miModal')" class="bg-blue-500 text-white p-2 rounded">
        Abrir Modal
    </button>
    
    <x-modal name="miModal">
        <div class="p-4">
            <h2 class="text-lg font-bold">Título del Modal</h2>
            <p>Este es un modal reutilizable de Laravel Breeze.</p>
            <button @click="$dispatch('close-modal', 'miModal')" class="bg-red-500 text-white p-2 rounded mt-3">
                Cerrar
            </button>
        </div>
    </x-modal>
</x-app-layout>
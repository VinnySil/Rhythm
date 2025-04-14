<x-app-layout>
    <div class="p-16 max-w-7xl mx-auto">
        <div class="text-white mb-10 flex justify-end">
            <form method="GET" action={{ route('users.index')}} id="searcher-container" class="bg-slate-800 rounded-2xl px-4 justify-center items-center hidden sm:flex">
                <button>
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />
                    </svg>
                </button>
                <input type="text" placeholder="Buscar..." name="searcher" id="searcher" :value="old('name')" class="bg-slate-800 border-none focus:outline-none focus:border-transparent focus:ring-0">
            </form>
        </div>
        <x-table
        :headers="['Acciones','Usuario', 'Nombre artistico', 'Correo profesional','Creado', 'Ultima actualización']"
        :fields="['user_id', 'stage_name', 'professional_email', 'created_at' ,'update_at']"
        :items="$artistRequests"
        :type="['artistRequests']"
        :actions="['show', 'delete']"
        />
    </div>
</x-app-layout>
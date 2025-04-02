<table class="min-w-full shadow-sm">
    <thead class="bg-gray-800 text-white">
        <tr>
            @foreach ($headers as $header)
                <th class="px-4 py-4 text-center">{{ $header }}</th>
            @endforeach
        </tr>
    </thead>
    <tbody>
        @forelse ($items as $item)
            <tr class="border-b-2">
                <td class="flex px-4 py-4 justify-center">
                    <a href={{ route($type[0].'.show', $item)}} class="w-10 hover:scale-105"><img src="{{asset('cruds/consulta.png')}}" alt="consultar ".$type[0]></a>
                    <a href={{ route($type[0].'.edit', $item)}} class="w-10 hover:scale-105"><img src="{{asset('cruds/modificar.png')}}" alt="modificar ".$type[0]></a>
                    {{-- <form method="POST" action={{ route($type[0].'.destroy', $item)}} class="w-10 hover:scale-105 cursor-pointer">
                        @csrf
                        @method('DELETE')
                        <button type="submit"><img src="{{asset('cruds/eliminar.png')}}" alt="eliminar ".$type[0]></button>
                    </form> --}}
                    <button @click="$dispatch('open-modal', 'miModal')" class="bg-blue-500 text-white p-2 rounded">
                        Abrir Modal
                    </button>
                    
                </td>
                @foreach ($fields as $field)

                    @if ($field !== 'created_at' && $field !== 'update_at')
                        <td class="px-4 py-4 text-white text-center">{{ $item->$field }}</td>
                    @endif
                @endforeach
                <td class="px-4 py-4 text-white text-center">{{ $item->getFormattedDate('created_at') }}</td>
                <td class="px-4 py-4 text-white text-center">{{ $item->getFormattedDate('updated_at') }}</td>
            </tr>
        @empty
            <tr>
                <td colspan="{{ count($headers) }}" class="text-center py-4 text-red-500 font-bold">
                    No hay registros
                </td>
            </tr>
        @endforelse
    </tbody>
</table>


<x-modal name="miModal">
    <div class="p-4">
        <h2 class="text-lg font-bold">Título del Modal</h2>
        <p>Este es un modal reutilizable de Laravel Breeze.</p>
        <button @click="$dispatch('close-modal', 'miModal')" class="bg-red-500 text-white p-2 rounded mt-3">
            Cerrar
        </button>
    </div>
</x-modal>
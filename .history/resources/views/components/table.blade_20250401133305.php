<table class="min-w-full shadow-sm">
    <thead class="bg-gray-600 text-white">
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
                    <a href={{ route($type.'.index')}} class="w-10 hover:scale-105"><img src="{{asset('cruds/consulta.png')}}" alt="consultar usuario"></a>
                    <a href={{ route('.index')}} class="w-10 hover:scale-105"><img src="{{asset('cruds/modificar.png')}}" alt="modificar usuario"></a>
                    <a href={{ route('.index')}} class="w-10 hover:scale-105"><img src="{{asset('cruds/eliminar.png')}}" alt="eliminar usuario"></a>
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
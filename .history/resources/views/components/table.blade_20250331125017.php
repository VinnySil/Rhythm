<table class="min-w-full shadow-sm">
    <thead class="bg-gray-600 text-white">
        <tr>
            @foreach ($headers as $header)
                <th class="px-4 py-4 text-center">{{ $header }}</th>
            @endforeach
        </tr>
    </thead>
    <tbody>
        <tr></tr>
        @forelse ($items as $item)
            <tr class="border-b-2">
                @foreach ($fields as $field)
                    <td class="px-4 py-4 text-white text-center">{{ $item->$field }}</td>
                @endforeach
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
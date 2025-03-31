<table class="min-w-full border-gray-300 shadow-sm">
    <thead class="bg-gray-200">
        <tr>
            @foreach ($headers as $header)
                <th class="px-4 py-2">{{ $header }}</th>
            @endforeach
        </tr>
    </thead>
    <tbody>
        @forelse ($items as $item)
            <tr class="border">
                @foreach ($fields as $field)
                    <td class="px-4 py-2 text-white">{{ $item->$field }}</td>
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
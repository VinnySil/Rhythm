<table class="min-w-full border border-gray-300 shadow-sm">
    <thead class="bg-gray-200">
        <tr>
            @foreach ($headers as $header)
                <th class="px-4 py-2 border">{{ $header }}</th>
            @endforeach
        </tr>
    </thead>
    <tbody>
        @forelse ($items as $item) @@forelse ($collection as $item)
            
        @empty
            
        @endforelse
            <tr class="border">
                @foreach ($fields as $field)
                    <td class="px-4 py-2 border">{{ $item->$field }}</td>
                @endforeach
            </tr>
        @empty
            <tr>
                <td colspan="{{ count($headers) }}" class="text-center py-4">No hay registros</td>
            </tr>
        @endforelse
    </tbody>
</table>
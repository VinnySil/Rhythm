<table class="min-w-full shadow-sm hidden xl:block">
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

                    @foreach ($actions as $action)
                        @switch($action)
                            @case('show')
                                <a href={{ route($type[0].'.show', $item)}} class="w-10 hover:scale-105"><img src="{{asset('cruds/consulta.png')}}" alt="consultar ".$type[0]></a>
                                @break
                            @case('edit')
                                <a href={{ route($type[0].'.edit', $item)}} class="w-10 hover:scale-105"><img src="{{asset('cruds/modificar.png')}}" alt="modificar ".$type[0]></a>
                                @break
                            
                            @case('delete')
                                <form data-id="{{$item->nick}}" method="POST" action={{ route($type[0].'.destroy', $item)}} class="w-10 hover:scale-105 cursor-pointer delete-user-button">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"><img src="{{asset('cruds/eliminar.png')}}" alt="eliminar ".$type[0]></button>
                                </form>
                                @break  
                        @endswitch
                    @endforeach
                </td>
                @foreach ($fields as $field)

                    @if ($field !== 'created_at' && $field !== 'update_at' && $field !== 'photo')
                        <td class="px-4 py-4 text-white text-center">{{ $item->$field }}</td>    
                    @elseif($field === 'deleted')
                        <td class="px-4 py-4 text-white text-center">{{ ($item->$field) ? 'Si' : 'No' }}</td>
                    @elseif($field === 'photo')
                        <td class="py-4 w-1/6 "><img src={{asset('profile/'.$item->$field)}} alt={{$item->$field}} class='w-1/5 m-auto'></td>
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
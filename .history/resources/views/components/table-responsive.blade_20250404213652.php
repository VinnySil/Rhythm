<div class="text-white">
    @foreach ($items as $item)
    <div class="flex">
        <div id="headers" class="border-2">
            @foreach ($headers as $header)
                <div>{{$header}}</div>
            @endforeach
        </div>
        <div id="items">
            @foreach ($fields as $field)
            @if ($field !== 'created_at' && $field !== 'update_at' && $field !== 'photo')
            <td class="px-4 py-4 text-white text-center">{{ $item->$field }}</td>    
        @elseif($field === 'deleted')
            <td class="px-4 py-4 text-white text-center">{{ ($item->$field) ? 'Si' : 'No' }}</td>
        @elseif($field === 'photo')
            <td class="py-4 w-1/6 "><img src={{asset('profile/'.$item->$field)}} alt={{$item->$field}} class='w-1/5 m-auto'></td>
        @endif
                <div>{{$item->$field}}</div>
            @endforeach
        </div>
    </div>
    @endforeach
</div>
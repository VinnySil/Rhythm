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
                    <div>{{$item->$field}}</div> 
                @elseif($field === 'deleted')
                    <div>{{ ($item->$field) ? 'Si' : 'No' }}</div>
                @elseif($field === 'photo')
                    <div class="py-4 w-1/6 "><img src={{asset('profile/'.$item->$field)}} alt={{$item->$field}} class='w-1/5 m-auto'></div>
                @endif
            @endforeach
        </div>
    </div>
    @endforeach
</div>
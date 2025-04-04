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
            <div class="flex w-">
                <a href={{ route($type[0].'.show', $item)}}><img src="{{asset('cruds/consulta.png')}}" alt="consultar ".$type[0]></a>
                <a href={{ route($type[0].'.edit', $item)}}><img src="{{asset('cruds/modificar.png')}}" alt="modificar ".$type[0]></a>
                <form data-id="{{$item->nick}}" method="POST" action={{ route($type[0].'.destroy', $item)}} class="delete-user-button">
                    @csrf
                    @method('DELETE')
                    <button type="submit"><img src="{{asset('cruds/eliminar.png')}}" alt="eliminar ".$type[0]></button>
                </form>
            </div>
        </div>
    </div>
    @endforeach
</div>
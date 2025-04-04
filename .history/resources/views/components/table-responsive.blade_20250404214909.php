<div class="text-white xl:hidden grid gap-4">
    @foreach ($items as $item)
    <div class="flex border-2">
        <div id="headers" class="">
            @foreach ($headers as $header)
                <div>{{$header}}</div>
            @endforeach
        </div>
        <div id="items">
            @foreach ($fields as $field)
                @if($field === 'deleted')
                    <div>{{ ($item->$field) ? 'Si' : 'No' }}</div>
                @elseif($field === 'created_at')
                    <div>{{ $item->getFormattedDate('created_at')}}</div>
                @elseif($field === 'update_at')
                    <div>{{ $item->getFormattedDate('update_at')}}</div>
                @elseif($field === 'photo')
                    <div class="w-1/2"><img src={{asset('profile/'.$item->$field)}} alt={{$item->$field}} class='w-1/5 m-auto'></div>
                @else
                    <div>{{$item->$field}}</div>
                @endif
            @endforeach
            <div class="flex w-24">
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
<div class="text-white">
    @foreach ($items as $item)
    <div>
        <div id="headers" class="border-2">
            @foreach ($headers as $header)
                <div>{{$header}}</div>
            @endforeach
        </div>
        <div id="items">
            @foreach ($fields as $field)
                <div>{{$item->$field}}</div>
            @endforeach
        </div>
    </div>
    @endforeach
</div>
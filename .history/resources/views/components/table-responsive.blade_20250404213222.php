<div class="text-white">
    <div id="headers">
        @foreach ($headers as $header)
            <div>{{$header}}</div>
        @endforeach
    </div>
    <div id="items">
        @foreach ($fields as $field)
            <div>{{$item->$field}}</div>
        @endforeach
    </div>
    @endforeach
</div>
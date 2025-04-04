<div class="text-white">
    <div id="headers">
        @foreach ($headers as $header)
            <div>{{$header}}</div>
        @endforeach
    </div>
    <div id="items">
        @foreach ($items as $item)
        @foreach ($fields as $field)
            <div>{{$field}}</div>
        @endforeach
        @endforeach
    </div>
</div>
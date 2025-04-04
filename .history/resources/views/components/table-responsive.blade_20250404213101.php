<div class="text-white">
    <div id="headers">
        @foreach ($headers as $header)
            <div>{{$header}}</div>
        @endforeach
    </div>
    <div id="items">
        @foreach ($items as $item)
        @foreach ($collection as $item)
            item
        @endforeach
            <div>{{$item}}</div>
        @endforeach
    </div>
</div>
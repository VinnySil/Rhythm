<div class="text-white">
    <div id="headers">
        @foreach ($headers as $header)
            <div>{{$header}}</div>
        @endforeach
    </div>
    <div id="items">
        @foreach ($items as $item)
        @foreach ($collection as $item)
            <div>{{$item}}</div>
        @endforeach
        @endforeach
    </div>
</div>
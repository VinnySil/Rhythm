<div class="text-white">
    <div id="headers">
        @foreach ($headers as $header)
            <div>{{$header}}</div>
        @endforeach
    </div>
    <div id="items">
        @foreach ($items as $header)
            <div>{{$header}}</div>
        @endforeach
    </div>
</div>
<div class="bg-[#212936] w-96 rounded-3xl p-4 text-gray-500 font-sora">
    <div class="grid justify-items-center items-stretch">
        <img src="{{asset('storage/img/musics/covers/'.$imageCover)}}" alt="song-cover" class="w-9/12 rounded-2xl">
        <div class="text-center mt-4">
            <h2 class="text-2xl text-white">{{$title}}</h2>
            <p>{{$artist}}</p>
        </div>
    </div>
    <div class="p-4">
        <div class="flex justify-between">
            <p id="currentTime">00:00</p>
            <p id="durationTime">00:00</p>
        </div>
        <input type="range" name="rangeTime" value="0" id="rangeTime" class="range-music">
        <audio id="source-music">
            <source src="{{ route('artist-request.stream', $musicSource) }}" type="audio/mpeg">
        </audio>
    </div>
    <div id="{{$musicSource->id - 1}}" class="flex justify-center items-center p-8 text-white">
        <button id="bPrev" class="cursor-pointer transition-transform ease-linear hover:scale-110 active:scale-100">
            <img src="{{asset('storage/img/musics/svg/prev.svg')}}" alt="prev button">
        </button>
        <button id="bPlay" class="text-white bg-[#C93B76] rounded-full flex content-center items-center p-2 mx-4 
                            cursor-pointer transition-transform ease-linear hover:scale-110 active:scale-100">
            <img id="imgPlay" src="{{asset('storage/img/musics/svg/play.svg')}}" alt="play button" class="w-6 h-6">             
        </button>
        <button id="bNext" class="cursor-pointer  transition-transform ease-linear hover:scale-110 active:scale-100">
            <img src="{{asset('storage/img/musics/svg/next.svg')}}" alt="next button">
        </button>
        <button id="bLoop" class="cursor-pointer  transition-transform ease-linear hover:scale-110 active:scale-100">
            <img src="{{asset('storage/img/musics/svg/loop.svg')}}" alt="loop button" class="w-6 h-6">
        </button>
          
    </div>
</div>
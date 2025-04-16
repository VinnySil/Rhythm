<div class="bg-[#212936] w-96 rounded-3xl p-4 text-gray-500 font-sora">
    <div class="grid justify-items-center items-stretch">
        <img src="{{asset('songs/covers/'.$imageCover)}}" alt="song-cover" class="w-9/12 rounded-2xl">
        <div class="text-center mt-4">
            <h2 class="text-2xl text-white">{{$title}}</h2>
            <p>{{$artist}}</p>
        </div>
    </div>
    <div class="p-4">
        <div class="flex justify-between">
            <p class="currentTime">00:00</p>
            <p class="durationTime">00:00</p>
        </div>
        <input type="range" name="rangeTime" value="0" class="range-music">
        <audio>
            <source src="{{ route('artist-request.stream', $musicSource) }}">
        </audio>
    </div>

    <div class="flex justify-center items-center p-8">
        <button id="bPrev" class="cursor-pointer transition-transform ease-linear hover:scale-110 active:scale-100">
            <svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M17.8136 14.2517L23.6953 10.9841C25.0284 10.2435 26.6666 11.2074 26.6666 12.7324V19.2676C26.6666 20.7926 25.0284 21.7566 23.6953 21.016L17.8136 17.7483C16.442 16.9863 16.442 15.0137 17.8136 14.2517Z" fill="#4D5562"/>
                <path d="M10.6666 22.6667L10.6666 9.33335" stroke="#4D5562" stroke-width="2" stroke-linecap="round"/>
                <path d="M5.33325 22.6667L5.33325 9.33335" stroke="#4D5562" stroke-width="2" stroke-linecap="round"/>
            </svg>   
        </button>
        <button id="bPlay" class="text-white bg-[#C93B76] rounded-full flex content-center items-center p-2 mx-4 
                            cursor-pointer transition-transform ease-linear hover:scale-110 active:scale-100">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
                <path fill-rule="evenodd" d="M4.5 5.653c0-1.427 1.529-2.33 2.779-1.643l11.54 6.347c1.295.712 1.295 2.573 0 3.286L7.28 19.99c-1.25.687-2.779-.217-2.779-1.643V5.653Z" clip-rule="evenodd" />
            </svg>              
        </button>
        <button id="bNext" class="cursor-pointer  transition-transform ease-linear hover:scale-110 active:scale-100">
            <svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M14.1864 14.2517L8.30466 10.9841C6.9716 10.2435 5.33337 11.2074 5.33337 12.7324V19.2676C5.33337 20.7926 6.9716 21.7566 8.30466 21.016L14.1864 17.7483C15.558 16.9863 15.558 15.0137 14.1864 14.2517Z" fill="#4D5562"/>
                <path d="M21.3334 22.6667L21.3334 9.33335" stroke="#4D5562" stroke-width="2" stroke-linecap="round"/>
                <path d="M26.6667 22.6667L26.6667 9.33335" stroke="#4D5562" stroke-width="2" stroke-linecap="round"/>
            </svg>
        </button>
        <button id="bLoop" class="cursor-pointer  transition-transform ease-linear hover:scale-110 active:scale-100">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M16.023 9.348h4.992v-.001M2.985 19.644v-4.992m0 0h4.992m-4.993 0 3.181 3.183a8.25 8.25 0 0 0 13.803-3.7M4.031 9.865a8.25 8.25 0 0 1 13.803-3.7l3.181 3.182m0-4.991v4.99" />
            </svg>
        </button>
          
    </div>
</div>
<x-app-layout>
    <form method="POST" enctype="multipart/form-data" action={{ route('songs.store')}} class="md:py-4 m-auto md:flex md:flex-col md:items-center">
        @csrf
        <div class="flex flex-col items-center gap-8">
            <div id="main-container" class="w-60 cursor-pointer">
                <img id="profile_photo" src={{asset('storage/img/musics/covers/default_cover.png')}} alt='Portada de album'>
                <input type="file" name="song-cover-input" id="photo" class="hidden">
            </div>

            <div id="title-container" class="flex flex-col gap-4">
                <x-text-input placeholder='Título de la canción' name='title'/>
                <select name="albums" id="albums" required class="bg-slate-800 dark:focus:border-pink-500 dark:active:border-pink-500 text-white">
                    <option value="-1" disabled selected hidden>Albums</option>
                    @foreach ($albums as $album)
                        <option value={{$album->id}}>{{$album->title}}</option>
                    @endforeach
                </select>
            </div>

            <div class="w-full text-[#FF73A6] flex flex-col gap-4 justify-center items-center">
                <input type="file" name="music-artist-file" id="music-artist-file" class="hidden">
                <button type="button" id="button-upload-song" class="w-64 h-36 bg-gray-900/80 flex flex-col justify-center items-center gap-4 border-2 border-dotted border-pink-400 rounded-lg">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3 16.5v2.25A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75V16.5m-13.5-9L12 3m0 0 4.5 4.5M12 3v13.5" />
                    </svg>
                    Subir canción
                </button>
                <div class="gap-8 hidden" id="file-name-container">
                    <p id="file-name-artists"></p>
                    <button id="delete-file-artists">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                        </svg>
                    </button>
                </div>
            </div>
            <x-primary-button>
                {{ __('Subir canción') }}
            </x-primary-button>
        </div>
    </form>
</x-app-layout>
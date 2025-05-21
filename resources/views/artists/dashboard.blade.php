<x-app-layout>

    <div id="header-artista" class="flex bg-gray-700">
        <div id="photo-container" class="p-4">
            <img src={{asset('profile/'.$user->photo)}} alt={{$user->photo}} class='w-64'>
        </div>
        <div id="data-profile-container" class="flex flex-col justify-center gap-8">
            <div class="flex gap-2">
                <svg data-encore-id="verifiedBadge" role="img" aria-hidden="false" class="size-6">
                    <title>Verified account</title>
                    <path 
                        d="M10.814.5a1.658 1.658 0 0 1 2.372 0l2.512 2.572 3.595-.043a1.658 1.658 0 0 1 1.678 1.678l-.043 3.595 2.572 2.512c.667.65.667 1.722 0 2.372l-2.572 2.512.043 
                        3.595a1.658 1.658 0 0 1-1.678 1.678l-3.595-.043-2.512 2.572a1.658 1.658 0 0 1-2.372 0l-2.512-2.572-3.595.043a1.658 1.658 0 0 1-1.678-1.678l.043-3.595L.5 13.186a1.658 
                        1.658 0 0 1 0-2.372l2.572-2.512-.043-3.595a1.658 1.658 0 0 1 1.678-1.678l3.595.043L10.814.5zm6.584 9.12a1 1 0 0 0-1.414-1.413l-6.011 6.01-1.894-1.893a1 1 0 0 0-1.414 
                        1.414l3.308 3.308 7.425-7.425z">
                    </path>
                </svg>
                Artista verificado
            </div>
            <h1 class="text-white text-2xl">{{$artist->name}}</h1>
        </div>
    </div>

    <div id="info-data-container" class="p-12 flex flex-col gap-8">
        <div id="songs-container">
            <a href="{{route('artist.songs', $artist)}}"><h1 class="text-white text-2xl mb-2">Canciones</h1></a>
            <hr>
            <div id="songs" class="flex flex-col gap-6 p-4">
                @forelse ($songs as $song)
                <a href="{{route('songs.show', $song)}}">
                    <div class="flex justify-between hover:bg-gray-800 cursor-pointer px-4">
                        <div id="song-list-card" class="flex items-center gap-4">
                            <div>
                                <img src={{asset('storage/img/musics/covers/'.$song->song_cover)}} alt="song-cover" class='w-12'>
                            </div>
                            <p class="text-white">{{$song->title}}</p>
                        </div>
                    </div>
                </a>
                @empty
                    <div class="text-red-500">No hay canciones disponibles</div>
                @endforelse
            </div>
        </div>
        <div id="albums-container">
            <a href="{{route('artist.albums', $artist)}}"><h1 class="text-white text-2xl mb-2">Albums</h1></a>
            <hr>
            <div id="albums" class="flex gap-4 p-4 flex-wrap">
                @forelse ($albums as $album)
                    <a href="{{route('albums.show', $album)}}">
                        <div id="album-card" class="flex flex-col justify-center items-center gap-2 p-2 hover:bg-gray-800 cursor-pointer rounded-lg">
                            <div id="cover-container" class="w-36 h-36 object-cover">
                                <img src={{asset('storage/img/albums/covers/'.$album->album_cover)}} alt="album-cover">
                            </div>
                            <p class="text-white">{{$album->title}}</p>
                            <p class="text-white">{{$album->created_at->format('d/m/Y')}}</p>
                        </div>
                    </a>
                @empty
                     <div class="text-red-500">No hay albums disponibles</div>
                @endforelse
            </div>
        </div>
        <div id="operations-artist">
            <h1 class="text-white text-2xl mb-2">Operaciones para artistas</h1>
            <hr>
            <div id="operations-container" class="flex justify-evenly flex-wrap">
                <a href={{route('songs.create')}}>
                    <h1 class="text-white text-center">Canciones</h1>
                    <div id="add-song" class="bg-gray-500 w-44 h-44 opacity-50 cursor-pointer hover:opacity-70">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="p-8">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                        </svg>
                    </div>
                </a>
                <a href={{route('albums.create')}}>
                    <h1 class="text-white text-center">Albums</h1>
                    <div id="add-album" class="bg-gray-500 w-44 h-44 opacity-50 cursor-pointer hover:opacity-70">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="p-8">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                        </svg>
                    </div>
                </a>
            </div>
        </div>
    </div>

</x-app-layout>
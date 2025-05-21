<x-app-layout>
    <h1 class="text-white text-2xl flex justify-center mt-6 max-w-7xl mx-auto">Albums del artista {{$artist->name}}</h1>
    <div id="albums" class="flex gap-4 p-4 flex-wrap justify-center mt-6 max-w-7xl mx-auto">
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
</x-app-layout>
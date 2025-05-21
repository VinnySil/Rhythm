<x-app-layout>
    <div id="songs" class="flex flex-col gap-6 p-8">
        @forelse ($songs as $song)
        <a href={{route('songs.show', $song)}}>
            <div class="flex justify-between hover:bg-gray-800 cursor-pointer px-4">
            <div id="song-list-card" class="flex items-center gap-4">
                <div>
                    <img src={{asset('storage/img/musics/covers/'.$song->song_cover)}} alt="song-cover" class='w-12'>
                </div>
                <p class="text-white">{{$song->title}}</p>
            </div>
            <form data-id="{{$song->id}}" method="POST" action={{ route('songs.destroy', $song)}} class="w-10 hover:scale-105 cursor-pointer delete-user-button">
                @csrf
                @method('DELETE')
                <button type="submit"><img src="{{asset('cruds/eliminar.png')}}" alt="eliminar musica"></button>
            </form>
        </div>
        </a>
        <hr>
        @empty
            <div class="text-red-500">No hay canciones disponibles</div>
        @endforelse
    </div>
</x-app-layout>
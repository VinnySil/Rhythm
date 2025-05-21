<x-app-layout>
    <div class="flex justify-center items-center mt-12">
        <x-music-card
        :musicSource="$song"
        :title="$song->title"
        :artist="$artist->name"
        :imageCover="$song->song_cover"
        />
    </div>
</x-app-layout>
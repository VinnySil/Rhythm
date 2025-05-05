<x-app-layout>

    <form method="POST" enctype="multipart/form-data" action={{ route('albums.store')}} class="md:py-4 m-auto md:flex md:flex-col md:items-center">
        @csrf
        <div class="flex flex-col items-center gap-4 mt-12">
            <div id="main-container" class="w-96 cursor-pointer">
                <img id="profile_photo" src={{asset('storage/img/albums/covers/album_cover_default.webp')}} alt='Portada de album'>
                <input type="file" name="album-cover-input" id="photo" class="hidden">
            </div>

            <div id="title-container">
                <x-text-input placeholder='Título del Álbum' name='title'/>
            </div>

            <x-primary-button>
                {{ __('Crear Álbum') }}
            </x-primary-button>
        </div>
    </form>

</x-app-layout>
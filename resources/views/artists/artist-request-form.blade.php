<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
<body class="bg-[url('/public/bg-app/artists-bg.jpg')] bg-cover bg-center bg-no-repeat h-screen flex items-center justify-center">
    <h1 class="absolute font-bold sm:text-6xl text-3xl sm:top-7 sm:left-7 top-10 text-[#FF73A6] text-shadow">Conviértete en el <br>artista que tanto has <br>soñado</h1>
    <div class="sm:w-1/3 p-4 sm:p-8 bg-white dark:bg-gray-800/70 shadow rounded-lg text-center max-w-2xl mt-24">
        <form action={{ route('artist.request.submit')}} method="POST" enctype="multipart/form-data" class="flex flex-col gap-4 justify-center items-center">
            @csrf    
            <div class="w-full">
                <x-text-input id="stage_name" class="block mt-1 w-full" placeholder="Nombre de artista" type="text" name="stage_name" :value="old('stage_name')" required autofocus autocomplete="stage_name" />
                <x-input-error :messages="$errors->get('stage_name')" class="mt-2" />
            </div>
            <div class="w-full">
                <x-text-input id="professional_email" class="block mt-1 w-full" placeholder="Correo profesional" type="email" name="professional_email" :value="old('professional_email')" required autocomplete="username" />
                <x-input-error :messages="$errors->get('professional_email')" class="mt-2" />
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
            <div class="flex items-center justify-center mt-4 w-full sm:w-1/2">    
                <x-primary-button class="w-full flex justify-center">
                    {{ __('Continuar') }}
                </x-primary-button>
            </div>
        </form>
    </div>
</body>
</html>
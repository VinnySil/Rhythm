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
    <h1 class="absolute font-bold sm:text-6xl text-3xl sm:top-10 sm:left-10 top-10 text-[#FF73A6] text-shadow">Conviértete en el <br>artista que tanto has <br>soñado</h1>
    <div class="sm:w-1/3 p-4 sm:p-8 bg-white dark:bg-gray-800/70 shadow rounded-lg text-center max-w-2xl">
        <form action="" class="flex flex-col gap-4 justify-center items-center">
            @csrf    
            <div class="w-full">
                <x-text-input id="name" class="block mt-1 w-full" placeholder="Nombre de artista" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>
            <div class="w-full">
                <x-text-input id="email" class="block mt-1 w-full" placeholder="Correo profesional" type="email" name="email" :value="old('email')" required autocomplete="username" />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
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
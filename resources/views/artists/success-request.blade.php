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
    <div class="sm:w-1/3 p-4 sm:p-8 bg-white dark:bg-gray-800/80 shadow rounded-lg text-center max-w-2xl mt-24 flex flex-col gap-4">
        <h1 class="text-[#FF73A6] text-4xl">Solicitud enviada!!!</h1>
        <p class="text-[#FF73A6] text-shadow">Tu solicitud está ahora en manos de nuestros administradores.<br>En breve tendrás el resultado</p>
        <a href={{route('home')}}>
            <x-primary-button class="w-full flex justify-center">
                {{ __('Volver a la página principal') }}
            </x-primary-button>
        </a>
    </div>
</body>
</html>
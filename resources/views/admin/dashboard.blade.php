<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <p> 
        
    </p>

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 p-4 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 justify-items-center">
        <a href={{route('users.index')}}>
            <div class="w-60 bg-gray-800 text-gray-400 flex flex-col justify-center text-center p-10 gap-4 rounded-lg">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="#FF73A6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z" />
                </svg>
                <p class="text-4xl">{{$users}}</p>
                <p>Registrados</p>             
            </div>
        </a>
        <a href={{route('artistRequests.index')}}>
            <div class="w-60 bg-gray-800 text-gray-400 flex flex-col justify-center text-center p-10 gap-4 rounded-lg">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="#FF73A6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 12h3.75M9 15h3.75M9 18h3.75m3 .75H18a2.25 2.25 0 0 0 2.25-2.25V6.108c0-1.135-.845-2.098-1.976-2.192a48.424 48.424 0 0 0-1.123-.08m-5.801 0c-.065.21-.1.433-.1.664 0 .414.336.75.75.75h4.5a.75.75 0 0 0 .75-.75 2.25 2.25 0 0 0-.1-.664m-5.8 0A2.251 2.251 0 0 1 13.5 2.25H15c1.012 0 1.867.668 2.15 1.586m-5.8 0c-.376.023-.75.05-1.124.08C9.095 4.01 8.25 4.973 8.25 6.108V8.25m0 0H4.875c-.621 0-1.125.504-1.125 1.125v11.25c0 .621.504 1.125 1.125 1.125h9.75c.621 0 1.125-.504 1.125-1.125V9.375c0-.621-.504-1.125-1.125-1.125H8.25ZM6.75 12h.008v.008H6.75V12Zm0 3h.008v.008H6.75V15Zm0 3h.008v.008H6.75V18Z" />
                </svg>                                  
                <p class="text-4xl">{{$artistRequests}}</p>
                <p>Solicitudes</p>             
            </div>
        </a>
        <a href={{route('albums.index')}}>
            <div class="w-60 bg-gray-800 text-gray-400 flex flex-col justify-center text-center p-10 gap-4 rounded-lg">
                <svg fill="none" viewBox="0 0 32 32" stroke="#FF73A6" stroke-width="1.5" version="1.1" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:serif="http://www.serif.com/" xmlns:xlink="http://www.w3.org/1999/xlink">
                    <path d="M27.985,21.015l-0,-14c-0,-0.796 -0.316,-1.559 -0.879,-2.121c-0.562,-0.563 -1.325,-0.879 -2.121,-0.879c-3.463,0 -10.537,0 -14,0c-0.552,0 -1,0.448 -1,1c-0,0.552 0.448,1 1,1l14,0c0.265,0 0.519,0.105 0.707,0.293c0.188,0.188 0.293,0.442 0.293,0.707l-0,14c-0,0.552 0.448,1 1,1c0.552,0 1,-0.448 1,-1Z"/><path d="M24,11c0,-0.796 -0.316,-1.559 -0.879,-2.121c-0.562,-0.563 -1.325,-0.879 -2.121,-0.879c-3.463,0 -10.537,0 -14,0c-0.796,-0 -1.559,0.316 -2.121,0.879c-0.563,0.562 -0.879,1.325 -0.879,2.121c-0,3.463 -0,10.537 -0,14c-0,0.796 0.316,1.559 0.879,2.121c0.562,0.563 1.325,0.879 2.121,0.879c3.463,0 10.537,0 14,0c0.796,0 1.559,-0.316 2.121,-0.879c0.563,-0.562 0.879,-1.325 0.879,-2.121l-0,-14Zm-14.005,9.003l-0.002,0c-1.105,0 -2.002,0.897 -2.002,2.002c0,1.105 0.897,2.002 2.002,2.002c1.105,-0 2.002,-0.897 2.002,-2.002l-0,-7.122c-0,-0 6.001,-0.75 6.001,-0.75l0.002,3.867c-1.104,0 -2.001,0.897 -2.001,2.002c-0,1.105 0.897,2.001 2.001,2.001c1.105,0 2.002,-0.896 2.002,-2.001l-0.005,-7.003c-0,-0.286 -0.124,-0.559 -0.339,-0.749c-0.215,-0.19 -0.501,-0.278 -0.785,-0.242l-8,1c-0.501,0.062 -0.876,0.488 -0.876,0.992l-0,6.003Z"/>
                </svg>                                
                <p class="text-4xl">{{$albums}}</p>
                <p>Albums</p>             
            </div>
        </a>
        <a href={{route('songs.index')}}>
            <div class="w-60 bg-gray-800 text-gray-400 flex flex-col justify-center text-center p-10 gap-4 rounded-lg">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="#FF73A6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="m9 9 10.5-3m0 6.553v3.75a2.25 2.25 0 0 1-1.632 2.163l-1.32.377a1.803 1.803 0 1 1-.99-3.467l2.31-.66a2.25 2.25 0 0 0 1.632-2.163Zm0 0V2.25L9 5.25v10.303m0 0v3.75a2.25 2.25 0 0 1-1.632 2.163l-1.32.377a1.803 1.803 0 0 1-.99-3.467l2.31-.66A2.25 2.25 0 0 0 9 15.553Z" />
                </svg>                                             
                <p class="text-4xl">{{$songs}}</p>
                <p>Canciones</p>             
            </div>
        </a>
    </div>

</x-app-layout>

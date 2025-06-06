<x-app-layout>

    <div id="container" class="text-white text-center">
        <div class="bg-gradient-to-r from-pink-400 to-purple-800 w-full p-4"><h1>{{$user->nick}}</h1></div>
        <div id="profile-photo" class="flex justify-center">
            <div class="flex justify-center m-10 border-4 rounded-full w-40 h-">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z" />
                </svg>   
            </div>
        </div>
    </div>

</x-app-layout>
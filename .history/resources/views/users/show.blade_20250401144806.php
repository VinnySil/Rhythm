<x-app-layout>

    <div id="container" class="text-white text-center">
        <div class="bg-gradient-to-r from-pink-400 to-purple-800 w-full p-4"><h1>{{$user->rol}}</h1></div>
        <div id="profile-photo" class="flex flex-col justify-center items-center">
            <div class="flex justify-center items-center m-10 border-4 border-pink-200 rounded-full w-40 h-40">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6.827 6.175A2.31 2.31 0 0 1 5.186 7.23c-.38.054-.757.112-1.134.175C2.999 7.58 2.25 8.507 2.25 9.574V18a2.25 2.25 0 0 0 2.25 2.25h15A2.25 2.25 0 0 0 21.75 18V9.574c0-1.067-.75-1.994-1.802-2.169a47.865 47.865 0 0 0-1.134-.175 2.31 2.31 0 0 1-1.64-1.055l-.822-1.316a2.192 2.192 0 0 0-1.736-1.039 48.774 48.774 0 0 0-5.232 0 2.192 2.192 0 0 0-1.736 1.039l-.821 1.316Z" />
                    <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 12.75a4.5 4.5 0 1 1-9 0 4.5 4.5 0 0 1 9 0ZM18.75 10.5h.008v.008h-.008V10.5Z" />
                </svg>                    
            </div>
            <div>{{$user->nick}}</div>
        </div>
        <div id="data-container" class="text-start p-4 mt-8">
            <div class="border-b-pink-200 border-b-2 p-2">{{$user->name}}</div>
            <div class="border-b-pink-200 border-b-2 p-2">{{$user->email}}</div>
            {{-- <div>{{$user->password}}</div> --}}
        </div>
    </div>


    <div class="relative h-64 bg-blue-500">
        <!-- Olas -->
        <svg class="absolute bottom-0 left-0 w-full h-24" viewBox="0 0 1440 320" xmlns="http://www.w3.org/2000/svg">
          <path fill="#ffffff" fill-opacity="1" d="M0,224L48,213.3C96,203,192,181,288,165.3C384,149,480,139,576,144C672,149,768,171,864,186.7C960,203,1056,213,1152,208C1248,203,1344,181,1392,170.7L1440,160V320H0Z"></path>
          <path fill="#f3f4f6" fill-opacity="1" d="M0,288L48,266.7C96,245,192,203,288,181.3C384,160,480,160,576,181.3C672,203,768,245,864,256C960,267,1056,245,1152,229.3C1248,213,1344,203,1392,197.3L1440,192V320H0Z"></path>
          <path fill="#e5e7eb" fill-opacity="1" d="M0,320L48,288C96,256,192,192,288,165.3C384,139,480,149,576,165.3C672,181,768,203,864,224C960,245,1056,267,1152,256C1248,245,1344,203,1392,181.3L1440,160V320H0Z"></path>
        </svg>
      </div>
</x-app-layout>
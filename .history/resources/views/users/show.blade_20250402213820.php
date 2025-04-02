<x-app-layout>

    <div id="container" class="text-white text-center max-w-lg mx-auto my-10">
        <div class="w-full p-4"><h1 class="text-2xl">{{$user->rol}}</h1></div>
        <div id="profile-photo" class="flex flex-col justify-center items-center relative ">
            <div class="flex justify-center items-center m-10 border-4 border-pink-200 rounded-full w-40 h-40">
                <img src={{asset('build/'.$user->photo)}} alt={{$user->$field}}>              
            </div>
            <div>{{$user->nick}}</div>
        </div>
        <div id="data-container" class="text-start p-4 mt-8">
            <div class="border-b-pink-200 border-b-2 p-2">{{$user->name}}</div>
            <div class="border-b-pink-200 border-b-2 p-2">{{$user->email}}</div>
        </div>
    </div>
</x-app-layout>
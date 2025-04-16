<x-app-layout>

    <div class="flex max-w-7xl mx-auto justify-evenly items-center my-8">
        <div id="container" class="text-white text-center w-1/3">
            <div id="profile-photo" class="flex flex-col justify-center items-center text-center">
                <div class="flex justify-center items-center m-10 border-4 border-pink-200 rounded-full w-40 h-40">
                    <img src={{asset('profile/'.$user->photo)}} alt={{$user->photo}}>              
                </div>
                <div>{{$user->nick}}</div>
            </div>
            <div id="data-container" class="text-start p-4 mt-8">
                <div class="border-b-pink-200 border-b-2 p-2">{{$artistRequest->stage_name}}</div>
                <div class="border-b-pink-200 border-b-2 p-2">{{$artistRequest->professional_email}}</div>
            </div>
        </div>
        <div class="text-white text-center">
            <x-music-card
            :musicSource="$artistRequest"
            :title="$artistRequest->title"
            :artist="$artistRequest->stage_name"
            />
        </div>
    </div>
</x-app-layout>
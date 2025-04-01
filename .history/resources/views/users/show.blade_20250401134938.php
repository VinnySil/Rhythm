<x-app-layout>
    <div class="container mx-auto py-8 text-gray-300 flex">
        <div class="w-2/4 flex flex-col items-center justify-evenly">
            <div>
                @if (isset($user->photo))
                    <img class="rounded-full w-60 cursor-pointer" id="profile_photo" src={{asset('images/profile_photos/'.$user->photo)}} alt="{{$user->name}}">
                @else
                    <img class="rounded-full w-60" src='https://ui-avatars.com/api/?name={{$user->name}}&background=0D8ABC&color=fff&size=128' alt="{{$user->name}}">
                @endif
            </div>

            <div id="modal" class="fixed inset-0 bg-black bg-opacity-75 hidden items-center justify-center modal">
                <img id="modalImagen" src="" alt="Imagen ampliada" class="max-w-full max-h-full rounded-full">
            </div>
            
            <h1 class="text-xl">{{ $roles[$user->role->value]->getNameRole() }}</h1>
        </div>
        <div class="w-2/4 text-xl">
            <div class="flex justify-between flex-col h-full">
                <h1 class="text-3xl p-4">Datos personales</h1>
                <div class="flex">
                    <div class="bg-gray-800 p-4 w-1/4 rounded-tl-xl"><h2>Nick:</h2></div>
                    <div class="p-4 w-1/2 bg-gray-700 rounded-tr-xl">{{$user->nick}}</div>
                </div>
                <div class="flex">
                    <div class="bg-gray-800 p-4 w-1/4"><h2>Nombre Completo:</h2></div>
                    <div class="p-4 w-1/2 bg-gray-700">{{$user->name}}</div>
                </div>
                <div class="flex">
                    <div class="bg-gray-800 p-4 w-1/4"><h2>Email:</h2></div>
                    <div class="p-4 w-1/2 bg-gray-700">{{$user->email}}</div>
                </div>
                <div class="flex">
                    <div class="bg-gray-800 p-4 w-1/4">Ciudad:</div>
                    <div class="p-4 w-1/2 bg-gray-700">{{$user->city}}</div>
                </div>
                <div class="flex">
                    <div class="bg-gray-800 p-4 w-1/4 rounded-bl-xl">Dirección:</div>
                    <div class="p-4 w-1/2 bg-gray-700 rounded-br-xl">{{$user->direction}}</div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
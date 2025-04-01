<x-app-layout>
    <div class="container mx-auto py-8 text-gray-300 flex">
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
            </div>
        </div>
    </div>
</x-app-layout>
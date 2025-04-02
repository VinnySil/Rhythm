<x-app-layout>

    <div id="container" class="text-white text-center max-w-lg mx-auto my-10">
        <div class="w-full p-4"><h1 class="text-2xl">{{$user->rol}}</h1></div>
        <div id="profile-photo" class="flex flex-col justify-center items-center relative ">
            <div class="flex justify-center items-center m-10 border-4 border-pink-200 rounded-full w-40 h-40 cursor-pointer hover:bg-slate-600">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6.827 6.175A2.31 2.31 0 0 1 5.186 7.23c-.38.054-.757.112-1.134.175C2.999 7.58 2.25 8.507 2.25 9.574V18a2.25 2.25 0 0 0 2.25 2.25h15A2.25 2.25 0 0 0 21.75 18V9.574c0-1.067-.75-1.994-1.802-2.169a47.865 47.865 0 0 0-1.134-.175 2.31 2.31 0 0 1-1.64-1.055l-.822-1.316a2.192 2.192 0 0 0-1.736-1.039 48.774 48.774 0 0 0-5.232 0 2.192 2.192 0 0 0-1.736 1.039l-.821 1.316Z" />
                    <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 12.75a4.5 4.5 0 1 1-9 0 4.5 4.5 0 0 1 9 0ZM18.75 10.5h.008v.008h-.008V10.5Z" />
                </svg>                    
            </div>
            <div>{{$user->nick}}</div>
        </div>
        <form action={{ route('users.update', $user)}} method="POST" id="data-container" class="text-start p-4 mt-8">
            @csrf
            @method('PATCH')
            <div class="border-b-pink-200 border-b-2 "><input type="text" placeholder="Nombre..." name="name" id="name" value={{old('name', $user->name)}} class="bg-slate-900 border-none focus:outline-none focus:border-transparent focus:ring-0 w-full"></div>
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
            <div class="border-b-pink-200 border-b-2 "><input type="text" placeholder="Nombre de usuario..." name="nick" id="nick" value={{old('email', $user->nick)}} class="bg-slate-900 border-none focus:outline-none focus:border-transparent focus:ring-0 w-full"></div>
            <x-input-error :messages="$errors->get('nick')" class="mt-2" />
            <div class="border-b-pink-200 border-b-2 "><input type="text" placeholder="Correo electrónico..." name="email" id="email" value={{old('email', $user->email)}} class="bg-slate-900 border-none focus:outline-none focus:border-transparent focus:ring-0 w-full"></div>
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
            <div class="border-b-pink-200 border-b-2 "><input type="password" placeholder="Contraseña nueva" name="password" id="password" class="bg-slate-900 border-none focus:outline-none focus:border-transparent focus:ring-0 w-full"></div>
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
            <div class="border-b-pink-200 border-b-2 "><input type="password" placeholder="Contraseña antigua" name="old_password" id="old_password" class="bg-slate-900 border-none focus:outline-none focus:border-transparent focus:ring-0 w-full"></div>
            <x-primary-button class="w-full flex justify-center mt-8">
                {{ __('Guardar') }}
            </x-primary-button>
        </form>
    </div>



    <div class="w-2/4 p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg mt-5 m-auto text-center max-w-2xl">
        <h1 class="dark:text-white text-2xl p-4">Crear nuevo usuario</h1>
        <form method="POST" enctype="multipart/form-data" action={{ route('users.update', $user)}} method="POST" id="edit-form" class="sm:p-4 sm:w-2/3 m-auto">
            @csrf    
            <!-- Name -->
            <div>
                <x-text-input id="name" class="block mt-1 w-full" placeholder="Nombre" type="text" name="name" :value="old('name', $user->name)" required autofocus autocomplete="name" />
                <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>
            {{-- Nick --}}
            <div class="mt-4">
                <x-text-input id="nick" class="block mt-1 w-full" placeholder="Nick" type="text" name="nick" :value="old('nick', $user->nick)" required autocomplete="username" />
                <x-input-error :messages="$errors->get('nick')" class="mt-2" />
            </div>
    
            <!-- Email Address -->
            <div class="mt-4">
                <x-text-input id="email" class="block mt-1 w-full" placeholder="Email" type="email" name="email" :value="old('email', $user->email)" required autocomplete="email" />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <!-- Old Password -->
            <div class="mt-4">
    
                <x-text-input id="old_password" class="block mt-1 w-full"
                                placeholder="Contraseña"
                                type="password"
                                name="old_password"
                                autocomplete="new-password" />
    
                <x-input-error :messages="$errors->get('old_password')" class="mt-2" />
            </div>
    
            <!-- New Password -->
            <div class="mt-4">
    
                <x-text-input id="password" class="block mt-1 w-full"
                                placeholder="Nueva contraseña"
                                type="password"
                                name="password"
                                autocomplete="new-password" />
    
                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <!--Role-->
            <div class="mt-4 flex justify-center">
                <select name="rol" id="rol" class="bg-gray-700 border-gray-700 text-gray-300 rounded">
                    <option value="client">Cliente</option>
                    <option value="admin">Administrador</option>
                    <option value="artist">Artista</option>
                </select>
            </div>

            <div class="flex items-center justify-center mt-4 w-full">    
                <x-primary-button class="w-full flex justify-center">
                    {{ __('Guardar') }}
                </x-primary-button>
            </div>
        </form>
    </div>
</x-app-layout>
<x-app-layout>
    <div class="w-2/4 p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg mt-5 m-auto text-center max-w-2xl">
        <h1 class="dark:text-white text-2xl p-4">Modificar usuario</h1>
        <form method="POST" enctype="multipart/form-data" action={{ route('users.update', $user)}} method="POST" id="edit-form" class="sm:p-4 sm:w-2/3 m-auto">
            @csrf
            @method('PATCH')  
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

            <!--Rol-->
            <div class="mt-4 flex justify-center">
                <select name="rol" id="rol" class="bg-gray-700 border-gray-700 text-gray-300 rounded">
                    <option value="client" @selected($user->rol === 'client')>Cliente</option>
                    <option value="admin" @selected($user->rol === 'admin')>Administrador</option>
                    <option value="artist" @selected($user->rol === 'artist')>Artista</option>
                </select>
            </div>

            <!--Borrado-->
            <div class="mt-4 flex text-white">
                <label for="deleted">Borrar:</label>
                <div class="ml-5">
                    <input type="radio" name="deleted">
                    <label>Si</label>
                    <input type="radio" name="deleted">
                    <label>No</label>
                </div>
            </div>

            <div class="flex items-center justify-center mt-4 w-full">    
                <x-primary-button class="w-full flex justify-center">
                    {{ __('Guardar') }}
                </x-primary-button>
            </div>
        </form>
    </div>
</x-app-layout>
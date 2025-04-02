<x-app-layout>
    <div class="sm:w-2/4 w-11/12 p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg mt-5 m-auto text-center max-w-2xl">
        <h1 class="dark:text-white text-2xl p-4">Modificar usuario</h1>
        <form method="POST" enctype="multipart/form-data" action={{ route('users.update', $user)}} method="POST" id="edit-form" class="sm:p-4 sm:w-2/3 m-auto">
            @csrf
            @method('PATCH')  
            <div id="main-container" class="md:flex grid gap-10">
                <div id="photo-container" class="md:border-l-2 border-b-2 border-pink-400 flex justify-center p-4">
                    <img src={{asset('build/'.$user->photo)}} alt={{$user->photo}} class="w-40">   
                </div>
                <div id="data-container">
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
                        <select name="rol" id="rol" class="bg-gray-700 border-gray-700 text-gray-300 rounded w-11/12 text-center">
                            <option value="client" @selected($user->rol === 'client')>Cliente</option>
                            <option value="admin" @selected($user->rol === 'admin')>Administrador</option>
                            <option value="artist" @selected($user->rol === 'artist')>Artista</option>
                        </select>
                    </div>
        
                    <!--Borrado-->
                    <div class="mt-4 flex text-white items-center">
                        <label for="deleted">Borrar:</label>
                        <div class="ml-5 grid sm:flex">
                            <div>
                                <input type="radio" name="deleted" value="1" @checked($user->deleted === 1)>
                                <label>Si</label>
                            </div>
                            <div class="sm:ml-4">
                                <input type="radio" name="deleted" value="0" @checked($user->deleted === 0)>
                                <label>No</label>
                            </div>
                        </div>
                    </div>
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
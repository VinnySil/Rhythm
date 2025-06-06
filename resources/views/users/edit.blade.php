<x-app-layout>
    <div class="sm:w-2/4 w-11/12 p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg mt-5 m-auto text-center max-w-2xl">
        <h1 class="dark:text-white text-2xl p-4">Modificar usuario</h1>
        <form method="POST" enctype="multipart/form-data" action={{ route('users.update', $user)}} id="edit-form" class="md:py-4 m-auto md:flex md:flex-col md:items-center">
            @csrf
            @method('PATCH')  
            <div id="main-container" class="md:flex grid gap-10">
                    <!--Profile photo-->
                    <div id="photo-container" class="justify-center p-4 flex md:justify-center md:items-center cursor-pointer">
                        <img src={{asset('profile/'.$user->photo)}} alt={{$user->photo}} id='profile_photo' class="w-40 md:w-40 md:h-40 border-pink-200 rounded-full border-2">
                        <input type="file" name="photo" id="photo" class="hidden">
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
                        <div class="ml-5 flex gap-4">
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
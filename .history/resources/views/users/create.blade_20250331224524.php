<x-app-layout>
    <div class="w-2/4 p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg mt-5 m-auto">
        <h1 class="dark:text-gray-400 text-2xl p-4">Crear nuevo usuario</h1>
        <form method="POST" enctype="multipart/form-data" id="createForm" action="{{ route('users.store') }}" class="w-">
            @csrf    
            <!-- Name -->
            <div>
                <x-text-input id="name" class="block mt-1 w-full" placeholder="Nombre" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>
            {{-- Nick --}}
            <div class="mt-4">
                <x-text-input id="nick" class="block mt-1 w-full" placeholder="Nick" type="text" name="nick" :value="old('nick')" required autocomplete="username" />
                <x-input-error :messages="$errors->get('nick')" class="mt-2" />
            </div>
    
            <!-- Email Address -->
            <div class="mt-4">
                <x-text-input id="email" class="block mt-1 w-full" placeholder="Email" type="email" name="email" :value="old('email')" required autocomplete="username" />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <!-- Password -->
            <div class="mt-4">
    
                <x-text-input id="password" class="block mt-1 w-full"
                                placeholder="Contraseña"
                                type="password"
                                name="password"
                                required autocomplete="new-password" />
    
                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>
    
            <!-- Confirm Password -->
            <div class="mt-4">
    
                <x-text-input id="password_confirmation" class="block mt-1 w-full"
                                placeholder="Confirmar contraseña"
                                type="password"
                                name="password_confirmation" required autocomplete="new-password" />
    
                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
            </div>

            <!--Role-->
            <div class="mt-4 flex justify-center">
                <select name="role" id="role" class="bg-gray-700 border-gray-700 text-gray-300 rounded">
                    <option value="admin">Administrador</option>
                    <option value="artist">Artista</option>
                    <option value="client">Cliente</option>
                </select>
            </div>

            <div class="flex items-center justify-center mt-4 w-full">    
                <x-primary-button class="w-full flex justify-center">
                    {{ __('Crear') }}
                </x-primary-button>
            </div>
        </form>
    </div>
</x-app-layout>
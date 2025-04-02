<x-app-layout>
    <div class="w-2/4 p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg mt-5 m-auto text-center max-w-2xl">
        <h1 class="dark:text-white text-2xl p-4">Modificar usuario</h1>
        <form method="POST" enctype="multipart/form-data" action={{ route('users.update', $user)}} method="POST" id="edit-form" class="sm:p-4 sm:w-2/3 m-auto flex">
            @csrf
            @method('PATCH')  
            div#main
            <div class="flex items-center justify-center mt-4 w-full">    
                <x-primary-button class="w-full flex justify-center">
                    {{ __('Guardar') }}
                </x-primary-button>
            </div>
        </form>
    </div>
</x-app-layout>
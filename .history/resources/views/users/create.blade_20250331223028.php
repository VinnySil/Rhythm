<x-app-layout>
    
    
    <form method="POST" action="{{route('users.store')}}">
        <x-text-input id="name" class="block mt-1 w-full" placeholder="Nombre" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
        <x-text-input id="name" class="block mt-1 w-full" placeholder="Nombre" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
    </form>
    
</x-app-layout>
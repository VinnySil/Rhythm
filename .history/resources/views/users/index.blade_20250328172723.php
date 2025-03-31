<x-app-layout>
    <h1>todos los usuarios:</h1>
    @foreach ($users as $user)
        {{$user->nick}} 
    @endforeach


    <x-table
    :headers="['Nombre', 'Nick', 'Email', '']"
    />
</x-app-layout>
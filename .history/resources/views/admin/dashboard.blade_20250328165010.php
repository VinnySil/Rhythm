<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    {{-- <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("You're logged in!") }}
                </div>
            </div>
        </div>
    </div> --}}

    <p> 
        {{$users}}
    </p>

    <div class="flex flex-col">
        <div class="w-50 h-50 bg-red-600"></div>
        <div class="w-50 h-50 bg-red-600"></div>
        <div class="w-50 h-50 bg-red-600"></div>
        <div class="w-50 h-50 bg-red-600"></div>
        <div class="w-520 h-52 bg-red-600"></div>
    </div>

</x-app-layout>

<!-- resources/views/dashboard.blade.php -->
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Projekti') }}
        </h2>
    </x-slot>

    <div class="flex mr-20 ml-20">
        <div class="w-1/2 ">
            @include('projects.user-created-projects')
        </div>
        <div class="w-1/2 ">
            @include('projects.user-participant-projects')
        </div>
    </div>

</x-app-layout>

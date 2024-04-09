<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dodaj korisnika') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form method="POST" action="{{ route('projects.addUsers', $project->id) }}">
                        @csrf
                        <!-- Lista korisnika koji nisu dodani u projekt -->
                        <div>
                            @foreach ($registeredUsers as $user)
                            <label class="block">
                                <input type="checkbox" name="users[]" value="{{ $user->id }}" class="mr-2 font-bold">
                                {{ $user->name }}
                            </label>
                            @endforeach
                        </div>
                        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white  py-2 px-4 rounded mt-4">
                            Dodaj odabrane korisnike
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
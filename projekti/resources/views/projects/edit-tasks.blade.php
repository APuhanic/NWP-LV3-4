<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Uredi projekt') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form method="POST" action="{{ route('update.project', $project->id) }}">
                        @csrf
                        @method('PUT')

                        <!-- Naziv projekta -->
                        <div class="mb-4">
                            <label for="naziv_projekta" class="block text-sm font-semibold text-gray-800 dark:text-gray-200">Naziv projekta:</label>
                            <input type="text" name="naziv_projekta" id="naziv_projekta" class="form-input mt-1 block w-full bg-gray-200 dark:bg-gray-700 text-gray-900 dark:text-gray-300 rounded-md shadow-sm" value="{{ $project->naziv_projekta }}">
                        </div>

                        <!-- Opis projekta -->
                        <div class="mb-4">
                            <label for="opis_projekta" class="block text-sm font-semibold text-gray-800 dark:text-gray-200">Opis projekta:</label>
                            <textarea name="opis_projekta" id="opis_projekta" rows="4" class="form-textarea mt-1 block w-full bg-gray-200 dark:bg-gray-700 text-gray-900 dark:text-gray-300 rounded-md shadow-sm">{{ $project->opis_projekta }}</textarea>
                        </div>

                        <!-- Cijena projekta -->
                        <div class="mb-4">
                            <label for="cijena_projekta" class="block text-sm font-semibold text-gray-800 dark:text-gray-200">Cijena projekta:</label>
                            <input type="number" name="cijena_projekta" id="cijena_projekta" class="form-input mt-1 block w-full bg-gray-200 dark:bg-gray-700 text-gray-900 dark:text-gray-300 rounded-md shadow-sm" value="{{ $project->cijena_projekta }}">
                        </div>

                        <!-- Obavljeni poslovi -->
                        <div class="mb-4">
                            <label for="obavljeni_poslovi" class="block text-sm font-semibold text-gray-800 dark:text-gray-200">Obavljeni poslovi:</label>
                            <textarea name="obavljeni_poslovi" id="obavljeni_poslovi" rows="4" class="form-textarea mt-1 block w-full bg-gray-200 dark:bg-gray-700 text-gray-900 dark:text-gray-300 rounded-md shadow-sm">{{ $project->obavljeni_poslovi }}</textarea>
                        </div>

                        <!-- Datum početka -->
                        <div class="mb-4">
                            <label for="datum_pocetka" class="block text-sm font-semibold text-gray-800 dark:text-gray-200">Datum početka:</label>
                            <input type="date" name="datum_pocetka" id="datum_pocetka" class="form-input mt-1 block w-full bg-gray-200 dark:bg-gray-700 text-gray-900 dark:text-gray-300 rounded-md shadow-sm" value="{{ $project->datum_pocetka ? \Carbon\Carbon::parse($project->datum_pocetka)->format('Y-m-d') : '' }}">
                        </div>

                        <!-- Datum završetka -->
                        <div class="mb-4">
                            <label for="datum_zavrsetka" class="block text-sm font-semibold text-gray-800 dark:text-gray-200">Datum završetka:</label>
                            <input type="date" name="datum_zavrsetka" id="datum_zavrsetka" class="form-input mt-1 block w-full bg-gray-200 dark:bg-gray-700 text-gray-900 dark:text-gray-300 rounded-md shadow-sm" value="{{ $project->datum_zavrsetka ? \Carbon\Carbon::parse($project->datum_zavrsetka)->format('Y-m-d') : '' }}">
                        </div>


                        <!-- Submit button -->
                        <div class="mt-4">
                            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Promjeni podatke</button>
                            <a href="{{ route('dashboard') }}" class="text-gray-600 hover:text-gray-800 ml-2">Odustani</a>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
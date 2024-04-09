<div class="py-12">
    <div class=" sm:px-6 lg:px-8">
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900 dark:text-gray-100">
                <h2 class="text-2xl font-semibold">Vaši projekti</h2>
                <ul class="mt-4">
                    @foreach (auth()->user()->projects as $project)
                    <li class="mb-8">
                        <div class="flex items-center mb- ">
                            <div class="mr-5 flex-grow">
                                <div class="flex items-center">
                                    <h3 class="text-xl font-semibold">{{ $project->naziv_projekta }}</h3>
                                    <div class="flex items-center ml-5">
                                        <a href="{{ route('edit.project', $project->id) }}" class="text-blue-500 hover:text-blue-700 transition duration-300 ease-in-out">Uredi</a>
                                    </div>

                                </div>
                                <p class="text-gray-600 dark:text-gray-400 mb-5">{{ $project->opis_projekta }}</p>
                                <p class="mb-5"><span class="font-semibold ">Cijena projekta:</span> {{ $project->cijena_projekta }} €</p>
                                <p class="mb-5"><span class="font-semibold ">Datum početka:</span> {{ \Carbon\Carbon::parse($project->datum_pocetka)->format('d.m.Y') }}</p>
                                <p class="mb-5"><span class="font-semibold ">Datum završetka:</span> {{ \Carbon\Carbon::parse($project->datum_zavrsetka)->format('d.m.Y') }}</p>

                                <div class="mb-5">
                                    <h4 class="font-semibold">Obavljeni poslovi:</h4>
                                    <p>{{ $project->obavljeni_poslovi }}</p>
                                </div>
                                <div>
                                    <div>
                                        <h4 class="font-semibold">Voditelj:</h4>
                                        <p>{{ $project->leader->name }}</p>
                                    </div>
                                    <h4 class="font-semibold">Članovi projekta:</h4>
                                    <ul>
                                        @foreach ($project->teamMembers as $member)
                                        <li>{{ $member->name }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                            <div class="flex items-center">
                                <a href="{{ route('projects.addUsersForm', $project->id) }}" class="rounded-full bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 cursor-pointer flex items-center justify-center mr-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M14 9V8h-3V5h-1v3H6v1h3v3h1v-3h3z" clip-rule="evenodd" />
                                    </svg>
                                </a>
                                <span class="text-blue-500">Dodaj člana tima</span>
                            </div>
                        </div>
                        <hr class="mt-5 mb-5">
                    </li>
                    @endforeach



                </ul>
            </div>
        </div>
    </div>
</div>
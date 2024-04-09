<div class="py-12">
    <div class="  sm:px-6 lg:px-8">
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900 dark:text-gray-100">
                <h2 class="text-2xl font-semibold">Projekti u kojima ste sudionik:</h2>
                <ul class="mt-4">
                    @foreach ($userParticipantProjects as $project)
                    <li class="mb-8">
                        <div class="flex items-center mb- ">
                            <div class="mr-5">
                                <div class="flex items-center">
                                    <h3 class="text-xl font-semibold">{{ $project->naziv_projekta }}</h3>
                                    <div class="flex items-center ml-5">
                                        <a href="{{ route('edit.project.tasks', $project->id) }}" class="text-blue-500 hover:text-blue-700 transition duration-300 ease-in-out">Uredi obavljene zadatke</a>
                                    </div>

                                </div>
                                <p class="text-gray-600 dark:text-gray-400 mb-10">{{ $project->opis_projekta }}</p>
                                <p class="mb-5"><span class="font-semibold ">Cijena projekta:</span> {{ $project->cijena_projekta }} €</p>

                                <p class="mb-5"><span class="font-semibold ">Obavljeni poslovi:</span> {{ $project->obavljeni_poslovi }}</p>
                                <p class="mb-5"><span class="font-semibold ">Datum početka:</span> {{ \Carbon\Carbon::parse($project->datum_pocetka)->format('d.m.Y') }}</p>
                                <p class="mb-5"><span class="font-semibold ">Datum završetka:</span> {{ \Carbon\Carbon::parse($project->datum_zavrsetka)->format('d.m.Y') }}</p>

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

                        </div>
                    </li>
                    <hr class="mt-5 mb-5">

                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</div>
<form method="POST" action="{{ route('projects.addUsers', $project->id) }}">
    @csrf

    <!-- Prikaz registriranih korisnika koji nisu dodani u projekt -->
            <h2>Odaberi korisnike za dodavanje u projekt</h2>
            @foreach ($registeredUsers as $user)
                <label>
                    <input type="checkbox" name="users[]" value="{{ $user->id }}">
                    {{ $user->name }}
                </label>
            @endforeach

    <!-- Dodavanje gumba za potvrdu -->
    <button type="submit">Dodaj odabrane korisnike</button>
</form>

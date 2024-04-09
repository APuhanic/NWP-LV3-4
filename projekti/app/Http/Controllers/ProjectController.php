<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\User;


class ProjectController extends Controller
{
    public function store(Request $request)
    {
        // Stvaranje novog projekta
        $project = new Project();
        $project->naziv_projekta = $request->naziv_projekta;
        $project->opis_projekta = $request->opis_projekta;
        $project->cijena_projekta = $request->cijena_projekta;
        $project->obavljeni_poslovi = $request->obavljeni_poslovi;
        $project->datum_pocetka = $request->datum_pocetka;
        $project->datum_zavrsetka = $request->datum_zavrsetka;
        $project->user_id = auth()->id(); // Postavljanje voditelja projekta na trenutno prijavljenog korisnika
        $project->save();

        // Dodavanje voditelja tima
        $project->teamMembers()->attach(auth()->id());

        // Redirect na dashboard s porukom o uspješnom stvaranju projekta
        return redirect()->route('dashboard')->with('status', 'project-created');
    }

    // Prikazivanje obrasca za stvaranje novog projekta
    public function create()
    {
        return view('projects.create');
    }

    // Prikazivanje pojedinog projekta
    public function showProjects()
    {
        $user = auth()->user();
        $userProjects = $user->projects;
        $userParticipantProjects = Project::whereHas('teamMembers', function ($query) use ($user) {
            $query->where('user_id', $user->id);
        })
            ->whereDoesntHave('leader', function ($query) use ($user) {
                $query->where('user_id', $user->id);
            })
            ->get();

        return view('dashboard', compact('userProjects', 'userParticipantProjects'));
    }

    // Dodavanje korisnika u projekt kao članove tima
    public function addUsers(Request $request, $projectId)
    {
        // Pronađi projekt prema ID-u
        $project = Project::findOrFail($projectId);
        // Dohvati korisnike koje je korisnik odabrao za dodavanje u projekt
        $usersToAdd = $request->input('users');
        // Dodaj korisnike u projekt
        $project->teamMembers()->attach($usersToAdd);
        // Preusmjeri korisnika na dashboard
        return redirect()->route('dashboard')->with('success', 'Korisnici uspješno dodani u projekt.');
    }

    // Prikazivanje obrasca za dodavanje korisnika u projekt
    public function showAddUsersForm($projectId)
    {
        $project = Project::findOrFail($projectId);
        $registeredUsers = User::whereNotIn('id', $project->teamMembers->pluck('id'))->get();
        return view('projects.add-users-form', compact('project', 'registeredUsers'));
    }

    // Prikaz projekata korisnika kao člana tima
    public function userParticipantProjects()
    {
        $user = auth()->user();
        $userParticipantProjects = Project::whereHas('teamMembers', function ($query) use ($user) {
            $query->where('user_id', $user->id);
        })
            ->whereDoesntHave('leader', function ($query) use ($user) {
                $query->where('user_id', $user->id);
            })
            ->get();

        return view('user_participant_projects', ['userParticipantProjects' => $userParticipantProjects]);
    }

    // Prikazivanje obrasca za uređivanje projekta
    public function edit($projectId)
    {
        // Pronađi projekt prema ID-u
        $project = Project::findOrFail($projectId);

        // Prikazivanje obrasca za uređivanje projekta
        return view('projects.edit', compact('project'));
    }

    // Ažuriranje podataka projekta
    public function update(Request $request, $projectId)
    {
        $project = Project::findOrFail($projectId);

        // Ažuriranje podataka projekta
        $project->naziv_projekta = $request->input('naziv_projekta');
        $project->opis_projekta = $request->input('opis_projekta');
        $project->cijena_projekta = $request->input('cijena_projekta');
        $project->obavljeni_poslovi = $request->input('obavljeni_poslovi');
        $project->datum_pocetka = $request->input('datum_pocetka');
        $project->datum_zavrsetka = $request->input('datum_zavrsetka');

        $project->save();

        return redirect()->route('dashboard')->with('success', 'Podaci projekta su uspješno ažurirani.');
    }

    // Prikazivanje obrasca za uređivanje obavljenih zadataka
    public function editTasks($projectId)
    {
        $project = Project::findOrFail($projectId);
        return view('projects.edit-tasks', compact('project'));
    }

    // Ažuriranje obavljenih zadataka
    public function updateTasks(Request $request, $projectId)
    {
        $project = Project::findOrFail($projectId);
        $project->obavljeni_poslovi = $request->input('obavljeni_poslovi');
        $project->save();

        return redirect()->route('dashboard')->with('success', 'Podaci projekta su uspješno ažurirani.');
    }
}

<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProjectController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');
Route::get('/dashboard', [ProjectController::class, 'showProjects'])->name('dashboard');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::post('/projects', [ProjectController::class, 'store'])->name('projects.store');
Route::post('/projects/{id}/add-users', 'App\Http\Controllers\ProjectController@addUsers')->name('projects.addUsers');
Route::get('/projects/{id}/add-users', 'App\Http\Controllers\ProjectController@showAddUsersForm')->name('projects.addUsersForm');
Route::get('/projects/create', [ProjectController::class, 'create'])->name('projects.create');
Route::get('/projects/{projectId}', [ProjectController::class, 'show'])->name('projects.show');
Route::get('/projects/{projectId}/edit', [ProjectController::class, 'edit'])->name('edit.project');
Route::put('/projects/{projectId}', [ProjectController::class, 'update'])->name('update.project');
Route::get('/projects/{projectId}/tasks', [ProjectController::class, 'editTasks'])->name('edit.project.tasks');
Route::put('/projects/{id}/tasks', [ProjectController::class, 'updateTasks'])->name('update.project.tasks');

require __DIR__ . '/auth.php';

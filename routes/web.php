<?php

use App\Http\Controllers\TeamsController;
use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome');
Route::get('/teams', [TeamsController::class, 'index'])->name('teams.index');
Route::get('/standings', [TeamsController::class, 'standings'])->name('teams.standings');
Route::get('/fixtures', [TeamsController::class, 'fixtures'])->name('teams.fixtures');
Route::get('/results', [TeamsController::class, 'results'])->name('teams.results');


Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

require __DIR__.'/auth.php';

<?php

use App\Http\Controllers\FootballController;
use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome')->name('football.home');
Route::get('/teams', [FootballController::class, 'getTeams'])->name('football.getTeams');
Route::get('/standings', [FootballController::class, 'getStandings'])->name('football.getStandings');
Route::get('/fixtures', [FootballController::class, 'fixtures'])->name('football.fixtures');
Route::get('/results', [FootballController::class, 'results'])->name('football.results');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

require __DIR__.'/auth.php';

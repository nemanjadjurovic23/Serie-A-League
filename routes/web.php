<?php

use App\Http\Controllers\FootballController;
use Illuminate\Support\Facades\Route;


Route::controller(FootballController::class)->name('football.')->group(function () {
    Route::get('/', 'welcome')->name('home');
    Route::get('/teams', 'getTeams')->name('getTeams');
    Route::get('/standings', 'getStandings')->name('getStandings');
    Route::get('/fixtures', 'fixtures')->name('fixtures');
    Route::get('/results', 'results')->name('results');
});

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

require __DIR__.'/auth.php';

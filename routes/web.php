<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\FootballController;
use App\Http\Controllers\ProfileController;
use App\Http\Middleware\AdminCheckMiddleware;
use Illuminate\Support\Facades\Route;

Route::controller(FootballController::class)->name('football.')->group(function () {
    Route::get('/', 'welcome')->name('home');
    Route::get('/teams', 'getTeams')->name('getTeams');
    Route::get('/standings', 'getStandings')->name('getStandings');
    Route::get('/fixtures', 'fixtures')->name('fixtures');
    Route::get('/results', 'results')->name('results');
    Route::get('/lineups/{match_id}', 'lineups')->name('lineups');
    Route::get('/players/statistics/{match_id}', 'playerStatistics')->name('playerStatistics');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(AdminCheckMiddleware::class)->prefix('admin')->group(function () {

    Route::controller(AdminController::class)->name('admin.')->group(function () {
        Route::get('/panel', 'index')->name('panel');

        Route::get('/add-teams', 'addTeams')->name('addTeams');
        Route::post('/add-team', 'addTeam')->name('addTeam');
        Route::post('/delete-team/{teamId}', 'deleteTeam')->name('deleteTeam');
        Route::post('/update-team/{teamId}', 'updateTeam')->name('updateTeam');

        Route::get('/add-standings', 'addStandings')->name('addStandings');
        Route::post('/add-standing', 'addStanding')->name('addStanding');
        Route::post('/delete-standing/{standingId}', 'deleteStanding')->name('deleteStanding');
        Route::post('/update-standing/{standingId}', 'updateStanding')->name('updateStanding');

        Route::get('/add-results', 'addResults')->name('addResults');
        Route::post('/add-result', 'addResult')->name('addResult');
        Route::post('/delete-result/{resultId}', 'deleteResult')->name('deleteResult');
        Route::post('/update-result/{resultId}', 'updateResult')->name('updateResult');

        Route::get('/add-lineups', 'addLineups')->name('addLineups');
        Route::post('/add-lineup', 'addLineup')->name('addLineup');
        Route::post('/delete-lineups/{lineupId}', 'deleteLineup')->name('deleteLineup');
        Route::post('/update-lineups/{lineupId}', 'updateLineup')->name('updateLineup');

        Route::get('/add-fixtures', 'addFixtures')->name('addFixtures');
        Route::post('/add-fixture', 'addFixture')->name('addFixture');
        Route::post('/delete-fixture/{fixtureId}', 'deleteFixture')->name('deleteFixture');
        Route::post('/update-fixture/{fixtureId}', 'updateFixture')->name('updateFixture');

        Route::get('/add-players', 'addPlayers')->name('addPlayers');
        Route::post('/add-player', 'addPlayer')->name('addPlayer');
        Route::post('/delete-player/{playerId}', 'deletePlayer')->name('deletePlayer');
        Route::post('/update-player/{playerId}', 'updatePlayer')->name('updatePlayer');
    });
});

require __DIR__ . '/auth.php';

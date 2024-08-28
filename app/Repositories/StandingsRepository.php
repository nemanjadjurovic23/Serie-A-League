<?php

namespace App\Repositories;

use App\Models\StandingsModel;

class StandingsRepository {

    private $standingsModel;
    public function __construct(StandingsModel $standingsModel)
    {
        $this->standingsModel = $standingsModel;
    }

    public function createStanding($request)
    {
        $this->standingsModel->create([
            'standings_id' => $request['standings_id'],
            'team_id' => $request->get('team_id'),
            'position' => $request->get('position'),
            'played' => $request->get('played'),
            'won' => $request->get('won'),
            'drawn' => $request->get('drawn'),
            'lost' => $request->get('lost'),
            'goals_for' => $request->get('goals_for'),
            'goals_against' => $request->get('goals_against'),
            'points' => $request->get('points'),
            'badge' => $request->get('badge'),
        ]);
    }

    public function updateStandings(StandingsModel $standings, $request)
    {
        $standings->update([
            'position' => $request->get('position'),
            'played' => $request->get('played'),
            'won' => $request->get('won'),
            'drawn' => $request->get('drawn'),
            'lost' => $request->get('lost'),
            'goals_for' => $request->get('goals_for'),
            'goals_against' => $request->get('goals_against'),
            'points' => $request->get('points'),
            'badge' => $request->get('badge'),
        ]);
    }
}

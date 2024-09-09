<?php

namespace App\Repositories;

use App\Models\EventsModel;

class ResultsRepository {

    private $resultsModel;

    public function __construct(EventsModel $resultsModel)
    {
        $this->resultsModel = new $resultsModel;
    }

    public function create($request)
    {
        $this->resultsModel->create([
            'match_id' => $request['match_id'],
            'country_id' => $request['country_id'],
            'league_id' => $request['league_id'],
            'match_date' => $request['match_date'],
            'match_status' => $request['match_status'],
            'home_team_id' => $request['home_team_id'],
            'home_team_score' => $request['home_team_score'],
            'away_team_id' => $request['away_team_id'],
            'away_team_score' => $request['away_team_score'],
            'match_home_team_system' => $request['match_home_team_system'],
            'match_away_team_system' => $request['match_away_team_system'],
            'match_round' => $request['match_round'],
            'match_referee' => $request['match_referee'],
            'league_year' => $request['league_year'],
        ]);
    }
}

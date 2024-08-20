<?php

namespace App\Repositories;

use App\Models\TeamsModel;

class TeamsRepository
{

    private $teamsModel;

    public function __construct()
    {
        $this->teamsModel = new TeamsModel();
    }

    public function createTeam($request)
    {
        $this->teamsModel->create([
            'team_id' => $request->get('team_id'),
            'name' => $request->get('name'),
            'founded' => $request->get('founded'),
            'badge' => $request->get('badge'),
            'stadium_name' => $request->get('stadium_name'),
            'city' => $request->get('city'),
            'stadium_capacity' => $request->get('stadium_capacity'),
        ]);
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\StandingsModel;
use App\Models\TeamsModel;

class FootballController extends Controller
{
    public function getTeams()
    {
        $teams = TeamsModel::all();
        return view('teams', compact('teams'));
    }

    public function getStandings()
    {
        $teams = StandingsModel::all();
        return view('standings', compact('teams'));
    }

    public function welcome()
    {
        $standings = StandingsModel::paginate(5);
        return view('welcome', compact('standings'));
    }
}

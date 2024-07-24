<?php

namespace App\Http\Controllers;

use App\Models\EventsModel;
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
        $teams = StandingsModel::with('teams')->get();
        return view('standings', compact('teams'));
    }

    public function welcome()
    {
        $standings = StandingsModel::paginate(5);
        return view('welcome', compact('standings'));
    }

    public function results()
    {
        $events = EventsModel::paginate(10);
        return view('results', compact('events'));
    }
}

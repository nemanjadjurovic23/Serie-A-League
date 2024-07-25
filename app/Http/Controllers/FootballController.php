<?php

namespace App\Http\Controllers;

use App\Models\CoachesModel;
use App\Models\EventsModel;
use App\Models\LineupsModel;
use App\Models\StandingsModel;
use App\Models\SubstitutesModel;
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
        $events = EventsModel::paginate(5);

        return view('welcome', compact('standings', 'events'));
    }

    public function results()
    {
        $events = EventsModel::paginate(10);
        return view('results', compact('events'));
    }

    public function lineups($match_id)
    {
        $homePlayers = LineupsModel::where('match_id', $match_id)->where('team_type', 'home')->get();
        $awayPlayers = LineupsModel::where('match_id', $match_id)->where('team_type', 'away')->get();
        $homeCoach = CoachesModel::where('match_id', $match_id)->where('team_type', 'home')->first();
        $awayCoach = CoachesModel::where('match_id', $match_id)->where('team_type', 'away')->first();
        $homeSubstitutes = SubstitutesModel::where('match_id', $match_id)->where('team_type', 'home')->get();
        $awaySubstitutes = SubstitutesModel::where('match_id', $match_id)->where('team_type', 'away')->get();
        $matches = EventsModel::where('match_id', $match_id)->get();

        return view('lineups', compact(
            'homePlayers', 'awayPlayers', 'homeCoach', 'awayCoach', 'homeSubstitutes', 'awaySubstitutes', 'match_id', 'matches'));
    }
}

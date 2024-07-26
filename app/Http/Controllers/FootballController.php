<?php

namespace App\Http\Controllers;

use App\Models\CoachesModel;
use App\Models\EventsModel;
use App\Models\LineupsModel;
use App\Models\PlayerStatisticsModel;
use App\Models\StandingsModel;
use App\Models\SubstitutesModel;
use App\Models\TeamsModel;
use Illuminate\View\View;

class FootballController extends Controller
{
    public function getTeams() : View
    {
        $teams = TeamsModel::all();
        return view('teams', compact('teams'));
    }

    public function getStandings() : View
    {
        $teams = StandingsModel::with('teams')->get();
        return view('standings', compact('teams'));
    }

    public function welcome() : View
    {
        $standings = StandingsModel::paginate(5);
        $events = EventsModel::paginate(5);

        return view('welcome', compact('standings', 'events'));
    }

    public function results() : View
    {
        $events = EventsModel::paginate(10);
        return view('results', compact('events'));
    }

    public function lineups($match_id) : View
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

    public function playerStatistics($id) : View
    {
        $playerStatistic = PlayerStatisticsModel::where('id', $id)->first();
        return view('player_statistics', compact( 'playerStatistic'));
    }
}

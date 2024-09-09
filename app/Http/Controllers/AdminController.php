<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddResultsRequest;
use App\Http\Requests\AddStandingsRequest;
use App\Http\Requests\AddTeamRequest;
use App\Models\EventsModel;
use App\Models\StandingsModel;
use App\Models\TeamsModel;
use App\Repositories\ResultsRepository;
use App\Repositories\StandingsRepository;
use App\Repositories\TeamsRepository;
use Illuminate\Http\Request;

class AdminController extends Controller
{

    private $teamRepository;
    private $standingsRepository;
    private $resultsRepository;
    public function __construct(TeamsRepository $teamsRepository, StandingsRepository $standingsRepository, ResultsRepository $resultsRepository)
    {
        $this->teamRepository = $teamsRepository;
        $this->standingsRepository = $standingsRepository;
        $this->resultsRepository = $resultsRepository;
    }
    public function index()
    {
        $standings = StandingsModel::paginate(10);
        $fixtures = EventsModel::paginate(6);
        return view('admin.index', compact('standings', 'fixtures'));
    }

    public function addTeams()
    {
        $teams = TeamsModel::paginate(10);
        return view('admin.teams', compact('teams'));
    }

    public function addTeam(AddTeamRequest $request)
    {
        $this->teamRepository->createTeam($request);
        return redirect()->back();
    }

    public function deleteTeam(TeamsModel $singleTeam)
    {
        $singleTeam->delete();
        return redirect()->back();
    }

    public function editTeam(TeamsModel $singleTeam)
    {
        return view('admin.edit-team', compact('singleTeam'));
    }
    public function updateTeam(TeamsModel $singleTeam, Request $request)
    {
        $this->teamRepository->updateTeam($singleTeam, $request);
        return redirect()->route('admin.addTeams');
    }

    public function editStanding(StandingsModel $singleTeam)
    {
        return view('admin.edit-team-standing', compact('singleTeam'));
    }

    public function updateStanding(StandingsModel $singleTeam, Request $request)
    {
        $this->standingsRepository->updateStandings($singleTeam, $request);
        return redirect()->route('admin.panel');
    }

    public function addStandings()
    {
        return view('admin.add-standing');
    }
    public function addStanding(AddStandingsRequest $request)
    {
        $this->standingsRepository->createStanding($request);
        return redirect()->back();
    }

    public function deleteTeamFromStanding(StandingsModel $singleTeam)
    {
        $singleTeam->delete();
        return redirect()->back();
    }

    public function addResults()
    {
        return view('admin.add-result');
    }

    public function addResult(AddResultsRequest $request)
    {
        $this->resultsRepository->create($request);
        return redirect()->route('admin.panel');
    }
}

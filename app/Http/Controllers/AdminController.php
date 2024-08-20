<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddTeamRequest;
use App\Models\EventsModel;
use App\Models\StandingsModel;
use App\Models\TeamsModel;
use App\Repositories\TeamsRepository;
use Illuminate\Http\Client\Request;

class AdminController extends Controller
{

    private $teamRepository;

    public function __construct(TeamsRepository $teamsRepository)
    {
        $this->teamRepository = new TeamsRepository();
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
        return redirect()->route('admin.index');
    }

    public function deleteTeams()
    {

    }

    public function deleteTeam()
    {

    }


}

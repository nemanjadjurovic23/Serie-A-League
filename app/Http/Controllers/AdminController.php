<?php

namespace App\Http\Controllers;

use App\Models\EventsModel;
use App\Models\StandingsModel;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $standings = StandingsModel::paginate(10);
        $fixtures = EventsModel::paginate(6);
        return view('admin.index', compact('standings', 'fixtures'));
    }

    public function addTeams()
    {

    }

    public function addTeam()
    {

    }

    public function deleteTeams()
    {

    }

    public function deleteTeam()
    {

    }


}

<?php

namespace App\Http\Controllers;

use App\Models\TeamsModel;
use GuzzleHttp\Client;

class TeamsController extends Controller
{
    public function index()
    {
        $teams = TeamsModel::all();
        return view('teams', compact('teams'));
    }
}

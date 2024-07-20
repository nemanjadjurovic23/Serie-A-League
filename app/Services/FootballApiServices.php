<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class FootballApiServices
{
    public function getFootballTeams()
    {
        $response = Http::get('https://apiv3.apifootball.com/', [
            'action' => 'get_teams',
            'league_id' => 207,
            'APIkey' => 'cb73089c945476df3a098a7690889b8231a786a17976c90ca533542c14771bb9'
        ]);

        return $response->json();
    }
}


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
            'APIkey' => env('FOOTBALL_API_KEY')
        ]);

        return $response->json();
    }

    public function getFootballStanding()
    {
        $response = Http::get('https://apiv3.apifootball.com/', [
            'action' => 'get_standings',
            'league_id' => 207,
            'APIkey' => env('FOOTBALL_API_KEY')
        ]);
        return $response->json();
    }

    public function getFootballEvents()
    {
        $response = Http::get('https://apiv3.apifootball.com/', [
            'action' => 'get_events',
            'from' => '2023-08-21',
            'to' => '2024-05-26',
            'league_id' => 207,
            'APIkey' => env('FOOTBALL_API_KEY')
        ]);
        return $response->json();
    }
}


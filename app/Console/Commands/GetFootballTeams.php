<?php

namespace App\Console\Commands;

use App\Models\TeamsModel;
use App\Services\FootballApiServices;
use Illuminate\Console\Command;

class GetFootballTeams extends Command
{
    protected $signature = 'app:football-teams';

    protected $description = 'Command description';

    public function handle()
    {

        $footballApiService = new FootballApiServices();
        $teams = $footballApiService->getFootballTeams();

        foreach ($teams as $team) {
            $venue = $team['venue'];

            TeamsModel::updateOrCreate(
                ['name' => $team['team_name']],
                [
                    'founded' => $team['team_founded'] ?? null,
                    'badge' => $team['team_badge'] ?? null,
                    'stadium_name' => $venue['venue_name'] ?? null,
                    'city' => $venue['venue_city'] ?? null,
                    'stadium_capacity' => $venue['venue_capacity'] ?? null,
                ]);
        }
        $this->info('Football teams imported successfully');
        return 0;

    }
}

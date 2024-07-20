<?php

namespace App\Console\Commands;

use App\Models\StandingsModel;
use App\Services\FootballApiServices;
use Illuminate\Console\Command;

class GetFootballStanding extends Command
{

    protected $signature = 'app:football-standing';

    protected $description = 'Command description';

    public function handle()
    {
        $apiFootballStanding = new FootballApiServices();
        $teams = $apiFootballStanding->getFootballStanding();

        foreach($teams as $team) {
            StandingsModel::updateOrCreate([
                'team_name' => $team['team_name'],
                'position' => $team['overall_league_position'],
                'played' => $team['overall_league_payed'],
                'won' => $team['overall_league_W'],
                'drawn' => $team['overall_league_D'],
                'lost' => $team['overall_league_L'],
                'goals_for' => $team['overall_league_GF'],
                'goals_against' => $team['overall_league_GA'],
                'points' => $team['overall_league_PTS'],
                'badge' => $team['team_badge'],
            ]);
        }
        $this->info('Football Standing imported successfully!');
        return 0;
    }
}

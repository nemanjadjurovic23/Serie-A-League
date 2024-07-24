<?php

namespace App\Console\Commands;

use App\Models\StandingsModel;
use App\Models\TeamsModel;
use App\Services\FootballApiServices;
use Illuminate\Console\Command;

class GetFootballStanding extends Command
{
    protected $signature = 'app:football-standing';

    protected $description = 'Command description';

    public function handle()
    {
        $apiFootballStanding = new FootballApiServices();
        $standings = $apiFootballStanding->getFootballStanding();

        foreach ($standings as $standing) {
            $team = TeamsModel::where('team_id', $standing['team_id'])->first();

            if ($team) {
                StandingsModel::updateOrCreate(
                    [
                        'standings_id' => $standing['league_id'],
                        'team_id' => $team->id,
                    ],
                    [
                        'position' => $standing['overall_league_position'],
                        'played' => $standing['overall_league_payed'],
                        'won' => $standing['overall_league_W'],
                        'drawn' => $standing['overall_league_D'],
                        'lost' => $standing['overall_league_L'],
                        'goals_for' => $standing['overall_league_GF'],
                        'goals_against' => $standing['overall_league_GA'],
                        'points' => $standing['overall_league_PTS'],
                        'badge' => $standing['team_badge'],
                    ]
                );
            } else {
                $this->warn("Team with ID {$standing['team_key']} not found in teams table.");
            }
        }
        $this->info('Football Standing imported successfully!');
        return 0;
    }
}

<?php

namespace App\Console\Commands;
use App\Models\EventsModel;
use Illuminate\Console\Command;
use App\Services\FootballApiServices;
use App\Models\LineupsModel;
use App\Models\SubstitutesModel;
use App\Models\CoachesModel;

class GetFootballLineups extends Command
{
    protected $signature = 'app:get-football-lineups {match_id}';
    protected $description = 'Get football lineups from API and store them in the database';

    public function handle()
    {
        $apiLineupsFootball = new FootballApiServices();
        $match_id = $this->argument('match_id');

        $lineups = $apiLineupsFootball->getFootballLineups($match_id);

        if (!EventsModel::where('match_id', $match_id)->exists()) {
            $this->error("Match ID $match_id does not exist in the events table.");
            return;
        }

        $home_team = $lineups[$match_id]['lineup']['home'];
        $away_team = $lineups[$match_id]['lineup']['away'];

        $this->storeLineup($home_team, $match_id, 'home');
        $this->storeLineup($away_team, $match_id, 'away');

        $this->info('Football Lineups successfully imported');
    }


    private function storeLineup($team, $match_id, $team_type)
    {
        foreach ($team['starting_lineups'] as $player) {
            LineupsModel::updateOrCreate([
                'match_id' => $match_id,
                'team_type' => $team_type,
                'lineup_player' => $player['lineup_player'],
                'lineup_number' => $player['lineup_number'],
                'lineup_position' => $player['lineup_position']
            ]);
        }

        foreach ($team['substitutes'] as $player) {
            SubstitutesModel::updateOrCreate([
                'match_id' => $match_id,
                'team_type' => $team_type,
                'substitute_player' => $player['lineup_player'],
                'substitute_number' => $player['lineup_number'],
                'substitute_position' => $player['lineup_position']
            ]);
        }

        foreach ($team['coach'] as $coach) {
            CoachesModel::updateOrCreate([
                'match_id' => $match_id,
                'team_type' => $team_type,
                'coach_name' => $coach['lineup_player']
            ]);
        }
    }
}


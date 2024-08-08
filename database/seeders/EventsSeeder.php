<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Http;
use App\Models\EventsModel;
use App\Models\LineupsModel;
use App\Models\SubstitutesModel;
use App\Models\CoachesModel;
use App\Services\FootballApiServices;

class EventsSeeder extends Seeder
{

    public function run()
    {
        $events = EventsModel::all();

        $apiLineupsFootball = new FootballApiServices();

        foreach ($events as $event) {
            $match_id = $event->match_id;
            $lineups = $apiLineupsFootball->getFootballLineups($match_id);

            $home_team = $lineups[$match_id]['lineup']['home'];
            $away_team = $lineups[$match_id]['lineup']['away'];

            $this->storeLineup($home_team, $match_id, 'home');
            $this->storeLineup($away_team, $match_id, 'away');
        }
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

        if (isset($team['coach']) && !empty($team['coach'])) {
            $coach = $team['coach'];
            CoachesModel::updateOrCreate([
                'match_id' => $match_id,
                'team_type' => $team_type,
                'coach_name' => $coach['lineup_player']
            ]);
        }
    }
}

<?php

namespace App\Console\Commands;
use App\Models\EventsModel;
use App\Models\TeamsModel;
use App\Services\FootballApiServices;
use Illuminate\Console\Command;

class GetFootballEvents extends Command
{
    protected $signature = 'app:football-events';
    protected $description = 'Import football events from API';

    public function handle()
    {
        $apiEventsFootball = new FootballApiServices();
        $events = $apiEventsFootball->getFootballEvents();

        foreach ($events as $event) {
            $homeTeamId = $event['match_hometeam_id'];
            $awayTeamId = $event['match_awayteam_id'];

            if (TeamsModel::where('team_id', $homeTeamId)->exists() && TeamsModel::where('team_id', $awayTeamId)->exists()) {
                EventsModel::updateOrCreate([
                    'match_id' => $event['match_id'],
                ], [
                    'country_id' => $event['country_id'],
                    'league_id' => $event['league_id'],
                    'match_date' => $event['match_date'],
                    'match_status' => $event['match_status'],
                    'home_team_id' => $homeTeamId,
                    'home_team_score' => $event['match_hometeam_score'],
                    'away_team_id' => $awayTeamId,
                    'away_team_score' => $event['match_awayteam_score'],
                    'match_home_team_system' => $event['match_hometeam_system'],
                    'match_away_team_system' => $event['match_awayteam_system'],
                    'match_round' => $event['match_round'],
                    'match_referee' => $event['match_referee'],
                    'league_year' => $event['league_year'],
                ]);
            } else {
                if (!TeamsModel::where('team_id', $homeTeamId)->exists()) {
                    $this->error("Home team not found for match ID: {$event['match_id']} - Home Team ID: {$homeTeamId}");
                }
                if (!TeamsModel::where('team_id', $awayTeamId)->exists()) {
                    $this->error("Away team not found for match ID: {$event['match_id']} - Away Team ID: {$awayTeamId}");
                }
            }
        }

        $this->info('Football Events successfully imported');
    }
}

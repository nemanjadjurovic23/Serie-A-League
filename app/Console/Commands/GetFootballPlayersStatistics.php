<?php

namespace App\Console\Commands;

use App\Models\PlayerStatisticsModel;
use App\Services\FootballApiServices;
use Illuminate\Console\Command;

class GetFootballPlayersStatistics extends Command
{
    protected $signature = 'app:get-football-players-statistics {match_id}';

    protected $description = 'Fetch and store football players statistics for a given match.';

    public function handle()
    {
        $apiFootballGetPlayersStatistics = new FootballApiServices();
        $match_id = $this->argument('match_id');
        $response = $apiFootballGetPlayersStatistics->getFootballPlayersStatistics($match_id);

        if (isset($response[$match_id]['player_statistics'])) {
            $playerStatistics = $response[$match_id]['player_statistics'];

            foreach ($playerStatistics as $playerStatistic) {

                PlayerStatisticsModel::updateOrCreate([
                    'match_id' => $match_id,
                    'player_number' => $playerStatistic['player_number'],
                ],
                    [
                    'player_name' => $playerStatistic['player_name'],
                    'team_name' => $playerStatistic['team_name'],
                    'player_position' => $playerStatistic['player_position'],
                    'player_is_captain' => $playerStatistic['player_is_captain'],
                    'player_is_subst' => $playerStatistic['player_is_subst'],
                    'player_shots_total' => $playerStatistic['player_shots_total'],
                    'player_shots_on_goal' => $playerStatistic['player_shots_on_goal'],
                    'player_goals' => $playerStatistic['player_goals'],
                    'player_goals_conceded' => $playerStatistic['player_goals_conceded'],
                    'player_assists' => $playerStatistic['player_assists'],
                    'player_offsides' => $playerStatistic['player_offsides'],
                    'player_fouls_drawn' => $playerStatistic['player_fouls_drawn'],
                    'player_fouls_commited' => $playerStatistic['player_fouls_commited'],
                    'player_tackles' => $playerStatistic['player_tackles'],
                    'player_blocks' => $playerStatistic['player_blocks'],
                    'player_total_crosses' => $playerStatistic['player_total_crosses'],
                    'player_acc_crosses' => $playerStatistic['player_acc_crosses'],
                    'player_interceptions' => $playerStatistic['player_interceptions'],
                    'player_clearances' => $playerStatistic['player_clearances'],
                    'player_saves' => $playerStatistic['player_saves'],
                    'player_duels_total' => $playerStatistic['player_duels_total'],
                    'player_duels_won' => $playerStatistic['player_duels_won'],
                    'player_dribble_attempts' => $playerStatistic['player_dribble_attempts'],
                    'player_dribble_succ' => $playerStatistic['player_dribble_succ'],
                    'player_yellowcards' => $playerStatistic['player_yellowcards'],
                    'player_redcards' => $playerStatistic['player_redcards'],
                    'player_passes' => $playerStatistic['player_passes'],
                    'player_passes_acc' => $playerStatistic['player_passes_acc'],
                    'player_key_passes' => $playerStatistic['player_key_passes'],
                    'player_minutes_played' => $playerStatistic['player_minutes_played'],
                    'player_rating' => $playerStatistic['player_rating'],
                ]);
            }
        }
    }
}

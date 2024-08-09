<?php

namespace App\Console\Commands;

use App\Models\StatisticsModel;
use App\Services\FootballApiServices;
use Illuminate\Console\Command;

class GetFootballStatistics extends Command
{
    protected $signature = 'app:get-football-statistics {match_id}';

    protected $description = 'Command description';

    public function handle()
    {
        $apiFootballStatistics = new FootballApiServices();
        $match_id = $this->argument('match_id');
        $statistics = $apiFootballStatistics->getFootballStatistics($match_id);

        if (!isset($statistics[$match_id]['statistics'])) {
            $this->error('No statistics found for match id: ' . $match_id);
            return;
        }

        foreach ($statistics as $statistic) {
            StatisticsModel::updateOrCreate([
                'match_id' => $match_id,
                'type' => $statistic['type'],
                'home' => $statistics['home'],
                'away' => $statistic['away'],
            ]);
        }
        $this->info('Match statistics imported successfully.');
    }
}

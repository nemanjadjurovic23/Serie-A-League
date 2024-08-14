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
        $statisticsData = $apiFootballStatistics->getFootballStatistics($match_id);

        if (!isset($statisticsData[$match_id]['statistics'])) {
            $this->error('No statistics found for match id: ' . $match_id);
            return;
        }

        $statistics = $statisticsData[$match_id]['statistics'];

        foreach ($statistics as $statistic) {
            if (!isset($statistic['type'])) {
                $this->warn('Skipping statistic entry due to missing "type" key.');
                continue;
            }

            StatisticsModel::updateOrCreate([
                'match_id' => $match_id,
                'type' => $statistic['type'],
                'home' => $statistic['home'],
                'away' => $statistic['away'],
            ]);
        }

        $this->info('Match statistics imported successfully.');
    }

}

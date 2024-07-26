<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EventsModel extends Model
{
    use HasFactory;

    protected $table = 'events';

    protected $fillable = [
        'match_id',
        'country_id',
        'league_id',
        'match_date',
        'match_status',
        'home_team_id',
        'home_team_score',
        'away_team_id',
        'away_team_score',
        'match_home_team_system',
        'match_away_team_system',
        'match_round',
        'match_referee',
        'league_year'
    ];

    public function homeTeam()
    {
        return $this->belongsTo(TeamsModel::class, 'home_team_id', 'team_id');
    }

    public function awayTeam()
    {
        return $this->belongsTo(TeamsModel::class, 'away_team_id', 'team_id');
    }

    public function playersStatistics()
    {
        return $this->hasMany(PlayerStatisticsModel::class, 'match_id', 'match_id');
    }
}

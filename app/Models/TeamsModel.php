<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TeamsModel extends Model
{
    use HasFactory;

    protected $table = 'teams';

    protected $fillable = [
        'team_id',
        'name',
        'founded',
        'badge',
        'stadium_name',
        'city',
        'stadium_capacity',
    ];

    public function standings()
    {
        $this->hasMany(StandingsModel::class, 'team_id');
    }

    public function homeTeams()
    {
        return $this->hasMany(EventsModel::class, 'home_team_id');
    }

    public function awayTeams()
    {
        return $this->hasMany(EventsModel::class, 'away_team_id');
    }
}

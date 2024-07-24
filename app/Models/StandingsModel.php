<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StandingsModel extends Model
{
    use HasFactory;

    protected $table = 'standings';

    protected $fillable = [
        'standings_id',
        'team_id',
        'position',
        'played',
        'won',
        'drawn',
        'lost',
        'goals_for',
        'goals_against',
        'points',
        'badge'
    ];

    public function teams()
    {
        return $this->belongsTo(TeamsModel::class, 'team_id');
    }
}

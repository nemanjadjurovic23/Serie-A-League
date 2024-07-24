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

    public function homeEvents()
    {
        return $this->hasMany(EventsModel::class, 'home_team_id', 'team_id');
    }

    public function awayEvents()
    {
        return $this->hasMany(EventsModel::class, 'away_team_id', 'team_id');
    }
}

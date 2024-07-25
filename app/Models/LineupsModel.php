<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LineupsModel extends Model
{
    use HasFactory;

    protected $table = 'lineups';
    protected $fillable = [
        'match_id',
        'team_type',
        'lineup_player',
        'lineup_number',
        'lineup_position',
    ];

    public function event()
    {
        return $this->belongsTo(EventsModel::class, 'match_id', 'match_id');
    }
}

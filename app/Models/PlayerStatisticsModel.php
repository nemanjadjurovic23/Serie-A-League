<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PlayerStatisticsModel extends Model
{
    use HasFactory;

    protected $table = 'player_statistics';

    protected $fillable = [
        'match_id',
        'player_name',
        'team_name',
        'player_number',
        'player_position',
        'player_is_captain',
        'player_is_subst',
        'player_shots_total',
        'player_shots_on_goal',
        'player_goals',
        'player_goals_conceded',
        'player_assists',
        'player_offsides',
        'player_fouls_drawn',
        'player_fouls_commited',
        'player_tackles',
        'player_blocks',
        'player_total_crosses',
        'player_acc_crosses',
        'player_interceptions',
        'player_clearances',
        'player_saves',
        'player_duels_total',
        'player_duels_won',
        'player_dribble_attempts',
        'player_dribble_succ',
        'player_yellowcards',
        'player_redcards',
        'player_passes',
        'player_passes_acc',
        'player_key_passes',
        'player_minutes_played',
        'player_rating',
    ];

    public function events()
    {
        $this->belongsTo(EventsModel::class, 'match_id', 'match_id');
    }
}

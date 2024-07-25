<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubstitutesModel extends Model
{
    use HasFactory;

    protected $table = 'substitutes';

    protected $fillable = [
        'match_id', 'team_type', 'substitute_player', 'substitute_number', 'substitute_position',
    ];

    public function event()
    {
        return $this->belongsTo(EventsModel::class, 'match_id', 'match_id');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CoachesModel extends Model
{
    use HasFactory;

    protected $table = 'coaches';

    protected $fillable = [
        'match_id', 'team_type', 'coach_name',
    ];

    public function event()
    {
        return $this->belongsTo(EventsModel::class, 'match_id', 'match_id');
    }
}

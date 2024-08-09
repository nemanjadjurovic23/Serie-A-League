<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StatisticsModel extends Model
{
    use HasFactory;

    protected $fillable = [
        'match_id',
        'type',
        'home',
        'away'
    ];

    public function events()
    {
        return $this->hasMany(EventsModel::class, 'match_id');
    }
}

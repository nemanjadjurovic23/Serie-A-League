<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddResultsRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'match_id' => 'integer|exists:matches,id',
            'country_id' => 'integer|id',
            'league_id' => 'integer|id',
            'match_date' => 'date|date_format:Y-m-d',
            'match_status' => 'string',
            'home_team_id' => 'integer|exists:teams,id',
            'home_team_score' => 'integer',
            'away_team_id' => 'integer|exists:teams,id',
            'away_team_score' => 'integer',
            'match_home_team_system' => 'string',
            'match_away_team_system' => 'string',
            'match_round' => 'integer',
            'match_referee' => 'string',
            'league_year' => 'string',
        ];
    }
}

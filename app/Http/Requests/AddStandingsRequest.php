<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddStandingsRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'standings_id' => 'integer|required|exists:standings,id',
            'team_id' => 'integer|required|unique:teams,team_id',
            'position' => 'integer|required',
            'played' => 'integer|required',
            'won' => 'integer|required',
            'drawn' => 'integer|required',
            'lost' => 'integer|required',
            'goals_for' => 'integer|required',
            'goals_against' => 'integer|required',
            'points' => 'integer|required',
            'badge' => 'string|required',
        ];
    }
}

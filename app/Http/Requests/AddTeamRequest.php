<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddTeamRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }


    public function rules(): array
    {
        return [
            'team_id' => 'integer|required|unique:teams,id',
            'name' => 'string|required',
            'founded' => 'string|required',
            'badge' => 'string|required',
            'stadium_name' => 'string|required',
            'city' => 'string|required',
            'stadium_capacity' => 'integer|required',
        ];
    }
}

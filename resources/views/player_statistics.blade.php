@extends('layout')

@section('content')
    <div class="container mt-5">
        <h1 class="text-center mb-4">Player Statistics</h1>
        <div class="table-responsive">
            <table class="table table-bordered table-striped">
                <thead class="table-dark">
                <tr>
                    <th>Player Name</th>
                    <th>Team Name</th>
                    <th>Player Number</th>
                    <th>Player Position</th>
                    <th>Is Captain</th>
                    <th>Is Substitute</th>
                    <th>Shots Total</th>
                    <th>Shots On Goal</th>
                    <th>Goals</th>
                    <th>Goals Conceded</th>
                    <th>Assists</th>
                    <th>Offsides</th>
                    <th>Fouls Drawn</th>
                    <th>Fouls Committed</th>
                    <th>Tackles</th>
                    <th>Blocks</th>
                    <th>Total Crosses</th>
                    <th>Accurate Crosses</th>
                    <th>Interceptions</th>
                    <th>Clearances</th>
                    <th>Saves</th>
                    <th>Total Duels</th>
                    <th>Duels Won</th>
                    <th>Dribble Attempts</th>
                    <th>Successful Dribbles</th>
                    <th>Yellow Cards</th>
                    <th>Red Cards</th>
                    <th>Passes</th>
                    <th>Accurate Passes</th>
                    <th>Key Passes</th>
                    <th>Minutes Played</th>
                    <th>Rating</th>
                </tr>
                </thead>
                <tbody>
                @foreach($playersStatistics as $playerStatistic)
                    <tr>
                        <td>{{ $playerStatistic->player_name }}</td>
                        <td>{{ $playerStatistic->team_name }}</td>
                        <td>{{ $playerStatistic->player_number }}</td>
                        <td>{{ $playerStatistic->player_position }}</td>
                        <td>{{ $playerStatistic->player_is_captain }}</td>
                        <td>{{ $playerStatistic->player_is_subst }}</td>
                        <td>{{ $playerStatistic->player_shots_total }}</td>
                        <td>{{ $playerStatistic->player_shots_on_goal }}</td>
                        <td>{{ $playerStatistic->player_goals }}</td>
                        <td>{{ $playerStatistic->player_goals_conceded }}</td>
                        <td>{{ $playerStatistic->player_assists }}</td>
                        <td>{{ $playerStatistic->player_offsides }}</td>
                        <td>{{ $playerStatistic->player_fouls_drawn }}</td>
                        <td>{{ $playerStatistic->player_fouls_commited }}</td>
                        <td>{{ $playerStatistic->player_tackles }}</td>
                        <td>{{ $playerStatistic->player_blocks }}</td>
                        <td>{{ $playerStatistic->player_total_crosses }}</td>
                        <td>{{ $playerStatistic->player_acc_crosses }}</td>
                        <td>{{ $playerStatistic->player_interceptions }}</td>
                        <td>{{ $playerStatistic->player_clearances }}</td>
                        <td>{{ $playerStatistic->player_saves }}</td>
                        <td>{{ $playerStatistic->player_duels_total }}</td>
                        <td>{{ $playerStatistic->player_duels_won }}</td>
                        <td>{{ $playerStatistic->player_dribble_attempts }}</td>
                        <td>{{ $playerStatistic->player_dribble_succ }}</td>
                        <td>{{ $playerStatistic->player_yellowcards }}</td>
                        <td>{{ $playerStatistic->player_redcards }}</td>
                        <td>{{ $playerStatistic->player_passes }}</td>
                        <td>{{ $playerStatistic->player_passes_acc }}</td>
                        <td>{{ $playerStatistic->player_key_passes }}</td>
                        <td>{{ $playerStatistic->player_minutes_played }}</td>
                        <td>{{ $playerStatistic->player_rating }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <div class="mt-4 d-flex justify-content-center">
        {{ $playersStatistics->links('pagination::bootstrap-4') }}
    </div>
@endsection


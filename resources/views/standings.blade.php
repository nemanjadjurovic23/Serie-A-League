@extends('layout')

@section('content')
    <div class="container my-5">
        <div class="table-responsive">
            <table class="table table-striped table-bordered">
                <thead class="thead-dark">
                <tr>
                    <th>Position</th>
                    <th>Badge</th>
                    <th>Team Name</th>
                    <th>Played</th>
                    <th>Won</th>
                    <th>Drawn</th>
                    <th>Lost</th>
                    <th>Goals For</th>
                    <th>Goals Against</th>
                    <th>Points</th>

                </tr>
                </thead>
                <tbody>
                @foreach($teams as $team)
                    <tr>
                        <td>{{ $team['position'] }}</td>
                        <td><img src="{{ $team['badge'] }}" alt="{{ $team['team_name'] }} Badge" style="max-height: 50px; object-fit: contain;"></td>
                        <td>{{ $team['team_name'] }}</td>
                        <td>{{ $team['played'] }}</td>
                        <td>{{ $team['won'] }}</td>
                        <td>{{ $team['drawn'] }}</td>
                        <td>{{ $team['lost'] }}</td>
                        <td>{{ $team['goals_for'] }}</td>
                        <td>{{ $team['goals_against'] }}</td>
                        <td>{{ $team['points'] }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection

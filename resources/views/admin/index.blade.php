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
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($standings as $standing)
                    <tr>
                        <td>{{ $standing['position'] }}</td>
                        <td><img src="{{ $standing['badge'] }}" alt="{{ $standing->teams->name }} Badge"
                                 style="max-height: 50px; object-fit: contain;"></td>
                        <td>{{ $standing->teams->name }}</td>
                        <td>{{ $standing['played'] }}</td>
                        <td>{{ $standing['won'] }}</td>
                        <td>{{ $standing['drawn'] }}</td>
                        <td>{{ $standing['lost'] }}</td>
                        <td>{{ $standing['goals_for'] }}</td>
                        <td>{{ $standing['goals_against'] }}</td>
                        <td>{{ $standing['points'] }}</td>
                        <td><a class="btn btn-success" href="{{ route('admin.editStanding', ['singleTeam' => $standing->id]) }}">Edit</a></td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <div class="d-flex justify-content-center mt-4">
            {{ $standings->links('pagination::bootstrap-4') }}
        </div>
    </div>

    <div class="container mt-4">
        <div class="table-responsive">
            <h2>Results <a class="btn btn-success">Edit</a></h2>
            <table class="table table-striped table-bordered">
                <thead>
                <tr>
                    <th>Match Round</th>
                    <th>Date</th>
                    <th>Results</th>
                    <th>Status</th>
                    <th>Formations</th>
                    <th>Referee</th>
                </tr>
                </thead>
                <tbody>
                @foreach($fixtures as $event)
                    <tr>
                        <td>{{ $event->match_round }}</td>
                        <td>{{ $event->match_date }}</td>
                        <td><b><i>
                                    {{ $event->homeTeam->name }} {{ $event->home_team_score }} -
                                    {{ $event->away_team_score }} {{ $event->awayTeam->name }}
                                </i></b></td>
                        <td>{{ $event->match_status }}</td>
                        <td>{{ $event->match_home_team_system }} | {{$event->match_away_team_system}}</td>
                        <td>{{ $event->match_referee }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <div class="d-flex justify-content-center mt-4">
            {{ $fixtures->links('pagination::bootstrap-4') }}
        </div>
    </div>

@endsection

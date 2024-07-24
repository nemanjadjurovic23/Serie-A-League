@extends('layout')

@section('content')
    <div class="container mt-4">
        <h2>Results</h2>
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
            @foreach($events as $event)
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

        <div class="d-flex justify-content-center mt-4">
            {{ $events->links('pagination::bootstrap-4') }}
        </div>
    </div>
@endsection

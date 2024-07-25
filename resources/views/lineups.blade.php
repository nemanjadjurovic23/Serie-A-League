@extends('layout')

@section('content')
    <div class="container mt-5">
        @foreach($matches as $match)
            <h2 class="mb-4">Match Lineup for: {{ $match->homeTeam->name }} VS {{ $match->awayTeam->name }}</h2>
        @endforeach

        <div class="row">
            <div class="col-md-6">
                <h3>Home Team</h3>
                <p><strong>Coach:</strong> {{ $homeCoach ? $homeCoach->coach_name : 'N/A' }}</p>
                <table class="table table-bordered">
                    <thead class="table-dark">
                    <tr>
                        <th scope="col">Player</th>
                        <th scope="col">Player Number</th>
                        <th scope="col">Player Position</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($homePlayers as $player)
                        <tr>
                            <td>{{ $player->lineup_player }}</td>
                            <td>{{ $player->lineup_number }}</td>
                            <td>{{ $player->lineup_position }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>

                <h4>Substitutes</h4>
                <table class="table table-bordered">
                    <thead class="table-dark">
                    <tr>
                        <th scope="col">Substitute Player</th>
                        <th scope="col">Substitute Number</th>
                        <th scope="col">Substitute Position</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($homeSubstitutes as $substitute)
                        <tr>
                            <td>{{ $substitute->substitute_player }}</td>
                            <td>{{ $substitute->substitute_number }}</td>
                            <td>{{ $substitute->substitute_position }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>

            <div class="col-md-6">
                <h3>Away Team</h3>
                <p><strong>Coach:</strong> {{ $awayCoach ? $awayCoach->coach_name : 'N/A' }}</p>
                <table class="table table-bordered">
                    <thead class="table-dark">
                    <tr>
                        <th scope="col">Player</th>
                        <th scope="col">Player Number</th>
                        <th scope="col">Player Position</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($awayPlayers as $player)
                        <tr>
                            <td>{{ $player->lineup_player }}</td>
                            <td>{{ $player->lineup_number }}</td>
                            <td>{{ $player->lineup_position }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>

                <h4>Substitutes</h4>
                <table class="table table-bordered">
                    <thead class="table-dark">
                    <tr>
                        <th scope="col">Substitute Player</th>
                        <th scope="col">Substitute Number</th>
                        <th scope="col">Substitute Position</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($awaySubstitutes as $substitute)
                        <tr>
                            <td>{{ $substitute->substitute_player }}</td>
                            <td>{{ $substitute->substitute_number }}</td>
                            <td>{{ $substitute->substitute_position }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection


@extends('layout')

@section('content')
    <div class="container">
        <h2>Add Match Result</h2>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <form action="{{ route('admin.addResult') }}" method="POST">
            @csrf
            <div class="row mb-3">
                <label for="match_id" class="col-sm-2 col-form-label">Match ID</label>
                <div class="col-sm-10">
                    <input type="number" class="form-control" id="match_id" name="match_id" required>
                </div>
            </div>

            <input type="hidden" name="country_id" value="5">
            <input type="hidden" name="league_id" value="207">

            <div class="row mb-3">
                <label for="match_date" class="col-sm-2 col-form-label">Match Date</label>
                <div class="col-sm-10">
                    <input type="date" class="form-control" id="match_date" name="match_date" required>
                </div>
            </div>

            <div class="row mb-3">
                <label for="match_status" class="col-sm-2 col-form-label">Match Status</label>
                <div class="col-sm-10">
                    <select class="form-control" id="match_status" name="match_status" required>
                        <option value="Finished" {{ old('match_status') == 'Finished' ? 'selected' : '' }}>Finished</option>
                        <option value="Will Start" {{ old('match_status') == 'Will Start' ? 'selected' : '' }}>Will Start</option>
                    </select>
                </div>
            </div>

            <div class="row mb-3">
                <label for="home_team_id" class="col-sm-2 col-form-label">Home Team</label>
                <div class="col-sm-10">
                    <select class="form-control" id="home_team_id" name="home_team_id" onchange="this.form.submit()" required>
                        <option value="">Select Home Team</option>
                        @foreach($teams as $team)
                            <option value="{{ $team->id }}" {{ old('home_team_id') == $team->id ? 'selected' : '' }}>
                                {{ $team->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="row mb-3">
                <label for="home_team_score" class="col-sm-2 col-form-label">Home Team Score</label>
                <div class="col-sm-10">
                    <input type="number" class="form-control" id="home_team_score" name="home_team_score" required>
                </div>
            </div>

            <div class="row mb-3">
                <label for="away_team_id" class="col-sm-2 col-form-label">Away Team</label>
                <div class="col-sm-10">
                    <select class="form-control" id="away_team_id" name="away_team_id" required>
                        <option value="">Select Away Team</option>
                        @foreach($teams as $team)
                            @if(old('home_team_id') != $team->id) <!-- Isključujemo izabrani Home Team -->
                            <option value="{{ $team->id }}" {{ old('away_team_id') == $team->id ? 'selected' : '' }}>
                                {{ $team->name }}
                            </option>
                            @endif
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="row mb-3">
                <label for="away_team_score" class="col-sm-2 col-form-label">Away Team Score</label>
                <div class="col-sm-10">
                    <input type="number" class="form-control" id="away_team_score" name="away_team_score" required>
                </div>
            </div>

            <div class="row mb-3">
                <label for="match_home_team_system" class="col-sm-2 col-form-label">Home Team System</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="match_home_team_system" name="match_home_team_system">
                </div>
            </div>

            <div class="row mb-3">
                <label for="match_away_team_system" class="col-sm-2 col-form-label">Away Team System</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="match_away_team_system" name="match_away_team_system">
                </div>
            </div>

            <div class="row mb-3">
                <label for="match_round" class="col-sm-2 col-form-label">Match Round</label>
                <div class="col-sm-10">
                    <input type="number" class="form-control" id="match_round" name="match_round">
                </div>
            </div>

            <div class="row mb-3">
                <label for="match_referee" class="col-sm-2 col-form-label">Match Referee</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="match_referee" name="match_referee">
                </div>
            </div>

            <div class="row mb-3">
                <label for="league_year" class="col-sm-2 col-form-label">League Year</label>
                <div class="col-sm-10">
                    <input type="number" class="form-control" id="league_year" name="league_year" required>
                </div>
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection

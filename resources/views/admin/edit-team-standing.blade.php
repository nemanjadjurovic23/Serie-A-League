@extends('layout')

@section('content')
    <div class="container my-5">
        <h2>Edit Team Standing</h2>
        <form action="{{ route('admin.updateStanding', ['singleTeam' => $singleTeam['id']]) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="position">Position</label>
                <input type="number" class="form-control" id="position" name="position" value="{{ $singleTeam['position'] }}" required>
            </div>
            <div class="form-group">
                <label for="badge">Badge URL</label>
                <input type="text" class="form-control" id="badge" name="badge" value="{{ $singleTeam['badge'] }}" required>
            </div>
            <div class="form-group">
                <label for="team_name">Team Name</label>
                <input type="text" class="form-control" id="team_name" name="team_name" value="{{ $singleTeam->teams->name }}" readonly>
            </div>
            <div class="form-group">
                <label for="played">Played</label>
                <input type="number" class="form-control" id="played" name="played" value="{{ $singleTeam['played'] }}" required>
            </div>
            <div class="form-group">
                <label for="won">Won</label>
                <input type="number" class="form-control" id="won" name="won" value="{{ $singleTeam['won'] }}" required>
            </div>
            <div class="form-group">
                <label for="drawn">Drawn</label>
                <input type="number" class="form-control" id="drawn" name="drawn" value="{{ $singleTeam['drawn'] }}" required>
            </div>
            <div class="form-group">
                <label for="lost">Lost</label>
                <input type="number" class="form-control" id="lost" name="lost" value="{{ $singleTeam['lost'] }}" required>
            </div>
            <div class="form-group">
                <label for="goals_for">Goals For</label>
                <input type="number" class="form-control" id="goals_for" name="goals_for" value="{{ $singleTeam['goals_for'] }}" required>
            </div>
            <div class="form-group">
                <label for="goals_against">Goals Against</label>
                <input type="number" class="form-control" id="goals_against" name="goals_against" value="{{ $singleTeam['goals_against'] }}" required>
            </div>
            <div class="form-group">
                <label for="points">Points</label>
                <input type="number" class="form-control" id="points" name="points" value="{{ $singleTeam['points'] }}" required>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
@endsection

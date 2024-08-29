@extends('layout')

@section('content')
    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow">
                    <div class="card-header bg-primary text-white">
                        <h4 class="mb-0">Add New Standing</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('admin.addStanding') }}" method="POST">
                            @csrf
                            <div class="form-row">
                                <div class="form-group col-md-6 mb-3">
                                    <label for="team_id">Team ID</label>
                                    <input type="number" class="form-control" id="team_id" name="team_id" placeholder="Enter Team ID" required>
                                </div>
                                <div class="form-group col-md-6 mb-3">
                                    <label for="standings_id">Standings ID</label>
                                    <input type="number" class="form-control" id="standings_id" name="standings_id" placeholder="Enter Standings ID" required>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6 mb-3">
                                    <label for="position">Position</label>
                                    <input type="number" class="form-control" id="position" name="position" placeholder="Enter Position" required>
                                </div>
                                <div class="form-group col-md-6 mb-3">
                                    <label for="played">Played</label>
                                    <input type="number" class="form-control" id="played" name="played" placeholder="Enter Played Matches" required>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-4 mb-3">
                                    <label for="won">Won</label>
                                    <input type="number" class="form-control" id="won" name="won" placeholder="Enter Won Matches" required>
                                </div>
                                <div class="form-group col-md-4 mb-3">
                                    <label for="drawn">Drawn</label>
                                    <input type="number" class="form-control" id="drawn" name="drawn" placeholder="Enter Drawn Matches" required>
                                </div>
                                <div class="form-group col-md-4 mb-3">
                                    <label for="lost">Lost</label>
                                    <input type="number" class="form-control" id="lost" name="lost" placeholder="Enter Lost Matches" required>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6 mb-3">
                                    <label for="goals_for">Goals For</label>
                                    <input type="number" class="form-control" id="goals_for" name="goals_for" placeholder="Enter Goals For" required>
                                </div>
                                <div class="form-group col-md-6 mb-3">
                                    <label for="goals_against">Goals Against</label>
                                    <input type="number" class="form-control" id="goals_against" name="goals_against" placeholder="Enter Goals Against" required>
                                </div>
                            </div>
                            <div class="form-group mb-3">
                                <label for="points">Points</label>
                                <input type="number" class="form-control" id="points" name="points" placeholder="Enter Points" required>
                            </div>
                            <div class="form-group mb-3">
                                <label for="badge">Badge URL</label>
                                <input type="url" class="form-control" id="badge" name="badge" placeholder="Enter Badge URL">
                            </div>
                            <div class="form-group text-center">
                                <button type="submit" class="btn btn-primary btn-block">Add Standing</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

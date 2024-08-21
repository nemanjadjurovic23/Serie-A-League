@extends('layout')

@section('content')
    <div class="container my-5">
        <div class="card shadow-sm mb-5">
            <div class="card-header bg-primary text-white text-center">
                <h4>Add New Team</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.addTeam') }}" method="POST">
                    @csrf
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="name">Team Name</label>
                            <input type="text" class="form-control" id="name" name="name" required>
                        </div>
                        <div class="form-group col-md-2">
                            <label for="name">Team Id</label>
                            <input type="number" class="form-control" id="team_id" name="team_id" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="stadium_capacity">Stadium Capacity</label>
                            <input type="number" class="form-control" id="stadium_capacity" name="stadium_capacity" required>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="founded">Founded Year</label>
                            <input type="text" class="form-control" id="founded" name="founded" required>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="stadium_name">Stadium Name</label>
                            <input type="text" class="form-control" id="stadium_name" name="stadium_name" required>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="city">City</label>
                            <input type="text" class="form-control" id="city" name="city" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="badge">Badge URL</label>
                        <input type="text" class="form-control" id="badge" name="badge" required>
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-primary">Add Team</button>
                    </div>
                </form>
            </div>
        </div>

        <div class="row">
            @foreach($teams as $team)
                <div class="col-md-6 mb-4">
                    <div class="card border-primary h-100">
                        <img src="{{ $team->badge }}" class="card-img-top img-fluid" alt="{{ $team->name }} Badge" style="max-height: 200px; object-fit: contain;">
                        <div class="card-body">
                            <h5 class="card-title text-primary">{{ $team->name }}</h5>
                            <p class="card-text"><strong>Founded:</strong> {{ $team->founded }}</p>
                            <p class="card-text"><strong>Stadium:</strong> {{ $team->stadium_name }}</p>
                            <p class="card-text"><strong>City:</strong> {{ $team->city }}</p>
                            <p class="card-text"><strong>Capacity:</strong> {{ $team->stadium_capacity }}</p>
                        </div>
                        <div class="card-footer d-flex justify-content-center">
                            <a class="btn btn-success" href="#">Edit</a>
                            <a class="btn btn-danger ml-2" href="#">Delete</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="d-flex justify-content-center mt-4">
            {{ $teams->links('pagination::bootstrap-4') }}
        </div>
    </div>
@endsection


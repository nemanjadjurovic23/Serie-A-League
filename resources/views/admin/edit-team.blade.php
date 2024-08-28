@extends('layout')

@section('content')
    <div class="container my-5">
        <div class="card shadow-sm">
            <div class="card-header bg-primary text-white text-center">
                <h4>Edit Team: {{ $singleTeam->name }}</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.updateTeam', ['singleTeam' => $singleTeam->id]) }}" method="POST">
                    @csrf
                    @method("PUT")

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="name">Team Name</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{ $singleTeam->name }}" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="founded">Founded Year</label>
                            <input type="text" class="form-control" id="founded" name="founded" value="{{ $singleTeam->founded }}" required>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="stadium_name">Stadium Name</label>
                            <input type="text" class="form-control" id="stadium_name" name="stadium_name" value="{{ $singleTeam->stadium_name }}" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="city">City</label>
                            <input type="text" class="form-control" id="city" name="city" value="{{ $singleTeam->city }}" required>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="stadium_capacity">Stadium Capacity</label>
                            <input type="number" class="form-control" id="stadium_capacity" name="stadium_capacity" value="{{ $singleTeam->stadium_capacity }}" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="badge">Badge URL</label>
                            <input type="text" class="form-control" id="badge" name="badge" value="{{ $singleTeam->badge }}" required>
                        </div>
                    </div>

                    <div class="text-center">
                        <button type="submit" class="btn btn-primary">Update Team</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

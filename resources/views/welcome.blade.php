@extends('layout')

@section('content')
    <div class="jumbotron jumbotron-fluid" style="background: url('https://www.football-magazine.it/wp-content/uploads/2023/06/serieanews.png') no-repeat center center; background-size: cover; color: white;">
        <div class="container">
            <h1 class="display-4">Welcome to Serie A!</h1>
            <p class="lead">This is the official website for Serie A. Stay updated with the latest news, fixtures, and results.</p>
            <hr class="my-4" style="border-color: white;">
            <p>Check out the teams, standings, and more.</p>
            <a class="btn btn-primary btn-lg" href="#" role="button">Learn more</a>
        </div>
    </div>

    <div class="container mt-4">
        <h2>Standings</h2>
        <table class="table table-striped">
            <thead>
            <tr>
                <th>Position</th>
                <th>Logo</th>
                <th>Team</th>
                <th>Played</th>
                <th>Points</th>
            </tr>
            </thead>
            <tbody>
            @foreach($standings as $standing)
                <tr>
                    <td>{{ $standing->position }}</td>
                    <td><img src="{{ $standing->badge }}" alt="{{ $standing->team_name }} Logo" style="width: 50px; height: auto;"></td>
                    <td>{{ $standing->team_name }}</td>
                    <td>{{ $standing->played }}</td>
                    <td>{{ $standing->points }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>

        <div class="d-flex justify-content-center mt-4">
            {{ $standings->links('pagination::bootstrap-4') }}
        </div>
    </div>
@endsection


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
                <th>Team</th>
                <th>Points</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td>1</td>
                <td>Juventus</td>
                <td>75</td>
            </tr>
            <tr>
                <td>2</td>
                <td>AC Milan</td>
                <td>70</td>
            </tr>
            <!-- Add more rows as needed -->
            </tbody>
        </table>
    </div>

    <div class="container mt-4">
        <h2>Fixture Calendar</h2>
        <div class="row">
            <div class="col-md-6">
                <div class="card mb-3">
                    <div class="card-body">
                        <h5 class="card-title">Match 1</h5>
                        <p class="card-text">Team A vs Team B</p>
                        <p class="card-text">Date: 2024-07-18</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card mb-3">
                    <div class="card-body">
                        <h5 class="card-title">Match 2</h5>
                        <p class="card-text">Team C vs Team D</p>
                        <p class="card-text">Date: 2024-07-19</p>
                    </div>
                </div>
            </div>
            <!-- Add more cards for additional matches -->
        </div>
    </div>
@endsection

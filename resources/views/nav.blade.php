<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#">Serie A</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
            <li class="nav-item active">
                <a class="nav-link" href="{{ route('football.home') }}">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('football.getTeams') }}">Teams</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('football.fixtures') }}">Fixtures</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('football.results') }}">Results</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('football.getStandings') }}">Standings</a>
            </li>
        </ul>
    </div>
</nav>

@extends('layout')

@section('content')
    <div class="container my-5">
        <div class="row">
            @foreach($teams as $team)
                <div class="col-md-6 mb-4">
                    <div class="card border-primary bg-light">
                        <img src="{{ $team->badge }}" class="card-img-top img-fluid" alt="{{ $team->name }} Badge" style="max-height: 200px; object-fit: contain;">
                        <div class="card-body" style="background-color: #f8f9fa;">
                            <h5 class="card-title text-primary">{{ $team->name }}</h5>
                            <p class="card-text"><strong>Founded:</strong> {{ $team->founded }}</p>
                            <p class="card-text"><strong>Stadium:</strong> {{ $team->stadium_name }}</p>
                            <p class="card-text"><strong>City:</strong> {{ $team->city }}</p>
                            <p class="card-text"><strong>Capacity:</strong> {{ $team->stadium_capacity }}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection

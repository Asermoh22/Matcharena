














@extends('layout')

@section('title')
{{$team->nameteams}}
@endsection

@section('content')
<link rel="stylesheet" href="{{ url('css/index.css') }}">

<nav class="navbar navbar-light fixed-top" style="background-color: rgb(31, 31, 31); height : 80px; width : 100%; z-index: 1000;">
    <div class="header">
        <i class="fa-solid fa-futbol"></i>
        <h4 style="position: relative; top : 4px; color: white;">MATCHARENA</h4>
    </div>
</nav>


<h1 class="mt-5" style="margin: 0; padding: 0; position: relative; top : 50px; left : 30px;">Players - {{$team->nameteams}}</h1>

<div class="container">
    <div class="row">
        @foreach ($playersByPosition as $position => $players)
        <h2 style="margin-top : 7px">{{ ucfirst($position) }}s</h2> 

        <div class="row">
            @foreach ($players as $player)
                <div class="col-md-2">
                    <div class="card" style="width : 240px; margin-top :7px; ">
                        <img src="{{ asset('uploads/players/arsenal/' . $player->img) }}" class="card-img-top" alt="{{ $player->name }}">
                        <div class="card-body">
                            <h5 class="card-title">{{ $player->name }}</h5>
                            <p class="card-text">Number: {{ $player->jersey_number }}</p>
                            <p class="card-text">Goals: {{ $player->goals_scored }}</p>
                            <p class="card-text">Assists: {{ $player->assists }}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endforeach
    </div>
</div>
@endsection


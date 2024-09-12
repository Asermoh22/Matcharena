@extends('layout')

@section('title')
     {{-- {{$team->nameteams}} --}}{{$player->name}}
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
        @foreach ($players as $player)
            <div class="col-md-2 mb-2 d-flex justify-content-center" style="flex: 0 0 20%; max-width : 20%;">
                <a href="#" style="text-decoration: none; color: inherit;">
                    <div id="cc" class="card" style="width : 80%; background-color: rgb(31, 31, 31); margin: 0.5rem;">
                        <img src="{{ asset('uploads/players/arsenal/' . $player->img) }}" class="card-img-top" alt="{{ $player->name }}">
                        <div class="card-body">
                            <p class="card-text" style="color: white; font-size: 0.8rem;">{{ $player->name }}</p>
                        </div>
                    </div>
                </a>
            </div>
        @endforeach
    </div>
</div>
@endsection

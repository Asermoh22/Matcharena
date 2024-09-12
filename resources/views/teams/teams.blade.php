@extends('layout')

@section('title')
    Teams - {{$league->nameleague}}
@endsection

@section('content')
<link rel="stylesheet" href="{{ url('css/index.css') }}">

<nav class="navbar navbar-light fixed-top" style="background-color: rgb(31, 31, 31); height : 80px; width : 100%; z-index: 1000;">
    <div class="header" style="position: relative; left :30px">
        <i class="fa-solid fa-futbol"></i>
        <h4 style="position: relative; top : 4px;color: white;">MATCHARENA</h4>

     
    </div>
</nav>

<div style="background-color: #5c5470; height : 7px; margin-top : 80px; width : 100%;">
</div>
<h1 class="mt-5" style="margin: 0; padding: 0; position: relative; top : 5px; left : 30px;">{{$league->nameleague}}
</h1>
@if ($standing && $standing->isNotEmpty())
    <table class="table table-dark table-striped" style="position: relative; top :40px ;">
        <thead>
          <tr>
            <th scope="col">Position</th>
            <th scope="col">Club</th>
            <th scope="col">Played</th>
            <th scope="col">Won</th>
            <th scope="col">Drawn</th>
            <th scope="col">Loss</th>
            <th scope="col">GF</th> <!-- Goals For -->
            <th scope="col">GA</th> <!-- Goals Against -->
            <th scope="col">GD</th> <!-- Goal Difference -->
            <th scope="col">Points</th>
          </tr>
        </thead>
        <tbody>
          @foreach($standing as $item)
          <tr class="table-dark">
            <!-- Position -->
            <th scope="row">{{ $item->position }}</th>
            
            <!-- Club (with team logo) -->
            <td>
                <img src="{{ asset('uploads/teams/' . $item->team->img) }}" alt="{{ $item->team->nameteams }}" style="width : 30px; height : 37px; border-radius: 10%; margin-right : 10px;">
                {{ $item->team->nameteams }}
            </td>

            <td>{{ $item->played_games }}</td>
            <td>{{ $item->wins }}</td>
            <td>{{ $item->draws }}</td>
            <td>{{ $item->losses }}</td>
            <td>{{ $item->goals_scored }}</td>
            <td>{{ $item->goals_conceded }}</td>
            <td>{{ $item->goal_difference }}</td>
            <td>{{ $item->points }}</td>
          </tr>
          @endforeach
        </tbody>
    </table>
@else
    <p style="display: none;">No standings available.</p>
@endif






<div class="container" style="margin-top : 100px">
    <h1 class="mt-5" style="margin: 0; padding: 0; position: relative; top : -40px; left : -90px;">Teams </h1>

    <div class="row">
        @foreach ($teams as $team)
            <div class="col-md-2 mb-2 d-flex justify-content-center" style="flex: 0 0 20%; max-width : 20%;">
                <a href="{{route('player.show',$team->id)}}" style="text-decoration: none; color: inherit;">
                    <div id="cc" class="card" style="width : 80%; background-color: rgb(31, 31, 31); margin: 0.5rem;">
                        <img src="{{ asset('uploads/teams/' . $team->img) }}" class="card-img-top" alt="{{ $team->nameteams }}">
                        <div class="card-body">
                            <p class="card-text" style="color: white; font-size: 0.8rem;">{{ $team->nameteams }}</p>
                        </div>
                    </div>
                </a>
            </div>
        @endforeach
    </div>
</div>




<div class="containerr" style="position: relative; top : 150px;">
    <h1 style="position: relative; left :30px">Upcoming Games</h1>
    @foreach ($dailygames as $game)
  
        <div class="game" style="background-color: rgb(31, 31, 31); margin-bottom : 10px; padding: 10px; border-radius: 8px; width :60%; position: relative; left :320px ">
            <div class="game-details" style="display: flex; align-items: center; justify-content: space-between;">
                <div class="team" style="display: flex; align-items: center; position: relative; left :100px ">
                    <img src="{{ asset('uploads/teams/' . $game->homeTeam->img) }}" 
                         style="width : 25px; height : 30px; border-radius: 10%; margin-right : 10px;">
                    {{ $game->homeTeam->nameteams }}
                </div>
                <div class="vs" style="margin: 0; padding:0;  position: absolute; left : 50%; transform: translateX(-50%);" >vs</div>
                <div class="team" style="display: flex; align-items: center; position: relative; right :100px ">
                    {{ $game->awayTeam->nameteams }}
                    <img src="{{ asset('uploads/teams/' . $game->awayTeam->img) }}" 
                    style="width : 25px; height : 30px; border-radius: 10%; margin-left : 10px;">
                </div>
            </div>
            <div class="details" style="text-align: center; color: #fff; margin-top : 5px;">
                <span>{{ $game->match_time }} on {{ $game->match_date }}</span> |
                <span>{{ $game->location }}</span>
            </div>
        </div>
        
        
    @endforeach
</div>












@if ($league->id===9)
<h1 style="position: relative; top :220px; left :30px">Top Goalscorers of the Last 5 Years</h1>

<div style=" position: relative; top :220px;" >
    @foreach ($topPlayersByLeague as $player)
    <ul class="list-group" >
        <li class="list-group-item d-flex align-items-center" style="background-color:rgb(31, 31, 31); color:rgb(255, 255, 255); border-color:rgb(66, 66, 66)">
            <span style="width : 30px; text-align: center; margin-right : 10px;">{{ $loop->iteration }}</span>


            <img src="{{ asset('uploads/players/arsenal/'  . $player->img) }}" alt="{{ $player->name }}" style="width : 60px; height : 60px; border-radius: 50%; margin-right : 10px;">

            <div>
                <strong>{{ $player->name }}</strong>
                <p style="margin: 0;">Goals Scored: {{ $player->goals_scored }}</p>

            </div>
        </li>
    </ul>
    @endforeach
</div>

@endif


@endsection

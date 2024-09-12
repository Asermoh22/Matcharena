@extends('layout')

@section('title')
    Transfers
@endsection

@section('content')
<link rel="stylesheet" href="{{ url('css/main.css') }}">

<nav class="navbar navbar-light" style="background-color: rgb(31, 31, 31); height : 80px;">
    <div class="container-fluid">
      
     
      @auth
      <h3 style="color: white; position: absolute; left : 1280px; top : 25px;">
        {{ Auth::user()->name }}
      </h3>
      @endauth

      <a href="{{route('auth.logout')}}" class="btn btn-danger" style="position: relative; left :1430px">Logout</a>
    
  
    </div>
  </nav>
  
<div style="background-color: #5c5470; height : 7px;  width : 100%;">
</div>


<h1 style="position: relative; top : 50px; left :350px">Transfers</h1>

<!-- Container for all transfers -->
<div class="container" style="position: relative; top : 120px; left :200px">
    <div class="row justify-content-center">
        @foreach ($transfers as $item)
        <div class="col-md-5 col-lg-4 mb-5">
            <div class="transfer-card" style="background-color: rgb(31, 31, 31); padding: 20px; border-radius: 20px; color: white; text-align: center;">
                <!-- Player Image -->
                <img src="{{ asset('uploads/players/arsenal/' . $item->player->img) }}" class="card-img-top mb-3" style="width : 150px; height : 150px; border-radius: 20px;">
                
                <h2>{{$item->player->name}}</h2>

                <div class="d-flex justify-content-around align-items-center">
                    <!-- To Team -->
                    <div>
                        <h4>To:</h4>
                        <h3>{{$item->to_team}}</h3>
                    </div>

                    <!-- Transfer Icon -->
                    <img src="{{ asset('img/Transfer-Free-PNG-Image.png') }}" alt="Transfer Icon" style="width : 80px; height : 80px;">

                    <!-- From Team -->
                    <div>
                        <h4>From:</h4>
                        <h3>{{$item->from_team}}</h3>
                    </div>
                </div>

                <!-- Transfer Value -->
                <h3 class="mt-3">Value: {{$item->amount}}</h3>
            </div>
        </div>
        @endforeach
    </div>
</div>

<div class="sidebar">
    <div class="header">
        <i class="fa-solid fa-futbol"></i>
        <H4 style="position: relative; top : 5px">MATCHARENA</H4>
    </div>
    <div class="navigation">
        <ul>
            <li>
                <a href="{{route('main.leauge')}}">
                    <span class="fa-solid fa-house-chimney"></span>
                    <span>Home</span>
                </a>
            </li>
            <li>
                <a href="{{ route('transfer.player') }}">
                    <span class="fa-solid fa-right-left"></span>
                    <span>Transfer</span>
                </a>
            </li>
            <li>
                <a href="{{route('news.index')}}">
                    <span class="fa-solid fa-newspaper"></span>
                    <span>News</span>
                </a>
            </li>
            <li>
                <a href="{{route('aboutus.main')}}">
                    <span class="fa fa-eye"></span>
                    <span>About Us</span>
                </a>
            </li>

            @if (Auth::check() && Auth::user()->is_admin === 1)
            <li>
                <a href="{{ route('main.create') }}"> 
                    <span class="fa fa-plus-square"></span>
                    <span>Add League</span>
                </a>
            </li>

            <li>
                <a href="{{ route('players.create') }}"> 
                    <span class="fa fa-plus-square"></span>
                    <span>Add Player</span>
                </a>
            </li>

            <li>
                <a href="{{ route('news.create') }}"> 
                    <span class="fa fa-plus-square"></span>
                    <span>Add News</span>
                </a>
            </li>

            
            <li>
                <a href="{{ route('teams.create') }}"> 
                    <span class="fa fa-plus-square"></span>
                    <span>Add Teams</span>
                </a>
            </li>
        @endif
        </ul>
    </div>
</div>
@endsection

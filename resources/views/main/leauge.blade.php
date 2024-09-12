@extends('layout')
@section('title')
    Main
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

  
<div style="background-color: #5c5470; height : 7px;   width : 100%;">
</div>



  

<h1 style="position: relative; left :320px; top :20px; margin:0;padding:0;">Leagues</h1>
<div class="container"   >
    <div class="row d-flex justify-content-around">
        @foreach ($leagues as $league)
            <div class="col-md-4 mb-4 d-flex justify-content-center">
                <a href="{{route('main.show',$league->id)}}" style="text-decoration: none; color: inherit;">
                    <div id="cc" class="card" style="width : 17rem; background-color: rgb(31, 31, 31);">
                        <img src="{{ asset('uploads/leagues/' . $league->img) }}" class="card-img-top" alt="...">
                        <div class="card-body">
                            <p class="card-text" style="color: white">{{ $league->nameleague }}</p>
                        </div>
                    </div>
                </a>
            </div>
        @endforeach
    </div>
</div>














<div class="sidebar">
    <div class="header">
        <i class="fa-solid fa-futbol" ></i>
        <H4 style="position: relative; top :5px">MATCHARENA</H4>
    </div>    <div class="navigation">
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

            <li><a class="dropdown-item" href="{{ route('main.create') }}"><span class="fa fa-plus-square"></span> Add League</a></li>
            <li><a class="dropdown-item" href="{{ route('players.create') }}"><span class="fa fa-plus-square"></span> Add Player</a></li>
            <li><a class="dropdown-item" href="{{ route('news.create') }}"><span class="fa fa-plus-square"></span> Add News</a></li>
            <li><a class="dropdown-item" href="{{ route('teams.create') }}"><span class="fa fa-plus-square"></span> Add Teams</a></li>
        
              

           
            
            
            @endif
            
        </ul>
    </div>
</div>
@endsection
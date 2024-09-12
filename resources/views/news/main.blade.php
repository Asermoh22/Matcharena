@extends('layout')

@section('title')
    News
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



  

<h1 style="position: relative; top : 50px; left :350px">News</h1>

<div class="container"   >
    <div class="row d-flex justify-content-around">
        @foreach ($news as $new)
            <div class="col-md-4 mb-4 d-flex justify-content-center">
                {{-- <a href="{{route('main.show',$league->id)}}" style="text-decoration: none; color: inherit;"> --}}
                    <div id="cc" class="card" style="width : 17rem; background-color: rgb(31, 31, 31);">
                        <img src="{{ asset('uploads/News/' . $new->img) }}" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h3 class="card-text" style="color: white">{{ $new->title }}</h3>
                            <p class="card-text" style="color: white">{{ $new->body }}</p>
                            <p class="card-text" style="color: white">{{ $new->author }}</p>


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
    

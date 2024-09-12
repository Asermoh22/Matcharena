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



  

<h1 style="position: relative; top : 50px; left :350px">About us</h1>
<div class="container">
    <section class="about-us" style="position: relative; left :70px">
        <h2>Aser Mohamed</h2>
        <p><strong>Backend Developer - PHP/Laravel</strong></p>
        <p>Welcome to our website! I'm Aser Mohamed, a passionate backend developer specializing in PHP and Laravel. With a strong background in building robust and scalable applications,</p>
        <p>I focus on crafting seamless and efficient backend solutions.</p>
        <p>I take pride in developing secure and high-performance systems, leveraging the latest technologies to deliver top-notch results. Whether it's creating complex APIs, managing databases,</p>
        <p>or optimizing server-side processes, I'm dedicated to ensuring your project's success.</p>
    </section>
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
                <a href="#">
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
    

@extends('layout')
@section('title')
    Main
@endsection


@section('content')

<link rel="stylesheet" href="{{ url('css/index.css') }}">
    
<nav class="navbar navbar-light" style="background-color: rgb(31, 31, 31); height : 80px;">
    
    @auth
    <h3 style="color: white; position: relative; left : 1280px; top : 5px">{{ Auth::user()->name }}</h3>
    @endauth

    <a class="navbar-brand" id="nav" style="color: white;">
       
    </a>
    
</nav>
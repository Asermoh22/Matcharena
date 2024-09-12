@extends('layout')

@section('title')
    Add player
@endsection

@section('content')
<link rel="stylesheet" href="{{ url('css/create.css') }}">

<nav class="navbar navbar-light" style="background-color: rgb(31, 31, 31); height : 80px; position: fixed; width : 100% ; top : 0; z-index: 1000;">
    <div class="header">
        <H4 style="position: relative; top :4px; left :30px; color:#5c5470">MATCHARENA</H4>
    </div>



   
</nav>
@if ($errors->any())
    <div class="alert alert-dark">
        @foreach ($errors->all() as $error)
            <p>{{ $error }}</p>
        @endforeach
    </div>
@endif

<h1>Add Player</h1>
<form action="{{ route('players.store') }}" method="post" enctype="multipart/form-data">
    @csrf

    <div class="mb-3">
        <label for="title" class="form-label" style="position: relative; left :550px; top :100px">player :</label>
        <input type="text" class="form-control" id="exampleInputEmail1" name="name" style="position: relative; left :550px; top :100px">
    </div>

    <div class="mb-3">
        <label for="league_id" class="form-label" style="position: relative; left :550px; top :100px">Team ID :</label>
        <input type="number" class="form-control" id="exampleInputEmail1" name="team_id" style="position: relative; left :550px;top :100px">
    </div>

    
    <div class="mb-3">
        <label for="title" class="form-label" style="position: relative; left :550px; top :100px">position :</label>
        <input type="text" class="form-control" id="exampleInputEmail1" name="position" style="position: relative; left :550px; top :100px">
    </div>

    <div class="mb-3">
        <label for="title" class="form-label" style="position: relative; left :550px; top :100px">nationality :</label>
        <input type="text" class="form-control" id="exampleInputEmail1" name="nationality" style="position: relative; left :550px; top :100px">
    </div>

    <div class="mb-3">
        <label for="league_id" class="form-label" style="position: relative; left :550px; top :100px">jersey_number :</label>
        <input type="number" class="form-control"  name="jersey_number" id="exampleInputEmail1" style="position: relative; left :550px; top :100px">
    </div>
    <div class="mb-3">
        <label for="league_id" class="form-label" style="position: relative; left :550px; top :100px">Goals  :</label>
        <input type="number" class="form-control"  name="goals_scored" id="exampleInputEmail1" style="position: relative; left :550px; top :100px">
    </div>

    <div class="mb-3">
        <label for="league_id" class="form-label" style="position: relative; left :550px; top :100px">Assists  :</label>
        <input type="number" class="form-control"  name="assists" id="exampleInputEmail1" style="position: relative; left :550px; top :100px">
    </div>

    <div class="mb-3">
        <label for="formFileSm" class="form-label" style="position: relative; left :550px; top :100px">Upload Image player :</label>
        <input class="form-control form-control-sm" id="formFileSm" type="file" name="img" style="position: relative; left :550px; top :100px">
    </div>

    <button type="submit" class="btn btn-danger" style="position: relative; left :550px; top :100px">Add player</button>
</form>
@endsection

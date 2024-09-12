@extends('layout')

@section('title')
    Add League
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
            <p>{{$error}}</p>
        @endforeach
    </div>
@endif

    <form action="{{route('main.store')}}" method="post" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label for="title" class="form-label" style="position: relative; left :550px; top :200px">League :</label>
            <input type="text" class="form-control" id="exampleInputEmail1" name="nameleague" style="position: relative; left :550px; top :200px" >
        </div>
    
        <div class="mb-3">
            <label for="formFileSm" class="form-label" style="position: relative; left :550px; top :200px">Upload Image League :</label>
            <input class="form-control form-control-sm" id="formFileSm" type="file" name='img' style="position: relative; left :550px; top :200px">
          </div>

          <button type="submit" class="btn btn-danger" style="position: relative; left :550px; top :200px">Add League</button>


    </form>
   
@endsection
@extends('layout')

@section('title')
    register
@endsection

@section('content')

<link rel="stylesheet" href="{{ url('css/register.css') }}">

@if ($errors->any())
<div class="alert alert-danger">
    @foreach ($errors->all() as $error)
        <p>{{ $error }}</p>
    @endforeach
</div>
@endif
<div class="content">

  <nav class="navbar navbar-light" style="background-color: rgb(31, 31, 31); height : 80px; position: fixed; width : 100% ; top : 0; z-index: 1000;">
    <div class="header">
        <i class="fa-solid fa-futbol" ></i>
        <H4 style="position: relative; top :4px">MATCHARENA</H4>
    </div>

    <a href="{{route('auth.login')}}" class="btn btn-danger" style="position: relative; right :6px">Back</a>


   
</nav>

  <div class="logo">
    <i class="fa-solid fa-futbol" ></i>
    <H4 style="position: relative; top :4px">MATCHARENA</H4>
 </div>
     
 <img src="{{ asset('img/Thierry Henry.jpeg') }}" alt="Description of the image" id="im">
     <form action="{{route('auth.handelregister')}}" method="post">
    
      @csrf
      <div class="mb-3">
              <label  class="form-label">Name</label>
              <input type="text" class="form-control" name="name" id="exampleInputEmail1" >
            </div>
          <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Email address</label>
            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="email" >
          </div>
          <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Password</label>
            <input type="password" class="form-control" id="exampleInputPassword1" name="password">
          </div>
         
          <button type="submit" class="btn-primary-custom" id="buut">Sign Up</button>
        </form>
</div>
    @endsection

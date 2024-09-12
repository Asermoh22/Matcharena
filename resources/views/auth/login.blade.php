@extends('layout')

@section('title')
    Login
@endsection

@section('content')


<link rel="stylesheet" href="{{ url('css/forms.css') }}">



<nav class="navbar navbar-light" style="background-color: rgb(31, 31, 31); height : 80px; position: fixed; width : 100% ; top : 0; z-index: 1000;">
    <div class="header">
        <i class="fa-solid fa-futbol" ></i>
        <H4 style="position: relative; top :4px">MATCHARENA</H4>
    </div>

    <a href="{{route('auth.register')}}" class="btn btn-danger" style="position: relative; right :6px">Create Account</a>


   
</nav>


@if ($errors->any())
<div class="alert alert-danger">
    @foreach ($errors->all() as $error)
        <p>{{ $error }}</p>
    @endforeach
</div>
@endif
<div class="content">
     <div class="logo">
        <i class="fa-solid fa-futbol" ></i>
        <H4 style="position: relative; top :4px">MATCHARENA</H4>
     </div>


   
            <form action="{{route('auth.handellogin')}}" method="post">

      @csrf
    
          <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Email address</label>
            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="email" >
          </div>
          <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Password</label>
            <input type="password" class="form-control" id="exampleInputPassword1" name="password">
          </div>
         
          <button type="submit" class="btn-primary-custom" id="buut" >Login</button>
        </form>
</div>
    @endsection

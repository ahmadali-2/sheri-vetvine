@extends('frontend.master')
@section('content')
<nav class="navbar navbar-expand-sm bg-light">
  <ul class="navbar-nav">
    <li class="nav-item">
      <a class="nav-link" href="#"> {{ Auth::user()->name }}</a>
    </li>
     <li class="nav-item">
      <a class="nav-link" href="#">Admin Dashboard</a>
    </li>


    <form method="POST" action="{{ route('logout') }}">
      @csrf
      <a href="{{ route('logout') }}" onclick="event.preventDefault();
          this.closest('form').submit();" style="margin-top: 20px !important;">
        {{ __('Log Out') }}
      </a>
    </form>

  </ul>
</nav>

<div>
  <img src="{{asset('frontend/home.jpg')}}" style="width:100% ; height:500px; margin-top:20px" />
</div>
@endsection
@extends('auth.layout')

@section('content')

<div class="column">
    <div class="col-sm-6">
      <div class="card mt-5">
        <div class="card-body">
          <h5 class="card-title">Login</h5>
          <p class="card-text">Login with your registered account to start categorizing products</p>
          <a href="/login" class="btn btn-primary">LOGIN</a>
        </div>
      </div>
    </div>
    <div class="col-sm-6">
      <div class="card mt-5">
        <div class="card-body">
          <h5 class="card-title">Register an account</h5>
          <p class="card-text">Register a new account with your e-mail address</p>
          <a href="/register" class="btn btn-primary">REGISTER</a>
        </div>
      </div>
    </div>
  </div>

@endsection



{{-- <div class="card">
    <div class="card-body" style="width: 18rem;">
    <h4><a href="{{ url('register') }}" class="btn btn-group-vertical  ">Register</a>
    </h4>
</div>
</div>

<div class="card">
    <div class="card-body">
    <h4><a href="{{ url('login') }}" class="btn btn-group-vertical  ">Login</a>
    </h4>
    </div>
</div> --}}

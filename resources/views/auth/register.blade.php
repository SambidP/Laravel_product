@extends('category.layout')

@section('content')
<div class="container">
  <div class="row">
      <div class="col-md-12">
          <div class="card">
              <div class="card-header">
                  <h4>Register an Account
                      <a href="{{ url('/') }}" class="btn btn-danger float-end">Back</a>
                  </h4>
              </div>
              <div class="card-body">
                  <form action="/login" method="POST">
                      @csrf

                      <div class="mb-3">
                          <label>Name</label>
                          <input type="text" name="name"  />
                          {{-- @error('name') <span class="text-danger">{{ $message }}</span> @enderror --}}
                      </div>
                      <div class="mb-3">
                          <label>Email</label>
                          <input name="email" type="text" ></input>
                          {{-- @error('description') <span class="text-danger">{{ $message }}</span> @enderror --}}
                      </div>
                      <div class="mb-3">
                          <label>Password</label>
                          <br/>
                          <input type="text" name="password" /> 
                          {{-- @error('status') <span class="text-danger">{{ $message }}</span> @enderror --}}
                      </div>
                      <div class="mb-3">
                          <button type="submit" class="btn btn-primary">Submit</button>
                      </div>

                  </form>
              </div>
          </div>
      </div>
  </div>
</div>
@endsection





{{-- <body class = "page">
  <form action="{{ route('auth.login') }}" method="post">
    @csrf
    {{-- <div class="imgcontainer">
      <img src="{{asset('assets/images/img_avatar2.jpg')}}" alt="Avatar" class="avatar">
    </div> --}}
    {{-- <div class = text>
    <h1>REGISTER</h1>
    <div>
    <div class="container">
      <label for="name"><b>Username</b></label>
      <input type="text" placeholder="Enter Username" name="name" required>
      <br>
      <label for="name"><b>email</b></label>
      <input type="text" placeholder="Enter e-mail" name="email" required >
      <br>
      <label for="password"><b>Password</b></label>
      <input type="password" placeholder="Enter Password" name="password" required>
      <br>
      <label for="password"><b>Confirm Password</b></label>
      <input type="password" placeholder="Enter Password" name="password" required>
      <button type="submit">Register</button>
      <label>
        <input type="checkbox" checked="checked" name="remember"> Remember me
      </label>
    </div>
  
    <div class="container" >
      <a href="/">
      <button type="button" class="cancelbtn">Cancel</button>
      </a>
      <span class="password">Forgot <a href="/forgot">password?</a></span>
    </div>
  </form>
  </body> --}}
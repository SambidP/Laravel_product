@extends('auth.layout')

@section('content')
<div class="container mt-5">
  <div class="row">
      <div class="col d-flex justify-content-center">
          <div class="card text-black bg-info mb-3" style="width: 18rem;">
              <div class="card-header">
                  <h4>Log-in
                      <a href="{{ url('/') }}" class="btn btn-danger float-end">Back</a>
                  </h4>
              </div>
              <div class="card-body">
                  <form action="/login" method="POST">
                      @csrf
                      <div class="mb-3">
                          <label>Email</label>
                          <input name="email" type="text" ></input>
                      </div>
                      <div class="mb-3">
                          <label>Password</label>
                          <br/>
                          <input type="password" name="password" /> 
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

@extends('category.layout')

@section('content')
<div class="container">
  <div class="row">
      <div class="col-md-12">
          <div class="card">
              <div class="card-header">
                  <h4>Log-in
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

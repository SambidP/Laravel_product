@extends('layouts.auth')
@section('content')
<div class="container-fluid mt-5">
    @if (session('success'))
<div class="alert alert-success">
    {{ session('success') }}
</div>
@endif
    <div class="row">
        <div class="col d-flex justify-content-center">
            <div class="card text-white mb-3 bg-dark" style="width: 20rem;">
                <div class="card-header font-sans-serif">
                    <h4>Password Reset
                        <a href="{{ url('/') }}" class="btn-close btn-close-white float-end "></a>
                    </h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('password.update') }}" method="POST">
                        @csrf
                        <input type="hidden" name="token" value="{{ $token }}">
                
                        <div class="mb-3">
                            <label for="email" class="form-label">Email:</label>
                            <input type="email" name="email" id="email" class="form-control" required>
                            @error('email')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                
                        <div class="mb-3">
                            <label for="password" class="form-label">New Password:</label>
                            <input type="password" name="password" id="password" class="form-control" required>
                            @error('password')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                
                        <div class="mb-3">
                            <label for="password_confirmation" class="form-label">Confirm Password:</label>
                            <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" required>
                        </div>
                
                        <button type="submit" class="btn btn-primary">Reset Password</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
  </div>
@endsection

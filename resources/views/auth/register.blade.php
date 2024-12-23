@extends('layouts.navbar')

@section('content')
    <div class="container-fluid mt-4">
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif
        <div class="row">
            <div class="col d-flex justify-content-center">
                <div class="card text-white mb-3 bg-dark" style="width: 20rem;">
                    <div class="card-header">
                        <h4>Register an account
                            <a href="{{ url('/') }}" class="btn-close btn-close-white float-end "></a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <form action="/register" method="POST">
                            @csrf
                            <div class="form-floating mb-3 text-black">
                                <input name="name" type="text" class="form-control" id="floatingInput"
                                    placeholder="name@example.com" autocomplete="off">
                                <label for="floatingInput">Username</label>
                            </div>
                            <div class="form-floating mb-3 text-black">
                                <input name="email" type="email" class="form-control" id="floatingInput"
                                    placeholder="name@example.com" autocomplete="off">
                                <label for="floatingInput">Email address</label>
                            </div>
                            <div class="form-floating mb-3 text-black">
                                <input name="password" type="password" class="form-control" id="floatingPassword"
                                    placeholder="Password">
                                <label for="floatingPassword">Password</label>
                            </div>
                            <div class="form-floating mb-3 text-black">
                                <input name="password_confirmation" type="password" class="form-control"
                                    id="floatingPassword" placeholder="Password">
                                <label for="floatingPassword">Confirm Password</label>
                            </div>
                            <a href="/login" class="card-link">Already have an account?</a>
                            <div class="mt-3">
                                <button type="submit" class="btn btn-outline-success">Submit</button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

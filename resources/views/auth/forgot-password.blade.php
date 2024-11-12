@extends('layouts.navbar')
@section('content')
    <div class="container-fluid mt-5">
        <div>
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
        </div>
        <div class="row">
            <div class="col d-flex justify-content-center">
                <div class="card text-white mb-3 bg-dark" style="width: 20rem;">
                    <div class="card-header font-sans-serif">
                        <h4>Password Reset
                            <a href="{{ url('/') }}" class="btn-close btn-close-white float-end "></a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('password.email') }}" method="POST">
                            @csrf
                            <div class="form-floating mb-3 text-black">
                                <input name="email" type="email" class="form-control" id="floatingInput"
                                    placeholder="Email Address" autocomplete="off">
                                <label for="floatingInput">Enter your email address</label>
                            </div>
                            <div class="mt-3">
                                <button type="submit" class="btn btn-outline-success">Send reset request</button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

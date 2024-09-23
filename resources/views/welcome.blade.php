@extends('category.layout')

@section('content')

<div class="card-header">
    <h4><a href="{{ url('register') }}" class="btn btn-danger float-end ">Register</a>
    </h4>
</div>

<div class="card-header">
    <h4><a href="{{ url('login') }}" class="btn btn-danger float-end ">Login</a>
    </h4>
</div>


@endsection
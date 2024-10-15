@extends('layouts.navbar')

@section('content')

<div class="container mt-5">
    @if (session('error'))
<div class="alert alert-danger">
    {{ session('error') }}
</div>
@endif
@if (session('success'))
<div class="alert alert-success">
    {{ session('success') }}
</div>
@endif

</div>
<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-lg border-0 rounded-3">
                <div class="card-header bg-primary text-white">
                    <h4 class="mb-0">{{ $product->name }} details
                        <a href="{{ route('product.index') }}?category_id={{ $product->category_id }}" class="btn btn-outline-light float-end">Back</a>
                    </h4>
                </div>
                <div class="card-body p-4">
                    <div class="mb-3">
                        <label class="bold-label">ID</label>
                        <p>{{ $product->product_id }}</p>
                    </div>
                    <div class="mb-3">
                        <label class="bold-label">Name</label>
                        <p>{{ $product->name }}</p>
                    </div>
                    <div class="mb-3">
                        <label class="bold-label">{{ $product->display_name }}</label>
                        <br />
                        <img src="{{ asset($product->image_path) }}" width="150" class="img-thumbnail" />
                    </div>
                    <div class="mb-3">
                        <label class="bold-label">Description</label>
                        <p>{!! $product->description !!}</p>
                    </div>
                    <div class="mb-3">
                        <label class="bold-label">Product Code</label>
                        <p>{{ $product->code }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
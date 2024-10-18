@extends('layouts.navbar')

@section('content')

</div>
<div class="container mt-4">
    <div class="container mt-4">
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
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card shadow-lg border-0 rounded-3 flex-wrap">
                <div class="card-header bg-primary text-white">
                    <h4 class="mb-0">{{ $category->name }}</h4>
                </div>
                <div class="card-body p-4">
                    <div class="mb-3">
                        <label class="form-label fw-bold">ID</label>
                        <p class="text-muted">{{ $category->category_id }}</p>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-bold">Name</label>
                        <p class="text-muted">{{ $category->name }}</p>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-bold">{{ $category->display_name }}</label><br>
                        <img src="{{ asset($category->image_path) }}" class="rounded" width="150" />
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-bold">Description</label>
                        <p class="text-muted">{!! $category->description !!}</p>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-bold">Code</label>
                        <p class="text-muted">{{ $category->code }}</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="card shadow-lg border-0 rounded-3">
                <div class="card-header bg-primary text-white">
                    <h4 class="mb-0">Products
                        <a href="{{ route('category.index') }}" class="btn btn-outline-light float-end ms-2">Back to Categories</a>
                        <a href="{{ route('product.create',['category_id' => $category_id]) }}" class="btn btn-outline-light float-end">Add a Product</a>
                    </h4>
                </div>
                <div class="card-body p-4">
                    <table class="table table-bordered table-hover">
                        <thead class="table-primary">
                            <tr>
                                <th>Id</th>
                                <th>Code</th>
                                <th>Name</th>
                                <th>Description</th>
                                <th class="text-center">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($products as $product)
                            <tr>
                                <td>{{ $product->product_id }}</td>
                                <td>{{ $product->code }}</td>
                                <td>{{ $product->name }}</td>
                                <td>{{ Str::limit($product->description, 30) }}</td>
                                <td class="text-center">
                                    <a href="{{ route('product.edit', $product->product_id) }}" class="btn btn-outline-secondary btn-sm">Edit</a>
                                    <a href="{{ route('product.show', $product->product_id) }}" class="btn btn-outline-info btn-sm">Show</a>
                                    <form action="{{ route('product.destroy', $product->product_id) }}" method="POST" class="d-inline-block" onsubmit="return confirm('Are you sure you want to delete this product?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-outline-danger btn-sm">Delete</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
@extends('layouts.category')

@section('content')

    <div class="container mt-2">
        <div class="row">
            <div class="col-md-12">

                @session('product')
                <div class="alert alert-success">
                    {{ session('product') }}
                </div>
                @endsession

                <div class="card">
                    <div class="card-header">
                        <h4>{{ $category->name }} products
                            <a href="{{ route('category.index') }}" class="btn btn-outline-warning float-end">Back to Categories</a>
                            <a href="{{ route('product.create',['category_id' => $category_id]) }}" class="btn btn-outline-primary float-end">Add a Product</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <table class="table table-stiped table-bordered">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Code</th>
                                    <th>Name</th>
                                    <th>Description</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($products as $product)
                                <tr>
                                    <td>{{ $product->product_id }}</td>
                                    <td>{{ $product->code }}</td>
                                    <td>{{ $product->name }}</td>
                                    <td>{{ $product->description }}</td>
                                    <td>
                                        <a href="{{ route('product.edit', $product->product_id) }}" class="btn btn-outline-success">Edit</a>
                                        <a href="{{ route('product.show', $product->product_id) }}" class="btn btn-outline-info">Show</a>

                                        <form action="{{ route('product.destroy', $product->product_id) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-outline-danger">Delete</button>
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
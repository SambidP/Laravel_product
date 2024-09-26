@extends('layouts.category')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-12">

                @session('category')
                <div class="alert alert-success">
                    {{ session('category') }}
                </div>
                @endsession

                <div class="card">
                    <div class="card-header">
                        <h4>Products List
                            <a href="{{ url('product/create') }}" class="btn btn-outline-primary float-end">Add Product</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <table class="table table-stiped table-bordered">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Name</th>
                                    <th>Description</th>
                                    <th>Category</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($products as $product)
                                <tr>
                                    <td>{{ $product->id }}</td>
                                    <td>{{ $product->name }}</td>
                                    <td>{{ $product->description }}</td>
                                    <td>{{ $product->category }}</td>
                                    <td>
                                        <a href="{{ route('product.edit', $product->id) }}" class="btn btn-outline-success">Edit</a>
                                        <a href="{{ route('product.show', $product->id) }}" class="btn btn-outline-info">Show</a>

                                        <form action="{{ route('product.destroy', $product->id) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-outline-danger">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>

                        {{ $products->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
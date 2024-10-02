@extends('layouts.category')
@section('content')
<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card shadow-lg border-0 rounded-3">
                <div class="card-header bg-primary text-white">
                    <h4 class="mb-0">Categories List
                        <a href="{{ url('category/create') }}" class="btn btn-outline-light float-end">Add Category</a>
                    </h4>
                </div>
                <div class="card-body p-4">
                    <table class="table table-hover table-bordered table-striped">
                        <thead class="bg-light">
                            <tr>
                                <th>Id</th>
                                <th>Code</th>
                                <th>Name</th>
                                <th>Description</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($categories as $category)
                            <tr>
                                <td>{{ $category->category_id }}</td>
                                <td>{{ $category->code }}</td>
                                <td>{{ $category->name }}</td>
                                <td>{{ Str::limit($category->description, 50) }}</td>
                                <td class="text-center">
                                    <a href="{{ route('category.edit', $category->category_id) }}" class="btn btn-sm btn-outline-success">Edit</a>
                                    <a href="{{ route('product.index') }}?category_id={{ $category->category_id }}" class="btn btn-sm btn-outline-secondary">View Products</a>
                                    <form action="{{ route('category.destroy', $category->category_id) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-outline-danger">Delete</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="d-flex justify-content-center mt-3">
                        {{ $categories->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@extends('layouts.navbar')
@section('content')
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
<div class="container mt-2">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card shadow-lg border-0 rounded-3">
                <div class="card-header bg-info text-white">
                    <h4 class="mb-0 p-1">Trashed categories
                        <a href="{{ url('category') }}" class="btn btn-outline-light float-end">Back to Category Listing</a>
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
                                    <a href="{{ route('category.restore', $category->category_id) }}" 
                                        class="btn btn-sm btn-outline-secondary"
                                        onclick="event.preventDefault(); document.getElementById('restore-form-{{ $category->category_id }}').submit();">
                                        Restore
                                    </a>
                                    
                                    <form id="restore-form-{{ $category->category_id }}" 
                                          action="{{ route('category.restore', $category->category_id) }}" 
                                          method="POST" class="d-none">
                                        @csrf
                                    </form>
                                    
                                    <a href="#" class="btn btn-sm btn-outline-danger"
                                        onclick="if(confirm('Are you sure you want to delete this category?')) { event.preventDefault(); document.getElementById('delete-form-{{ $category->category_id }}').submit(); }">
                                        Delete Permanently
                                    </a>

                                        <form id="delete-form-{{ $category->category_id }}"
                                            action="{{ route('category.deletePermanently', $category->category_id) }}"
                                            method="POST" class="d-none">
                                            @csrf
                                            @method('DELETE')
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
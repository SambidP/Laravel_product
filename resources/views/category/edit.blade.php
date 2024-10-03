@extends('layouts.category')

@section('content')

<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-lg border-0 rounded-3">
                <div class="card-header bg-warning text-white">
                    <h4 class="mb-0">Edit Category
                        <a href="{{ url('category') }}" class="btn btn-outline-light float-end">Back</a>
                    </h4>
                </div>
                <div class="card-body p-4">
                    <form action="{{ route('category.update', $category->category_id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label class="form-label bold-label">Name</label>
                                    <input type="text" name="name" class="form-control border-0 shadow-sm" value="{{ $category->name }}" placeholder="Enter category name" />
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="mb-3">
                                    <label class="form-label bold-label">Display Name</label>
                                    <input type="text" name="display_name" class="form-control border-0 shadow-sm" value="{{ $category->display_name }}" placeholder="Enter display name" />
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label class="form-label bold-label">Code</label>
                                    <input type="text" name="code" class="form-control border-0 shadow-sm" value="{{ $category->code }}" placeholder="Enter category code" />
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="mb-3">
                                    <label class="form-label bold-label">Change Image</label>
                                    <input type="file" name="image_path" class="form-control border-0 shadow-sm" accept=".jpg,.png,.pdf,.jpeg" />
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label class="form-label bold-label">Current Image</label><br>
                                    @if($category->image_path)
                                        <img src="{{ asset($category->image_path) }}" class="img-thumbnail" width="150">
                                    @else
                                        <p class="text-muted">No image available</p>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="mb-3">
                                    <label class="form-label bold-label">Description</label>
                                    <textarea name="description" rows="3" class="form-control border-0 shadow-sm" placeholder="Enter description">{{ $category->description }}</textarea>
                                </div>
                            </div>
                        </div>
                    <div class="d-grid">
                        <button type="submit" class="btn btn-warning btn-lg shadow-sm">Update</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
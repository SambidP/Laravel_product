@extends('layouts.navbar')

@section('content')
<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-lg border-0 rounded-3">
                <div class="card-header bg-primary text-white">
                    <h4 class="mb-0">Create Product
                        <a href="{{ url('category') }}" class="btn btn-outline-light float-end">Back</a>
                    </h4>
                </div>
                <div class="card-body p-4">
                    <form action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label font-weight-bold">Name</label>
                                    <input type="text" name="name" class="form-control border-0 shadow-sm" placeholder="Enter product name" />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label font-weight-bold">Display Name</label>
                                    <input type="text" name="display_name" class="form-control border-0 shadow-sm" placeholder="Enter display name" />
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label font-weight-bold">Code</label>
                                    <input type="text" name="code" class="form-control border-0 shadow-sm" placeholder="Enter product code" />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label font-weight-bold">Image</label>
                                    <input type="file" name="image_path" class="form-control border-0 shadow-sm" accept=".jpg,.png,.pdf,.jpeg" required />
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label font-weight-bold">Description</label>
                            <textarea name="description" rows="3" class="form-control border-0 shadow-sm" placeholder="Enter description"></textarea>
                        </div>
                        <select class="form-select mb-3" aria-label="Select your category" name="category_id">
                            <option selected disabled>Select Category</option>
                            @foreach($categories as $category)
                                <option value="{{ $category->category_id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                        <button type="submit" class="btn btn-primary btn-lg shadow-sm">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
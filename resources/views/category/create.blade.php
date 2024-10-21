@extends('layouts.navbar')
@section('content')

<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-lg border-0 rounded-3">
                <div class="card-header bg-primary text-white">
                    <h4 class="mb-0">Create Category
                        <a href="{{ url('category') }}" class="btn btn-outline-light float-end">Back</a>
                    </h4>
                </div>
                <div class="card-body p-4">
                    <form action="{{ route('category.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label fw-bold">Name</label>
                                    <input type="text" name="name" class="form-control border-0 shadow-sm" placeholder="Enter category name" />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label fw-bold">Display Name</label>
                                    <input type="text" name="display_name" class="form-control border-0 shadow-sm" placeholder="Enter display name" />
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label fw-bold">Code</label>
                                    <input type="text" name="code" class="form-control border-0 shadow-sm" placeholder="Enter category code" />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label fw-bold">Image</label>
                                    <input type="file" name="image_path" class="form-control border-0 shadow-sm" accept=".jpg,.png,.pdf,.jpeg" required />
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label fw-bold">Description</label>
                            <textarea name="description" rows="3" class="form-control border-0 shadow-sm" placeholder="Enter description"></textarea>
                        </div>
                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary btn-lg shadow-sm">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@extends('layouts.category')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Create Product
                            <a href="{{ url('product') }}" class="btn btn-outline-danger float-end">Back</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <div class="card-body">
                            <form action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="mb-3">
                                    <label class="bold-label">Product-id</label>
                                    <input type="text" name="product_id" class="form-control" />
                                </div>
                                <div class="mb-3">
                                    <label class="bold-label">Name</label>
                                    <input type="text" name="name" class="form-control"  />
                                </div>
                                <div class="mb-3">
                                    <label class="bold-label">Display-name</label>
                                    <input type="text" name="display_name" class="form-control" />
                                </div>
                                <div class="mb-3">
                                    <label class="bold-label">Code</label>
                                    <input type="text" name="code" class="form-control" />
                                </div>
                                <div class="mb-3">
                                    <label for="image_path"class="bold-label">Image</label>
                                    <input type="file" name="image_path" class="form-control" />
                                </div>
                                <div class="mb-3">
                                    <label class="bold-label">Description</label>
                                    <textarea name="description" rows="3" class="form-control"></textarea>
                                </div>
                                <div class="mb-3">
                                    <div class="mb-3">
                                        <label class="bold-label">Category-id</label>
                                        <input type="text" name="category_id" class="form-control" value="{{ old('category_id', request()->input('category_id')) }}" readonly />
                                        {{-- <input type="number" name="category_id" class="form-control" /> --}}
                                    </div>
                                    <button type="submit" class="btn btn-outline-primary">Save</button>
                                </div>
                            </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
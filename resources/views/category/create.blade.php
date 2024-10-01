@extends('layouts.category')

@section('content')

    <div class="container mt-2">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Create Category
                            <a href="{{ url('category') }}" class="btn btn-outline-danger float-end">Back</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('category.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label class="bold-label">Category-id</label>
                                <input type="text" name="category_id" class="form-control" />
                            </div>
                            <div class="mb-3">
                                <label class="bold-label">Name</label>
                                <input type="text" name="name" class="form-control" />
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
                                <label class="bold-label">Image</label>
                                <input type="file" name="image_path" class="form-control" accept=".jpg,.png,.pdf,.jpeg" required />
                            </div>
                            <div class="mb-3">
                                <label class="bold-label">Description</label>
                                <textarea name="description" rows="3" class="form-control"></textarea>
                            </div>
                            <div class="mb-3">
                                <button type="submit" class="btn btn-outline-primary">Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
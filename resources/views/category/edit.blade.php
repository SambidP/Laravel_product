@extends('layouts.category')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Edit Category
                            <a href="{{ url('category') }}" class="btn btn-outline-danger float-end">Back</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('category.update', $category->category_id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="mb-3">
                                <label class="bold-label">Category-id</label>
                                <input type="text" name="category_id" class="form-control" value="{{ $category->category_id }}" />
                            </div>
                            <div class="mb-3">
                                <label class="bold-label">Name</label>
                                <input type="text" name="name" class="form-control" value="{{ $category->name }}" />
                            </div>
                            <div class="mb-3">
                                <label class="bold-label">Display-name</label>
                                <input type="text" name="display_name" class="form-control" value="{{ $category->display_name }}" />
                            </div>
                            <div class="mb-3">
                                <label class="bold-label">Code</label>
                                <input type="text" name="code" class="form-control" value="{{ $category->code }}" />
                            </div>
                            <div class="mb-3">
                                <label class="bold-label">Image</label>
                                <input type="text" name="image_path" class="form-control" value="{{ $category->image_path }}" />
                            </div>
                            <div class="mb-3">
                                <label class="bold-label">Description</label>
                                <textarea name="description" rows="3" class="form-control">{!! $category->description !!}</textarea>
                            </div>
                            <div class="mb-3">
                                <button type="submit" class="btn btn-outline-primary">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
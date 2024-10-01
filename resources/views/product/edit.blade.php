@extends('layouts.category')

@section('content')

    <div class="container mt-2">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Edit Product
                            <a href="{{ url('category') }}" class="btn btn-outline-danger float-end">Back</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('product.update', $product->product_id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="mb-3">
                                <label class="bold-label">Product-id</label>
                                <input type="text" name="product_id" class="form-control" value="{{ $product->product_id }}" />
                            </div>
                            <div class="mb-3">
                                <label class="bold-label">Name</label>
                                <input type="text" name="name" class="form-control" value="{{ $product->name }}" />
                            </div>
                            <div class="mb-3">
                                <label class="bold-label">Display-name</label>
                                <input type="text" name="display_name" class="form-control" value="{{ $product->display_name }}" />
                            </div>
                            <div class="mb-3">
                                <label class="bold-label">Code</label>
                                <input type="text" name="code" class="form-control" value="{{ $product->code }}" />
                            </div>
                            <div class="mb-3">
                                <label class="bold-label">{{ $product->display_name }}</label><br>
                                @if($product->image_path)
                                    <img src="{{ asset($product->image_path) }}" width="150">
                                @else
                                    <p>No image available</p>
                                @endif
                            </div>
                            <div class="mb-3">
                                <label class="bold-label">Image</label>
                                <input type="file" name="image_path" class="form-control" accept=".jpg,.png,.pdf,.jpeg" />
                            </div>
                            <div class="mb-3">
                                <label class="bold-label">Description</label>
                                <textarea name="description" rows="3" class="form-control">{!! $product->description !!}</textarea>
                            </div>
                            <div class="mb-3">
                                <label class="bold-label">Category-id</label>
                                <input type="text" name="category_id" class="form-control"  value="{{ $product->category_id }}"/>
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
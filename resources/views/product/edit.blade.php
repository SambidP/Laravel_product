@extends('layouts.category')

@section('content')

<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card shadow-lg border-0 rounded-3">
                <div class="card-header bg-warning text-white">
                    <h4 class="mb-0">Edit Product
                        <a href="{{ route('product.index') }}?category_id={{ $product->category_id }}" class="btn btn-outline-light float-end">Back</a>
                    </h4>
                </div>
                <div class="card-body p-4">
                    <form action="{{ route('product.update', $product->product_id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        
                        <div class="row">
                            <div class="col-md-4">
                            <div class="mb-3">
                                <label class="form-label bold-label">Name</label>
                                <input type="text" name="name" class="form-control" value="{{ $product->name }}" required/>
                            </div>
                            </div>
                            <div class="col-md-8">
                            <div class="mb-3">
                                <label class="form-label bold-label">Display Name</label>
                                <input type="text" name="display_name" class="form-control" value="{{ $product->display_name }}" required/>
                            </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label class="form-label bold-label">Code</label>
                                    <input type="text" name="code" class="form-control" value="{{ $product->code }}" required/>
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="mb-3">
                                    <label class="form-label bold-label">Update Image</label>
                                    <input type="file" name="image_path" class="form-control" accept=".jpg,.png,.jpeg" />
                                </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label class="form-label bold-label">{{ $product->display_name }}</label><br>
                                    @if($product->image_path)
                                        <img src="{{ asset($product->image_path) }}" class="img-thumbnail" width="150">
                                    @else
                                        <p>No image available</p>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="mb-3">
                                    <label class="form-label bold-label">Description</label>
                                    <textarea name="description" rows="3" class="form-control">{{ $product->description }}</textarea>
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
 
</div>

@endsection
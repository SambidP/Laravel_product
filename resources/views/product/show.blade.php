@extends('layouts.category')

@section('content')

    <div class="container mt-2">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Show Product Detail
                            <a href="{{ url('category') }}" class="btn btn-outline-danger float-end">Back</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <label class="bold-label">ID</label>
                            <p>
                                {{ $product->product_id }}
                            </p>
                        </div>
                        <div class="mb-3">
                            <label class="bold-label">Name</label>
                            <p>
                                {{ $product->name }}
                            </p>
                        </div>
                        <div class="mb-3">
                            <label class="bold-label">{{ $product->display_name }}</label><br>
                            <img src="{{ asset($product->image_path) }}" width="100" />
                        </div>
                        <div class="mb-3">
                            <label class="bold-label">Description</label>
                            <p>
                                {!! $product->description !!}
                            </p>
                        </div>
                        <div class="mb-3">
                            <label class="bold-label">Product Code</label>
                            <br/>
                            <p>
                                {{ $product->code }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
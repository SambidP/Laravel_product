@extends('category.layout')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Show Product Detail
                            <a href="{{ url('product') }}" class="btn btn-danger float-end">Back</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <label>Name</label>
                            <p>
                                {{ $product->name }}
                            </p>
                        </div>
                        <div class="mb-3">
                            <label>Description</label>
                            <p>
                                {!! $product->description !!}
                            </p>
                        </div>
                        <div class="mb-3">
                            <label>Status</label>
                            <br/>
                            <p>
                                {{ $product->status == 1 ? 'checked':'' }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
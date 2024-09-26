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
                        <form action="{{ route('product.store') }}" method="POST">
                            @csrf

                            <div class="mb-3">
                                <label class="bold-label">Name</label>
                                <input type="text" name="name" class="form-control" />
                                {{-- @error('name') <span class="text-danger">{{ $message }}</span> @enderror --}}
                            </div>
                            <div class="mb-3">
                                <label class="bold-label">Description</label>
                                <textarea name="description" rows="3" class="form-control"></textarea>
                                {{-- @error('description') <span class="text-danger">{{ $message }}</span> @enderror --}}
                            </div>
                            <div class="mb-3">
                                <label class="bold-label">Category</label>
                                <br/>
                                <input type="text" name="category" class="form-control"/>
                                {{-- @error('status') <span class="text-danger">{{ $message }}</span> @enderror --}}
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
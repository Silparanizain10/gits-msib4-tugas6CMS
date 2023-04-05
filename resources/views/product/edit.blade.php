@extends('layouts.app')

@section('content')
    {{-- @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif --}}

    <form method="post" action="{{ route ('product.update', $product->id)}}">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Product Name</label>
            <input type="text" class="form-control @error('product_name') is-invalid @enderror" id="exampleInputEmail1"
                aria-describedby="emailHelp" name="product_name" value="{{ $product->product_name }}">
            <div id="emailHelp" class="form-text">Product name cannot be longer than 255</div>
            @error('product_name')
                <div class="invalid-feedback">
                    Name cannot be empty
                </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Description</label>
            <input type="text" class="form-control @error('product_description') is-invalid @enderror"
                id="exampleInputPassword1" name="product_description" value="{{ $product->product_description }}">
            @error('product_description')
                <div class="invalid-feedback">
                    Description cannot be empty
                </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Price</label>
            <input type="text" class="form-control @error('price') is-invalid @enderror"
                id="exampleInputPassword1" name="price" value="{{ $product->price }}">
            @error('product_price')
                <div class="invalid-feedback">
                    Price cannot be empty
                </div>
            @enderror
        </div>
        <select class="form-select @error('category_id') is-invalid @enderror" aria-label="Default select example"
            name="category_id">
            <option selected>Choose Category Product</option>
            @foreach ($categories as $category)
                <option value="{{ $category->id }}" {{ $product->category_id == $category->id ? 'selected' : '' }}>
                    {{ $category->name }}
                </option>
            @endforeach
        </select>
        @error('category_id')
            <div class="invalid-feedback">
                Choose One Category
            </div>
        @enderror
        <button type="submit" class="btn btn-secondary mt-3">Update</button>
    </form>
@endsection
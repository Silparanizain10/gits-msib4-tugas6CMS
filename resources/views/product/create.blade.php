@extends('layouts.app')
   
@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="text-center">
            <h2>Add New Product</h2>
        </div>
    </div>
</div>
 
<form method="POST" action="{{ route ('product.store')}}"  enctype="multipart/form-data">
    @csrf
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <label for="photo">Photo</label>
                    <input type="file" name="photo" class="form-control" placeholder="photo">
                </div>
            </div>
            <div class="form-group">
                <strong>Name:</strong>
                <input type="text" name="product_name" class="form-control" placeholder="Name">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Description:</strong>
                <textarea class="form-control" style="height:150px" name="product_description" placeholder="Description"></textarea>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Price:</strong>
                <input type="text" name="price" class="form-control" placeholder="Price">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Category:</strong>
                <select class="form-select @error('category_id') is-invalid @enderror" aria-label="Default select example"
                    name="category_id">
                    <option selected>Choose Product Category</option>
                    @foreach ($categories as $item)
                        <option value="{{ $item->id }}">{{ $item->id }} - {{ $item->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        @error('category_id')
            <div class="invalid-feedback">
                Choose One Category
            </div>
        @enderror
        <div class="col-xs-12 col-sm-12 col-md-12 pull-right">
                <button type="submit" class="btn btn-secondary">Submit</button>
        </div>
    </div>     
</form>
@endsection
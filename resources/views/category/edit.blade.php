@extends('layouts.app')
   
@section('content')

<div class="page-inner mt--5">
    <div class ="row">
        <div class="col-md-12">
            <div class="card full-height">
                <div class="card-header">
                    <div class="card-head-row">
                        <div class="card-title">Edit Category <i>{{ $categories->name}}</i></div>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <form method="post" action="{{ route ('category.update', $categories->id)}}">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="email2">Category Name</label>
                        <input type="text" name="name"value="{{ $categories->name}}" class="form-control" placeholder="Category Name">
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-secondary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
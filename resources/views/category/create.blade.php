@extends('layouts.app')
   
@section('content')

<div class="page-inner mt--5">
    <div class ="row">
        <div class="col-md-12">
            <div class="card full-height">
                <div class="card-header">
                    <div class="text-center">
                        <h1>Edit Category </h1> 
                    </div>
                </div>
            </div>
            <div class="card-body">
                <form method="post" action="{{ route ('category.store')}}">
                    @csrf
                    <div class="form-group">
                        <label for="email2">Category Name</label>
                        <input type="text" name="name" class="form-control" placeholder="Category Name">
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
@extends('layouts.app')
   
@section('content')

<div class="page-inner mt--5">
    <div class ="row">
        <div class="col-md-12">
            <div class="card full-height">
                <div class="card-header">
                    <div class="card-head-row">
                        <div class="text-center">
                            <h1> Category Product </h1> 
                        </div>
                        <a href="{{ route('category.create')}}" class="btn btn-secondary btn-sm ml-auto"> Add Category</a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                @if(Session::has('success'))
                    <div class="alert alert-secondary">
                        {{Session('success')}}
                    </div>
                @endif
                <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Category Name</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($categories as $row)
                        <tr>
                            <td>{{ $row->id}}</td>
                            <td>{{ $row->name}}</td>
                            <td>
                                <a href="{{ route ('category.edit', $row->id)}}" class="btn btn-warning btn-sm"> Edit</a>
                                    <form action="{{ route('category.destroy', $row->id)}}" method="post" class="d-inline">
                                        @csrf
                                        @method('delete')
                                        <button class="btn btn-danger btn-sm">Delete</button>
                                    </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td>Data is still empty !</td>
                        </tr>
                        @endforelse 
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
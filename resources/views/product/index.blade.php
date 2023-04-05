@extends('layouts.app')
    
@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-right" style="margin-bottom:10px;">
        <a class="btn btn-secondary" href="{{ route ('product.create') }}"> Create New Product</a>
        </div>
    </div>
</div>   
<div class="row">
    @foreach($products as $row)
        <div class="col-xs-18 col-sm-6 col-md-4" style="margin-top:10px;">
            <div class="img_thumbnail productlist">
                @if ($row->photo)
                    <img src="{{ url('photo').'/'.$row->photo }}"/>
                @endif
                <div class="caption">
                    <h4>{{ $row->product_name }}</h4>
                    <p>{{ $row->product_description }}</p>
                    <p><strong>Price: </strong> ${{ $row->price }}</p>
                    <a href="product/{{ $row->id }}/edit">
                        <button class="btn btn-secondary mt-2" type="button">Edit</button>
                    </a>
                    <form action="{{ route('product.destroy', $row->id)}}" method="post" class="d-inline">
                        @csrf
                        @method('delete')
                        <button class="btn btn-danger btn-sm">Delete</button>
                    </form>
                </div>
            </div>
        </div>
    @endforeach
</div>
     
@endsection
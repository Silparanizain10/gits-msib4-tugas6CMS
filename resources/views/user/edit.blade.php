@extends('layouts.app')
@section('title', 'Homepage')

@section('content')
    <div class="card full-height">
        <div class="card-header">
            <div class="text-center">
                <h1>Edit Profile </h1> 
            </div>
        </div>
    </div>
    <div class="container mt-5">
        <div class="row">
            <div class="col-3">
                @if($user->avatar)
                    <img src="{{ asset ('storage/'. $user->avatar) }}" class="img-fluid">
                @else
                    <img src="https://tse2.mm.bing.net/th?id=OIP.BjWYz904qnVp446uY60c9gHaHa&pid=Api&P=0" class="img-fluid">
                @endif
            </div>
            <div class="col">
                <form action="{{ route ('profile.update') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" disabled name="email" value="{{ $user->email }}">
                    </div>
                    <div class="mb-3">
                        <label for="name" class="form-label">Full Name</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{ $user->name }}">
                        @error('name')
                            <div id="nameHelp" class="form-text">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="avatar" class="form-label">Avatar</label>
                        <input type="file" class="form-control" id="avatar" name="avatar">
                        @error('avatar')
                            <div id="avatarHelp" class="form-text">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <button type="submit" class="btn btn-secondary">Edit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
    
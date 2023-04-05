@extends('layouts.app')

@section('title', 'Homepage')

@section('content')
    <div class="card full-height">
        <div class="card-header">
            <div class="text-center">
                <h1>Welcome to Zain's Store </h1>
                @auth
                    <p>{{ Auth::user()->name }}</p>
                @endauth
                @guest
                    <p>Login First !!!</p>
                @endguest
            </div>
        </div>
    </div>
@endsection
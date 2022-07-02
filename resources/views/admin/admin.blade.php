{{-- Attach Layout --}}
@extends('layouts.adminLayout')

{{-- Title Section --}}
@section('title', 'Admin panel')

{{-- Top Header Box --}}
@section('header')
        <h1 class="text-primary pb-2">Hi <span class="text-warning">{{ $currentUser->name }}</span></h2>
        <h4 class="text-primary">Welcome to the admin panel</h4>
        <h4 class="text-primary">You are logged in as <span class="text-warning">{{ $currentUser->role }}</span></h4>
    @endsection

{{-- Body Section --}}
@section('body')
    <div class="container mt-4">
         <div class="row">
            @can ('isAdmin')
                {{-- Posts Card --}}
                <div class="card col bg-success admin-card">
                    <div class="card-body m-4">
                        <h5 class="card-title">Post Details</h5>
                        <p class="card-text">In this section, you can see a list of posts of your website along
                            with
                            their
                            details</p>
                        <a href="{{ route('post.index') }}" class="btn btn-outline-light mt-4 text-dark">Work with
                            posts</a>
                    </div>
                </div>
                {{-- Comments Card --}}
                <div class="card col bg-warning admin-card">
                    <div class="card-body m-4">
                        <h5 class="card-title">Comments Details</h5>
                        <p class="card-text">In this section, you can see a list of comments of your website along
                            with
                            their
                            details</p>
                        <a href="{{ route('comment.index') }}" class="btn btn-outline-light mt-4 text-dark">Work with
                            comments</a>
                    </div>
                </div>
                {{-- Users Card --}}
                <div class="card col bg-info admin-card">
                    <div class="card-body m-4">
                        <h5 class="card-title">Users Details</h5>
                        <p class="card-text">In this section, you can see a list of users of your website along
                            with
                            their
                            details</p>
                        <a href="{{ route('user.index') }}" class="btn btn-outline-light mt-4 text-dark">Work with
                            users</a>
                    </div>
                </div>
            @endCan
            @can('isWriter')
                {{-- Posts Card --}}
                <div class="card col-4 bg-success admin-card">
                    <div class="card-body m-4">
                        <h5 class="card-title">Post Details</h5>
                        <p class="card-text">In this section, you can see a list of posts of your website along
                            with
                            their
                            details</p>
                        <a href="{{ route('post.index') }}" class="btn btn-outline-light mt-4 text-dark">Work with
                            posts</a>
                    </div>
                </div>
            @endCan
        </div>
    </div>
@endsection

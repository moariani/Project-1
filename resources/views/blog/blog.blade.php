{{-- Attach Layout --}}
@extends('layouts.blogLayout')

{{-- Title Section --}}
@section('title', 'Blog')

{{-- Body Section --}}
@section('body')
    {{-- Carousel Part--}}
    <div class="container">
        <div class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="{{ asset('img/i-1.jpg') }}" class="d-block w-100 img-carousel" alt="img-carousel">
                </div>
            </div>
        </div>
    </div>
    {{-- Main Part --}}
    <div class="container">
        {{-- Newest Post Part --}}
        <h2 class="mt-4 text-info">Newest Posts</h2>
        <div class="row">
            @foreach ($newestPosts as $newestPost)
                <div class="card newest-post-card">
                    <div class="card-body newest-post-card-body">
                        <h5 class="card-title text-light">{{ $newestPost->title }}</h5>
                        <p class="card-text text-light">{{ $newestPost->body }} </p>
                    </div>
                    <div class="card-footer mt-2">
                        <a href="{{ route('blog.show', $newestPost->id) }}" class="btn btn-outline-light text-light">Read more</a>
                    </div>
                </div>
            @endforeach
        </div>
        {{-- Health Part --}}
        <h2 class="mt-4 text-info">Health</h2>
        <div class="row">
            @foreach ($posts as $post)
                @if ($post->category === 'Health')
                    <div class="card col-12 mt-2 p-2 category-card">
                        <div class="card-body category-card-body">
                            <h5 class="card-title text-light">{{ $post->title }}</h5>
                            <p class="card-text text-light">{{ $post->body }}</p>
                        </div>
                        <div class="card-footer mt-2">
                            <a href="{{ route('blog.show', $post->id) }}" class="btn btn-outline-light text-light">Read more</a>
                        </div>
                    </div>
                @endif
            @endforeach
        </div>
        {{-- Cooking Part --}}
        <h2 class="mt-4 text-info">Cooking</h2>
        <div class="row">
            @foreach ($posts as $post)
                @if ($post->category === 'Cooking')
                     <div class="card col-12 mt-2 p-2 category-card">
                        <div class="card-body category-card-body">
                            <h5 class="card-title text-light">{{ $post->title }}</h5>
                            <p class="card-text text-light">{{ $post->body }}</p>
                        </div>
                        <div class="card-footer mt-2">
                            <a href="{{ route('blog.show', $post->id) }}" class="btn btn-outline-light text-light">Read more</a>
                        </div>
                    </div>
                @endif
            @endforeach
        </div>
    </div>
@endsection

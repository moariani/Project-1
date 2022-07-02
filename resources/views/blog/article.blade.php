{{-- Attach Layout --}}
@extends('layouts.blogLayout')

{{-- Title Section --}}
@section('title')
    {{ $post->title }}
@endsection

{{-- Body Section --}}
@section('body')
    {{-- Article Details --}}
    <div class="container best-margin-top">
        <h1>{{ $post->title }}</h1>
        <address>
            author : {{ $post->user->name }} <br>
            created_at : {{ $post->created_at }}
        </address>
        <p> {{ $post->body }}</p>
    </div>
    {{-- Write Comment --}}
    <div class="container best-margin-top">
        <h3 class="text-secondary">Write your comment</h3>
        <hr>
        {{-- Error Component --}}
        @if ($errors->any())
        @component('layouts.components.errors')
                @slot('err')
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                @endslot
                @slot('t_color' , 'dark')
                @if($errors->get('successMsg'))
                    @slot('b_color' , 'success')
                @else
                    @slot('b_color' , 'warning')
                @endif
        @endcomponent
        @endif
        <form method="POST" action="{{ route('blog.store') }}">
            @CSRF
            <div class="form-group">
                <label class="mb-1" for="email">email:</label>
                <input type="email" class="form-control" name="email" placeholder="Add email" id="email">
            </div>
            <div class="form-group mt-2">
                <label class="mb-1" for="body">Body:</label>
                <textarea class="form-control" name="body" placeholder="Add post body" rows="8" id="body"></textarea>
            </div>
            <div class="form-group">
                <input type="hidden" class="form-control" name="post_id" value="{{ $post->id }}">
            </div>
            <button type="submit" class="btn btn-secondary btn-lg mt-4">Create</button>
        </form>
    </div>
    {{-- Comments --}}
    <div class="container best-margin-top">
        <h3 class="text-secondary">Comments</h3>
         <hr>
        @foreach ($post->comments->all() as $comment)
            <h6 class="mt-2">{{ $comment->email }}</h6>
             <p>{{ $comment->body }}</p>
        @endforeach
    </div>
@endsection


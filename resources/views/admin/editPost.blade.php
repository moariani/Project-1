{{-- Attach Layout --}}
@extends('layouts.adminLayout')

{{-- Title Section --}}
@section('title', 'Edit Post')

{{-- Top Header Box --}}
@section('header')
    <h2 class="text-primary pb-2">Edit Post</h2>
@endsection

{{-- Body Section --}}
@section('body')
    {{-- Error Component --}}
    @if($errors->any())
    @component('layouts.components.errors')
        @slot('err')
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        @endslot
        @slot('t_color' , 'dark')
        @slot('b_color' , 'warning')
    @endcomponent
    @endif
    {{-- Post Edit Form --}}
    <div class="container mt-3">
        <form method="post" action="{{ route('post.update', $post->id) }}">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label class="mb-1" for="title">Title:</label>
                <input type="text" class="form-control" name="title" id="title" value="{{ $post->title }}">
            </div>
            <div class="form-group mt-2">
                <label class="mb-1" for="body">Body:</label>
                <textarea class="form-control" name="body" rows="10" id="body" >{{ $post->body }}</textarea>
            </div>
            <div class="form-group mt-2">
                <label class="mb-1" for="category">Category:</label>
                <select class="form-control" name="category" id="category">
                    <option value="Health" @if($post->category =='Health') selected @endif>Health</option>
                    <option value="Cooking" @if($post->category =='Cooking') selected @endif>Cooking</option>
                </select>
            </div>
            <button type="submit" class="btn btn-success btn-lg mt-4">Edit</button>
        </form>
    </div>
@endsection

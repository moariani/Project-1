{{-- Attach Layout --}}
@extends('layouts.adminLayout')

{{-- Title Section --}}
@section('title', 'Create Post')

{{-- Top Header Box --}}
@section('header')
    <h2 class="text-primary pb-2">Create Post</h2>
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
    {{-- Post Create Form --}}
    <div class="container mt-3">
        <form method="post" action="{{ route('post.store') }}">
            @csrf
            <div class="form-group">
                <label class="mb-1" for="title">Title:</label>
                <input type="text" class="form-control" name="title" placeholder="Add post title" id="title">
            </div>
            <div class="form-group mt-2">
                <label class="mb-1" for="body">Body:</label>
                <textarea class="form-control" name="body" placeholder="Add post body" rows="10" id="body"></textarea>
            </div>
            <div class="form-group mt-2">
                <label class="mb-1" for="category">Category:</label>
                <select class="form-control" name="category" id="category">
                    <option value="Health">Health</option>
                    <option value="Cooking">Cooking</option>
                </select>
            </div>
            <div class="form-group">
                <input type="hidden" class="form-control" name="user_id" value="{{ $currentUser->id }}">
            </div>
            <button type="submit" class="btn btn-success btn-lg mt-4">Create</button>
        </form>
    </div>
@endsection


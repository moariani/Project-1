{{-- Attach Layout --}}
@extends('layouts.adminLayout')

{{-- Title Section --}}
@section('title', 'Posts Detail')

{{-- Top Header Box --}}
@section('header')
    <h2 class="text-primary pb-2">Posts Details</h2>
@endsection

{{-- Body Section --}}
@section('body')
    <div class="container mt-4">
        <a href="{{ route('post.create') }}" class="btn btn-success btn-lg" role="button">Create new post</a>
    </div>
    {{-- Error Component --}}
    @if($errors->any())
    @component('layouts.components.errors')
        @slot('err')
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        @endslot
        @slot('t_color' , 'dark')
        @slot('b_color' , 'success')
    @endcomponent
    @endif
    {{-- Posts Details Table --}}
    <div class="container mt-4">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Title</th>
                    <th scope="col">Body</th>
                    <th scope="col">Category</th>
                    <th scope="col">user</th>
                    <th scope="col">Created_at</th>
                    <th scope="col">Updated_at</th>
                    <th scope="col">Operations</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($posts as $post)
                    <tr>
                        <th scope="row"> {{ $post->id }}</th>
                        <td>{{ $post->title }}</td>
                        <td>{{ $post->body }}</td>
                        <td>{{ $post->category }}</td>
                        <td>{{ $post->user->name }}</td>
                        <td>{{ $post->created_at }}</td>
                        <td>{{ $post->updated_at }}</td>
                        <td>
                            <form class="form-inline" action="{{ route('post.destroy', $post->id) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <div class="btn-group">
                                    <a class="btn btn-outline-warning text-dark" href="{{ route('post.edit', $post->id) }}">edit</a>
                                    <button type="submit" class="btn btn-outline-danger text-dark">Delete</a>
                                </div>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection

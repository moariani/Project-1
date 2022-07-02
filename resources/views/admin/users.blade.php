{{-- Attach Layout --}}
@extends('layouts.adminLayout')

{{-- Title Section --}}
@section('title', 'Users Detail')

{{-- Top Header Box --}}
@section('header')
    <h2 class="text-primary pb-2">Users Details</h2>
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
        @slot('b_color' , 'success')
    @endcomponent
    @endif
    {{-- Users Details Table --}}
    <div class="container mt-4">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Role</th>
                    <th scope="col">Created_at</th>
                    <th scope="col">Operations</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <th scope="row">{{ $user->id }}</th>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->role }}</td>
                        <td>{{ $user->created_at }}</td>
                        <td>
                            <form class="form-inline " method="post" action="{{ route('user.destroy', $user->id) }}">
                                @csrf
                                @method('DELETE')
                                <div class="btn-group">
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


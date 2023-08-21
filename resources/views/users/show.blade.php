@extends('layouts.master')
@section('title', 'Show View')
@section('content')
<h1>{{ $user->name }} Details Page</h1>
<div>
    <ul>
        <li>ID: {{ $user->id }}</li>
        <li>Name: {{ $user->name }}</li>
        <li>Email: {{ $user->email }}</li>
        <li>Password: {{ $user->password }}</li>
    </ul>
</div>
<div class="d-flex align-items-center mt-2 gap-1">
    <a href="{{ route('users.edit', ['user' => $user]) }}"
        class="text-white text-decoration-none">
        <button class="btn btn-warning">
            Edit
        </button>
    </a>

    <form method="POST" action="{{ route('users.destroy', ['user' => $user]) }}">
        @method('DELETE') @csrf
        <button type="submit" class="btn btn-danger">Delete this user</button>
    </form>
</div>
@endsection



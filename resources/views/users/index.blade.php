@extends('layouts.master')

@section('title', 'Users index')

@section('content')

    <button class="btn btn-success" style="width: fit-content;">
        <a href="{{ route('users.create') }}" class="text-decoration-none text-white">Create a new user</a>
    </button>

    <h1>Index Page</h1>
    @if (session('success'))
        <h3 class="bg-info rounded">{{ session('success') }}</h3>
    @endif

    @if (session('created'))
        <h3 class="bg-success rounded text-white p-1">{{ session('created') }}</h3>
    @endif

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Password</th>
            </tr>
        </thead>

        <tbody>

            @foreach ($users as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->password }}</td>
                    <td>
                        <a href="{{ route('users.show', ['user' => $user]) }}" class="text-white text-decoration-none">
                            <button class="btn btn-info">
                                More
                            </button>
                        </a>
                    </td>
                    <td>
                        <a href="{{ route('users.edit', ['user' => $user]) }}" class="text-white text-decoration-none">
                            <button class="btn btn-warning">
                                Edit
                            </button>
                        </a>
                    </td>
                    <td>
                        <form method="POST" action="{{ route('users.destroy', ['user' => $user]) }}">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach

        </tbody>
    </table>
    {{ $users->links('vendor.pagination.simple-bootstrap-5') }}

@endsection

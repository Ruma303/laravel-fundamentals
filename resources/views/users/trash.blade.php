@extends('layouts.master')

@section('title', 'Thrashed')

@section('content')
    <h1>Thrashed</h1>
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

@endsection

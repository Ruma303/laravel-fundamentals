@extends('layouts.master')

@section('title', 'Thrashed')

@section('content')
    @if (session('userRestored'))
        <h3 class="bg-success rounded text-white p-1">{{ session('userRestored') }}</h3>
    @endif
    @if (session('forceDelete'))
        <h3 class="bg-danger rounded text-white p-1">{{ session('forceDelete') }}</h3>
    @endif
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
                        <a href="{{ route('user.restore', ['id' => $user->id]) }}" class="text-white text-decoration-none">
                            <button class="btn btn-success">Restore</button>
                        </a>
                        {{-- <form action="{{ route('users.forceDelete', ['id' => $user->id]) }}" method="POST">
                            @csrf @method('DELETE')
                            <button type="submit" class="btn btn-danger">Permanent delete</button>
                        </form> --}}

                        <!-- % Button trigger modal -->
                        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal">
                            Permanent delete
                        </button>

                        <!-- Modal -->
                        <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="deleteModalLabel">Confirm Delete</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        Are you sure you want to permanently delete this user?
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Cancel</button>
                                        <form action="{{ route('users.forceDelete', ['id' => $user->id]) }}" method="POST">
                                            @csrf @method('DELETE')
                                            <button type="submit" class="btn btn-danger">I'm sure. Delete this user</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

@endsection

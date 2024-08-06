@extends('layouts.app')
@section('title', 'Edit View for ' . $user->name)
@section('content')
    <h1>Edit: {{ $user->name }}</h1>
    <form method="POST" action="{{ route('users.update', $user) }}" id="update-form">
        @csrf
        @method('PUT')
        <section class="form-group row">
            <div>
                <label for="name" class="col-sm-2 col-form-label">Name</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="name" value="{{ old('name', $user->name) }}"
                        name="name">
                </div>
            </div>

            <div>
                <label for="email" class="col-sm-2 col-form-label">Email</label>
                <div class="col-sm-10">
                    <input type="email" class="form-control" id="email" value="{{ old('email', $user->email) }}"
                        name="email">
                </div>
            </div>

            <div>
                <label for="password" class="col-sm-2 col-form-label">Password</label>
                <div class="col-sm-10">
                    <input type="password" class="form-control" id="password"
                        value="{{ old('password', $user->password) }}" name="password">
                </div>
        </section>

    </form>

    <div class="d-flex align-items-center mt-2 gap-1">

        <button type="button" class="btn btn-warning" id="update-user-btn">Update user data</button>
        <form id="delete-form" method="POST" action="{{ route('users.destroy', $user) }}" class="d-inline">
            @csrf
            @method('DELETE')
            <button type="button" class="btn btn-danger" id="delete-user-btn">Delete this user</button>
        </form>
    </div>

    <script>
        document.getElementById('update-user-btn').addEventListener('click', function() {
            document.getElementById('update-form').submit();
        });
        document.getElementById('delete-user-btn').addEventListener('click', function() {
            if (confirm('Are you sure you want to delete this user?')) {
                document.getElementById('delete-form').submit();
            }
        });
    </script>

    {{-- <form id="update-form" method="POST" action="{{ route('users.update', $user) }}">
        @csrf
        @method('PUT')
        <section class="form-group row">
            <div>
                <label for="name" class="col-sm-2 col-form-label">Name</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="name" value="{{ old('name', $user->name) }}"
                        name="name">
                </div>
            </div>

            <div>
                <label for="email" class="col-sm-2 col-form-label">Email</label>
                <div class="col-sm-10">
                    <input type="email" class="form-control" id="email" value="{{ old('email', $user->email) }}"
                        name="email">
                </div>
            </div>

            <div>
                <label for="password" class="col-sm-2 col-form-label">Password</label>
                <div class="col-sm-10">
                    <input type="password" class="form-control" id="password"
                        value="{{ old('password', $user->password) }}" name="password">
                </div>
        </section>
        <button type="button" class="btn btn-warning">Update user data</button>
    </form>

    <form id="delete-form" method="POST" action="{{ route('users.destroy', $user) }}" class="mt-2">
        @csrf
        @method('DELETE')
        <button type="button" class="btn btn-danger">Delete this user</button>
    </form> --}}


@endsection

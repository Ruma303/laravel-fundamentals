@extends('layouts.master')
@section('title', 'Edit View')
@section('content')
<h1>Edit {{ $user->name }} data</h1>
<form method="POST" action="{{ route('users.update', ['user' => $user]) }}">
     @csrf
     @method('PUT')
     <div class="form-group row">
        <label for="name" class="col-sm-2 col-form-label">Name</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="name" value="{{ old('name', 'NO username') }}"
            name="name">
        </div>
        <label for="email" class="col-sm-2 col-form-label">Email</label>
        <div class="col-sm-10">
            <input type="email" class="form-control" id="email" value="{{ old('email', $user->email) }}"
            name="email">
        </div>
        <label for="password" class="col-sm-2 col-form-label">Password</label>
        <div class="col-sm-10">
            <input type="password" class="form-control" id="password" value="{{ old('password', $user->password) }}"
            name="password">
        </div>
    </div>

    <div class="d-flex align-items-center mt-2 gap-1">
        <button type="submit" class="btn btn-warning">Update user data</button>
    </form>

    <form method="POST" action="{{ route('users.destroy', ['user' => $user]) }}"
        class="d-inline">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger">Delete this user</button>
    </form>
</div>
@endsection

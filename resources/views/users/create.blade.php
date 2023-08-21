@extends('layouts.master')
@section('title', 'Create View')
@section('content')
    <h1>Create Page</h1>
    <form method="POST" action="{{ route('users.store') }}">
        @csrf
        <div class="form-group row">
            <label for="name" class="col-sm-2 col-form-label">Name</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="name" placeholder="Your name" name="name">
            </div>
            <label for="email" class="col-sm-2 col-form-label">Email</label>
            <div class="col-sm-10">
                <input type="email" class="form-control" id="email" placeholder="Your mail" name="email">
            </div>
        </div>
        <div class="form-group row">
            <label for="password" class="col-sm-2 col-form-label">Password</label>
            <div class="col-sm-10">
                <input type="password" class="form-control" id="password" placeholder="Your password" name="password">
            </div>
        </div>
        <button type="submit" class="btn btn-primary mb-3 mt-5">Create new user</button>
    </form>
@endsection

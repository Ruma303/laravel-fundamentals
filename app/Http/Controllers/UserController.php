<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class UserController extends Controller
{
    public function index()
    {
        $this->authorize('admin');
        $users = User::all();
        dump('Sei autorizzato. Happy hacking!');
        dd($users);

        /* if (! Gate::allows('admin')) {
        //if (Gate::denies('admin')) {
            abort(403, 'Area riservata');
        } dd(User::all()); */
    }
}

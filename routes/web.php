<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Redirect;
use App\Http\Controllers\PostController;

Route::get('/', [HomeController::class, 'index'])->name('home');

    /* Route::get('/users', [UserController::class, 'index'])->name('users.index');
    Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
    Route::post('/users', [UserController::class, 'store'])->name('users.store');
    Route::get('/users/{user}', [UserController::class, 'show'])->name('users.show');
    Route::get('/users/{user}/edit', [UserController::class, 'edit'])->name('users.edit');
    Route::put('/users/{user}', [UserController::class, 'update'])->name('users.update');
    Route::delete('/users/{user}', [UserController::class, 'destroy'])->name('users.destroy'); */

    //Route::resource('users', UserController::class);

    /* Route::resource('user', UserController::class)
        ->names([
            'create' => 'crea',
            'show' => 'user.mostra',
        ]); */

        //->parameter('user', 'utente');

    //Route::resource('users.posts', PostController::class);


        /* ->parameters([
            'users' => 'utente',
            'posts' => 'articolo',
        ]); */

        //->names('users');
        //->except(['store', 'edit']);
        //->only(['index', 'create', 'store']);

        //->names('users');

    /* Route::resources([
        'photos' => UserController::class,
        'posts' => PostController::class,
    ]); */

    /* Route::get('/users/trash', [UserController::class, 'trash'])->name('user.trash');
    Route::get('/users/{id}/restore', [UserController::class, 'restore'])->name('user.restore');
    Route::delete('/users/{id}/force-delete', [UserController::class, 'forceDelete'])->name('users.forceDelete'); */

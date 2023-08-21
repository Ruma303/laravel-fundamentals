<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('layouts.master');
});
//Auth::routes();

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


    Route::get('/users', [App\Http\Controllers\UserController::class, 'index']);
    Route::get('/users/create', [App\Http\Controllers\UserController::class, 'create']);
    Route::post('/users', [App\Http\Controllers\UserController::class, 'store']);
    Route::get('/users/{user}', [App\Http\Controllers\UserController::class, 'show']);
    Route::get('/users/{user}/edit', [App\Http\Controllers\UserController::class, 'edit']);
    Route::put('/users/{user}', [App\Http\Controllers\UserController::class, 'update']);
    Route::delete('/users/{user}', [App\Http\Controllers\UserController::class, 'destroy']);

    //Route::resource('/users', App\Http\Controllers\UserController::class);

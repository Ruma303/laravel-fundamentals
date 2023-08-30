<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FileController;
use App\Http\Controllers\UserController;

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
Route::get('/', [FileController::class, 'formView']);
Route::post('/upload', [FileController::class, 'handle'])->name('upload');
Route::delete('/delete', [FileController::class, 'deleteFile'])->name('delete');


Route::get('user', [UserController::class, 'user']);
Route::post('users', [UserController::class, 'store'])->name('user.store');





Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

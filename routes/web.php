<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;

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
    return view('welcome');
});


//% Laravel Breeze

Route::get('/dashboard', function () {
    return view('dashboard', [
        /* 'adminInfo' => 'Info disponibili solo per l\'amministratore.' */
    ]);
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';


//% Rotte personalizzate per Autenticazione
Route::middleware('auth')->group(function () {
    Route::get('blog', function () {
        return view('blog');})->name('blog');
    Route::get('user-data', function () {
        Auth::user();
        return response()->json(auth()->user());
    })->name('user-data');
});


//% Rotte di Autorizzazione
use App\Http\Controllers\UserController;
Route::get('users', [UserController::class, 'index']);

<?php

use Illuminate\Support\Facades\DB;
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
    return view('welcome');
});
Route::get('/db-test', function () {
    try {
        DB::connection()->getPdo();
        return response()->json(['message' => 'Connessione al database avvenuta con successo.'], 200);
    } catch (\Exception $e) {
        return response()->json(['message' => 'Connessione al database non riuscita.', 'exception' =>
            $e->getMessage()], 500);
    }
});

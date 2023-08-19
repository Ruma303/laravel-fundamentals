<?php

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
/*
Route::get('/', function () {
    return view('welcome');
});
 */
/* 'script'=>'<script>alert("Codice JavaScript iniettato")</script>',
'items' => ['Smartphone', 'Scarpe', 'Bevande', 'Occhiali da sole'] */

    Route::get('/', function () {
        return view('app', [
            'name'  => 'Matteo',
            'age'   => 8,
            'script'=>'<script>alert("Codice JavaScript iniettato")</script>',
            'items' => ['Smartphone', 'Scarpe', 'Bevande', 'Occhiali da sole']
        ]);
    });

    Route::get('hello', fn() => 'Hello, World!')->name('hello');



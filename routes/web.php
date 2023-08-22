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

//$ Rotta di base

/* Route::get('/', function (){
    return view('welcome');
}); */


//$ Rotta che ritorna valori
/* Route::get('/first-route', function () {
    return "<h1>Prima rotta</h1>";
}); */

/* Route::get('/first-route', fn() => '<h1>Ciao</h1>'); */


//$ Nominare le rotte


/* Route::get('/prima', fn() => 'Prima rotta attivata<br>')->name('first');
Route::get('/second', fn() => redirect()->route('first')); */



//% Parametri delle rotte

/* Route::get('/second-route/{id}', function () {
    return "<h1>Seconda rotta</h1>";
}); */


//$ Ritornare il parametro rotta
/* Route::get('/second-route/{id}', function ($id) {
    return "<h1>Seconda rotta, con parametro \$id: $id</h1>";
}); */


//$ Ritornare più parametri
/* Route::get('/third-route/{id}/user/{username}', function ($id, $username) {
    return "<h1>Terza rotta, con parametro $id dell'utente $username</h1>";
}); */


//$ Parametri vincolati
/* Route::get('/articoli/{id}', function ($id) {
    return 'Articolo numero: ' . $id;
})->where('id', '[\w-]+'); */



/* Route::get('/articoli/{id}/categoria/{categoria}', function ($id, $categoria) {
    return 'Articolo numero: ' . $id . ' | ' . 'Categoria: '. $categoria;
})->where([
    'id' => '[0-9]+',
    'categoria' => '[a-zA-Z0-9-]+'
]); */



//$ Parametri dinamici opzionali

/* Route::get('/articoli/{id?}', function ($id) {
    return 'Articolo numero: ' . $id;
})->where('id', '[0-9]+');
 */

/* Route::get('/articoli/{id?}', function ($id = null) {
    if($id) {
        return 'Articolo numero: ' . $id;
    } else {
        return 'Articolo senza id';
    }
})->where('id', '[0-9]+');
 */


//$ Tipizzazioni PHP

/* Route::get('/articoli/{id?}/categoria/{categoria?}',
    function (int $id = 1, string $categoria = 'casual') {
        return 'Articolo numero: ' . $id . ' | ' . 'Categoria: '. $categoria;
})->where(['id' => '[0-9]+', 'categoria' => '[a-zA-Z0-9-]+']); */





//% Rotte che ritornano delle view

// $ Rotta che ritorna una view

/* Route::get('/', function () {
    return view('welcome');
}); */



//$ Inserire dei dati in una view

/* Route::get('view', function () {
    return view('app', [
        'name' => 'Matteo',
        'age' => 28,
        'link' => 'https://www.google.it/'
    ]);
});
 */


//$ Ritornare un parametro in una view
/* Route::get('/articoli/{id?}/categoria/{categoria?}',
function (int $id = 10, string $categoria = 'senza categoria') {
    return view('app', [
        'id' => $id,
        'categoria' => $categoria,
        'items' => ['occhiali', 'scarpe', 'cappelli', 'pizza']
    ]);
})->where(['id' => '[0-9]+', 'categoria' => '[a-zA-Z0-9-]+']); */


//% Rotte che attivano controller per ritornare delle viste
/* Route::get('first', [App\Http\Controllers\FirstController::class, 'string']);
Route::get('slug/{slug}', [App\Http\Controllers\FirstController::class, 'slug']);
Route::get('view', [App\Http\Controllers\FirstController::class, 'view']); */


//$ View Controllers
/*
Route::get('home', [App\Http\Controllers\PageController::class, 'home']);
Route::get('about', [App\Http\Controllers\PageController::class, 'about']);
Route::get('contacts', [App\Http\Controllers\PageController::class, 'contacts']); */

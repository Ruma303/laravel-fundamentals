<?php

use App\Models\Tag;
use App\Models\Post;
use App\Models\Detail;
use App\Models\Account;
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


//% Relazioni One to One

//$ Recuperare tutti i records
//* Accedere a tutti i record di accounts
/* Route::get('accounts', function() {
    $accounts = Account::all();
    dd($accounts);
}); */
//* Accedere a tutti i record di details
/* Route::get('details', function() {
    $details = Detail::all();
    dd($details);
}); */

//$ Route Model Binding
//* Accedere alla proprietà detail del singolo record account
/* Route::get('accounts/{account}', function(Account $account) {
    $detail = $account->detail;
    dd($detail);
}); */
//* Accedere alla proprietà account del singolo record detail
/* Route::get('details/{detail}', function(Detail $detail) {
    $account = $detail->account;
    dd($account);
}); */

//$ find() e abort()
/* Route::get('find/{id}', function($id) {
    $account = Account::find($id);
    $account ? dd($account) : abort('404');
}); */



//% Relazioni One to Many / Many to One

//* Mostrare tutti i post con i dettagli dell'account collegato
/* Route::get('posts', function() {
    $posts = Post::with('account')->get();
    foreach ($posts as $index => $post) {
        echo "Autore " . ($index + 1) .": "
        . $post->account->name .  "Titolo: " . $post->title  . "<br>";
    }
}); */

//* Mostrare tutti gli account con i titoli dei loro post
/* Route::get('accounts', function() {
    $accounts = Account::with('posts')->get();
    foreach ($accounts as $account) {
        echo "<h3>" . $account->name . "</h3><ul>";
        foreach ($account->posts as $post) {
            echo "<li>Post: " . $post->title . "</li>";
        }
        echo "</ul><hr>";
    }
}); */

//* Mostrare un account specifico e i suoi post
/* Route::get('accounts/{account}', function(Account $account) {
    echo "<h1>" . $account->name . "</h1><ol>";
    $posts = $account->posts;
    foreach ($posts as $id => $post) {
        echo "<li>Post " . ($id + 1) . ": "
        . $post->title . "</li>";
    }
    echo "</ol>";
}); */


//% Relazioni Many to Many

//* Mostrare tutti i tags
/* Route::get('tags', function() {
    $tags = Tag::all();
    return view('tags', ['tags' => $tags]);
});

//* Mostrare i tag di un post
use App\Http\Controllers\PostController;
Route::get('posts/{post}', [PostController::class, 'show']);

//* Associare tag a un post
Route::get('attach/{post}/{tag}', [PostController::class, 'attach']);

//* Rimuovere tag da un post
Route::get('detach/{post}/{tag}', [PostController::class, 'detach']); */

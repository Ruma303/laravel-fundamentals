<?php

use App\Models\Account;
use App\Models\Detail;
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
Route::get('accounts', function() {
    $accounts = Account::all();
    dd($accounts);
});
//* Accedere a tutti i record di details
Route::get('details', function() {
    $details = Detail::all();
    dd($details);
});

//$ Route Model Binding
//* Accedere alla proprietà detail del singolo record account
Route::get('accounts/{account}', function(Account $account) {
    $detail = $account->detail;
        dd($detail);
});
//* Accedere alla proprietà account del singolo record detail
Route::get('details/{detail}', function(Detail $detail) {
    $account = $detail->account;
    dd($account);
});

//$ find() e abort()
Route::get('find/{id}', function($id) {
    $account = Account::find($id);
    $account ? dd($account) : abort('404');
});


//% Relazioni One to Many / Many to One

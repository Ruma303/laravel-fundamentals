<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FirstController extends Controller
{
    public function string() : string {
        return '<h1>Metodo string() di FirstController attivato.</h1>';
    }

    public function slug($slug) : string {
        return ("<h1>Metodo slug() da FirstController attivato.</h1>
                <p>Slug catturato: $slug</p>");
    }

    public function view() {
        //return view('app');
        return view('app', ['saluta' => 'Ciao a tutti!']);
    }

}

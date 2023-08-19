<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    protected $data = [
        ['title' => 'Homepage', 'description' => 'Benvenuto nella Homepage!'],
        ['title' => 'About', 'description' => 'Riguardo a questo sito...'],
        ['title' => 'Contacts', 'description' => 'Entra in contatto con noi.'],
    ];
    public function home(){
        return view('home', $this->data[0]);
    }
    public function about(){
        $data = $this->data[1];
        return view('about', compact('data'));
    }
    public function contacts(){
        $data = $this->data[2];
        return view('contacts')->with('data', $data);

        //->with('saluta', 'Ciao dal secondo with()!');

        /* ->withTitle($data['title'])
        ->withDescription($data['description'])
        ->withContacts([
            'email' => 'contact@cont.com',
            'number' => '0123456789'
        ]); */
    }
}



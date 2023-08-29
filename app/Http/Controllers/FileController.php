<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FileController extends Controller
{
    public function formView() {
        return view('form');
    }

    public function handle(Request $request) {
        //dd($request->file('file-name'));

        //return $request->file('file-name')->store('/');

        //return $request->file('file-name')->store('/images');

        //return $request->file('file-name')->storeAs('/images', 'new_img.png');

        /* $file = $request->file('file-name');
        $file->storeAs('/images', $file->getClientOriginalName());
        return back()->with('success', 'File caricato con successo'); */


    }
}

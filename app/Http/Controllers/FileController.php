<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FileController extends Controller
{
    public function formView() {
        return view('form');
    }

    public function handle(Request $request) {
        $request->validate(['file-name' => [
        'required',
        //'min:512', 'max:1024', 'mimes:png, jpg, gif'
        ]]);

        //dd($request->file('file-name'));

        //return $request->file('file-name')->store('/');

        //return $request->file('file-name')->store('/images');

        //return $request->file('file-name')->storeAs('/images', 'new_img.png');

        $file = $request->file('file-name');
        $file->storeAs('/images', $file->getClientOriginalName());
        return back()->with('success', 'File caricato con successo');
    }

    public function deleteFile(Request $request) {
        $fileName = 'pizza-small.png';
        Storage::disk('local')->delete('/public/images/' . $fileName);
        return back()->with('deleted', 'Il file: ' . $fileName . ' è stato eliminato correttamente.');
    }
    //Storage::delete(['file1.jpg', 'file2.jpg']);
}

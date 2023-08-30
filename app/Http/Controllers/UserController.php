<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\File;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public function user(User $user) {
        return view('user');
    }

    public function store(User $user, Request $request) {
        //* putFile
        //$path = Storage::putFile('uploads', $request->file('file'));
        //dd($path);

        //* putFileAs
        /* $file = $request->file('file');
        $path = Storage::putFileAs('uploads', $file, 'new_file.png');
        dd($path); */

        //% Recuperare le informazioni dei file
        /* $randomName = time() . '_' .Str::random(12) . '_';
        $file = $request->file('file');
        $extension = $file->getClientOriginalExtension();
        $newFileName = $randomName . '.' . $extension; */

    }
}

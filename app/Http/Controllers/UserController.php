<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\File;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public function user() {
        return view('user', [
            'uploads' => asset('storage/uploads/*')
        ]);
    }

    public function store(Request $request) {
        // # Validazione file

        //* putFile
        //$path = Storage::putFile('uploads', $request->file('file'));
        //dd($path);

        //* putFileAs
        /* $file = $request->file('file');
        $path = Storage::putFileAs('uploads', $file, 'new_file.png');
        dd($path); */

        //$ Generare un nome univoco per il file

        //* Generare nome file unico

        // TODO da mettere nel primo file insieme agli altri metodi
        /* $file = $request->file('file');
        $randomName = time() . '_' .Str::random(12);
        $extension = $file->getClientOriginalExtension();
        $newFileName = $randomName . '.' . $extension;
        //$originalName = $file->getClientOriginalName();
        //dd($newFileName);

        $path = $file->storeAs('uploads', $newFileName, 'public');
        dd($path); */




        //# Acquisizione informazioni del file

        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $originalFileName = $file->getClientOriginalName();

            //? Verificare se esiste già un file caricato con lo stesso nome nel DB

            $path = 'uploads';

            if(! Storage::exists($path)) {
                Storage::makeDirectory($path);
            }

            $fileName = uniqid('file-' . time());
            $extension = $file->guessExtension();
            $mime = $file->getClientMimeType();
            $newFileName = $fileName . '.' . $extension;
        }


        //# Archiviazione file
        //* Archiviazione nel disco
        Storage::putFileAs('uploads', $file, $newFileName);

        //* Verifica prima di salvare
        /* if(! Storage::exists($fileName . '/' . $newFileName)) {
            Storage::delete($fileName . '/' . $newFileName);
            return back()->with('exists', 'Il file è già presente.');
        } */

        $newUser = new User; //* Istanza del nuovo record User nel DB
        $newUser->name = $request->input('name'); //* Nome utente

        //* Tutte le info del file da salvare
        $newUser->original_file_name = $originalFileName;
        $newUser->newFileName = $newFileName;
        $newUser->mime = $mime;
        $newUser->path = $path;
        $newUser->extension = $extension;

        $newUser->save();

        //session(['file' => $newFileName]);

        return redirect('users')->with('success', 'Il file è stato caricato correttamente.');
    }


    //% Copiare file


    //% Sostituire file


    //% Eliminare file

}

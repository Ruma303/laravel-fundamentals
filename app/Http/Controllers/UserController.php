<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public function user() {
        //return view('user');
        $users = User::all();
        return view('user', compact('users'));
    }

    public function store(Request $request)
    {
        //# Verifica del form arrivato
        //dd($request);

        //# Fase 1: Validazione file
        /* $request->validate([
            'file' => 'required'
        ]); */

        /* $request->validate([
            'file' => [
                'required',
                'min:512',
                'max:100000',
                'mimes:png,jpg,gif,pdf'
            ]
        ]); */


        //# Fase 2: Acquisizione delle informazioni sul file

        /* if ($request->hasFile('file')) {
            $file = $request->file('file');
            $originalFileName = $file->getClientOriginalName();

            $path = 'uploads';


            if (!Storage::exists($path)) {
                Storage::makeDirectory($path);
            }

            //? Forse si possono spostare nella fase 4
            $fileName = uniqid('file-' . time());
            $extension = $file->guessExtension();
            $mime = $file->getClientMimeType();
            $newFileName = $fileName . '.' . $extension;
        } */
        //dd($newFileName);



        //# Fase 3: Verifiche pre-salvataggio
        //? Controllare che il file non esista già nel filesystem.
        /* $filePath = 'uploads/' . $originalFileName;

        if (Storage::disk('public')->exists($filePath)) {
            return back()->with('exists', 'Il file è già presente.');
        } */

        /* $filesystemPath = Storage::disk('public')->putFileAs('uploads', $request->file('file'), $originalFileName);
        dump($filesystemPath); */

        //? Controllare che il file non esista già nel DB, altrimenti rinominarlo.

        /* $userWithSameFileName = User::where('original_file_name', $originalFileName)->first();

        if ($userWithSameFileName) {
            $counter = 1;
            $newFileName = $fileName . "(" . $counter . ")" . '.' . $extension;

            while (User::where('new_file_name', $newFileName)->first()) {
                $counter++;
                $newFileName = $fileName . "(" . $counter . ")" . '.' . $extension;
            }
        } else {
            $newFileName = $fileName . '.' . $extension;
        }*/


        //# Fase 4: Salvataggio del file

        //* store()
        //return $request->file('file')->store('/');
        //return $request->file('file')->store('/images');


        //* storeAs()
        /* $file = $request->file('file');
        return $file->storeAs('/images', $file->getClientOriginalName()); */


        //* Fallback
        /* if ($request->hasFile('file')) {
            $file = $request->file('file');
            $originalFileName = $file->getClientOriginalName();

            $path = 'uploads';

            if (!Storage::exists($path)) {
                Storage::makeDirectory($path);
            }

            //? Forse si possono spostare nella fase 4
            $fileName = uniqid('file-' . time());
            $extension = $file->guessExtension();
            $mime = $file->getClientMimeType();
            $newFileName = $fileName . '.' . $extension;
        } */


        //* Caricamento + Fallback
        /* if ($request->hasFile('file')) {
            $file = $request->file('file');
            $originalFileName = $file->getClientOriginalName();

            if (!Storage::disk('public')->exists('images/' . $originalFileName)) {
                $file->storeAs('images', $originalFileName);
                return redirect('users')->with('success', 'Il file ' . $originalFileName . '  stato caricato correttamente.');

            } else {
                return back()->with('exists', 'Il file ' . $originalFileName . ' è già presente.');
            }
        } */

        //, Metodi alternativi della facade Storage

        //* put()
        // return Storage::disk('public')->put('uploads', $request->file('file'));


        //* putFile
        // return Storage::putFile('public/uploads', $request->file('file'));


        //* putFileAs
        /* $file = $request->file('file');
        $path = Storage::putFileAs(
            'public/uploads', //# Percorso di caricamento
            $file,            //# Istanza del file da caricare
            'new_file' . '.' . $file->guessExtension() //# Nuovo nome file
        );
        return redirect('users')->with('success',
        'Il file ' . $file->getClientOriginalName() . ' stato caricato correttamente.'); */


        //% Mostrare il singolo file archiviato

        /* if ($request->hasFile('file')) {
            $file = $request->file('file');
            $originalFileName = $file->getClientOriginalName();

            if (!Storage::disk('public')->exists('uploads/' . $originalFileName)) {
                $file->storeAs('uploads', $originalFileName);
                return redirect('users')->with('success', 'Il file ' . $originalFileName . '  stato caricato correttamente.');

            } else {
                return back()->with('exists', 'Il file ' . $originalFileName . ' è già presente.');
            }
        } */


        //% Mostrare più file caricati

        /* if ($request->hasFile('file')) {
            $file = $request->file('file');
            $originalFileName = $file->getClientOriginalName();
            $randomName = time() . '_' .Str::random(12);
            $extension = $file->getClientOriginalExtension();
            $newFileName = $randomName . '.' . $extension;

            if (!Storage::disk('public')->exists('uploads/' . $newFileName)) {
                $file->storeAs('uploads', $newFileName);
                return redirect('users')->with('success',
                'Il file ' . $originalFileName . '  stato caricato correttamente.');

            } else {
                return back()->with('exists',
                'Il file ' . $originalFileName . ' è già presente.');
            }
        } */


        //# Fase 5: Persistenza nel database


        if ($request->hasFile('file')) {
            $file = $request->file('file');

            //* Acquisizione info file e generazione nuova stringa
            $originalFileName = $file->getClientOriginalName();
            $randomName = hash('sha256', $file->getRealPath()); //* Hash percorso
            //dd($randomName);
            $mime = $file->getClientMimeType();
            $path = 'uploads';
            $extension = $file->guessExtension();
            $newFileName = $randomName . '.' . $extension;

            if (!Storage::disk('public')->exists($path . '/' . $newFileName)) {

                //, Salvataggio file nel filesystem
                $file->storeAs('uploads', $newFileName, 'public');

                //, Persistenza dati nel Database
                $newUser = new User; //* Istanza del nuovo record User nel DB
                $newUser->name = $request->input('name'); //* Nome utente
                $newUser->original_file_name = $originalFileName;
                $newUser->new_file_name = $newFileName;
                $newUser->mime = $mime;
                $newUser->path = $path;
                $newUser->extension = $extension;
                $newUser->save();

                return redirect('users')->with('registered',
                'L\'utente ' . $request->input('name'). ' registrato correttamente.');

            } else {
                return back()->with('exists',
                'Errore. L\'utente ' . $request->input('name') . ' non è stato registrato<br>' .
                'Il file ' . $originalFileName . ' è già presente.');
            }
        }

    }


    //% Copiare file


    //% Spostare il file


    //% Download


    //% Eliminare file

}

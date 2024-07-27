<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{

    public function index()
    {
        $users = User::all();
        //$users = User::paginate(5);
        return view('users.index', compact('users'));
    }


    public function create()
    {
        return view('users.create');
    }


    /* public function store(Request $request)
    {
        //dd($request);
        //,Creazione nuovo record
        $user = new User();

        //,Assegnazione dati ai singoli campi

        $user->name = $request->input('name');
        // $user->name = $request->name;

        $user->email = $request->input('email');
        $user->password = $request->input('password');

        //,Salvataggio ed invio al database del nuovo record
        $user->save();

        //,Reindirizzamento verso l'index degli users

        return redirect('/users')->with([
            'user_created' => "User {$user->name} has been created."
        ]);
    } */

    //% Mass assignment create()

    /* public function store(Request $request)
    {
        //* Creazione del nuovo utente utilizzando il mass assignment
        $user = User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
        ]);

        //* Reindirizzamento verso l'index degli users
        return redirect('/users')->with([
            'created' => "User {$user->name} has been created."
        ]);
    } */


    //* Variante store() 1
    /* public function store(Request $request)
    {
        //,Recupero tutti i dati della $request
        $userData = $request->all();

        //,Creazione nuovo record
        $newUser = new User();

        //,Assegnazione nuovi dati
        $newUser->name = $userData['name'];
        $newUser->email = $userData['email'];
        $newUser->password = $userData['password'];

        $newUser->save();
        return redirect('/users');
    } */

    //* Variante store() 2
    /* public function store(Request $request)
    {
        //,Assegnazione nuovi dati dalla $request
        $newUser = new User();
        $newUser->name = $request['name'];
        $newUser->email = $request['email'];
        $newUser->password = $request['password'];

        $newUser->save();
        return redirect('/users');
    } */


    //% Creare record con fill()
    /* public function store(Request $request)
    {
        //* Creazione utente con fill()
        $user = new User;
        $user->fill([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
        ]);

        //* Esempio di altre operazioni
        $user->is_vip = $request->input('is_vip', false);
        $user->name = Str::lower($user->name);


        //* Salvataggio del nuovo utente
        $user->save();

        //* Reindirizzamento alla vista index con i dati aggiornati
        return redirect('/users')->with([
            'created' => "User {$user->name} has been created."
        ]);
    } */


    public function show(User $user)
    {
        //dd($user);
        return view('users.show', compact('user'));
    }


    public function edit(User $user)
    {
        return view('users.edit', compact('user'));
    }


    /* public function update(Request $request, User $user)
    {
        //,Sostituzione dei nuovi dati nell'istanza $user
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = $request->input('password');

        //,Invio dei dati al DB per aggiornarli
        $user->update();

        //,Reindirizzamento alla vista users.show con i dati aggiornati
        return redirect()->route('users.show', compact('user'));
        //return redirect('users/' . $user->id)->with(compact('user'));
    } */

    //* Variante update()
    /* public function update(Request $request, User $user)
    {
        $user->name = $request['name'];
        $user->email = $request['email'];
        $user->password = $request['password'];

        //,Invio dei dati al DB per aggiornarli
        $user->update();

        //,Reindirizzamento alla vista users.show con i dati aggiornati
        return redirect()->route('users.show', compact('user'));
    } */

    //% Mass assignment update()
    public function update(Request $request, User $user)
    {
        //* Aggiornamento dell'utente utilizzando il mass assignment
        $user->update([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
        ]);

        //* Reindirizzamento alla vista con i dati aggiornati
        return redirect()->route('users.show', compact('user'))->with([
            'user_updated' => "User {$user->name} has been updated."
        ]);
    }



    public function destroy(User $user)
    {
        $user->delete();
        return to_route('users.index');
    }

    /* return redirect()->route('users.index')->with([
        'success' => "User {$user->name} has been deleted."
    ]); */


    public function getUserVips()
    {
        $users = User::where('is_vip', true)->get();
        return view('users.vips', compact('users'));
    }


    //, Creazione di più record
    /* public function getOrInstantiateMultipleUsers(Request $request)
    {
        $users = $request->input('users');

        DB::transaction(function () use ($users) {
            foreach ($users as $userData) {
                //* Cerca l'utente esistente o crea una nuova istanza senza salvarla
                $user = User::firstOrNew([
                    'email' => $userData['email']  //# Cerca per email
                ]);

                //* Controlla se l'utente è stato appena istanziato (non esiste nel DB)
                if (!$user->exists) {
                    $user->name = $userData['name'];
                    $user->password = Hash::make($userData['password']);
                    $user->save();  //# Salva solo se l'utente è nuovo
                }
            }
        });

        return redirect()->route('users.index');
    } */


    //, Creazione di più record con upsert()

    public function getOrInstantiateMultipleUsers(Request $request)
    {
        $users = $request->input('users');
        $data = [];

        foreach ($users as $userData) {
            $data[] = [
                'name' => $userData['name'],
                'email' => $userData['email'],
                //? Assumendo che vogliamo resettare la password ogni volta
                'password' => Hash::make($userData['password']),
            ];
        }

        User::upsert($data, ['email'], ['name', 'password']);

        return redirect()->route('users.index')->with('success', 'Users have been updated or instantiated.');
    }


    public function trash()
    {
        $users = User::onlyTrashed()->get();
        return view('users.trash', compact('users'));
    }


    public function restore($id)
    {
        $user = User::onlyTrashed()->findOrFail($id);
        $user->restore();
        return redirect()->back()->with([
            'userRestored' => "L'utente $user->name è stato ripristinato"
        ]);
    }

    public function forceDelete($id)
    {
        $user = User::onlyTrashed()->findOrFail($id);
        $user->forceDelete();
        return redirect()->back()->with([
            'forceDelete' => "L'utente $user->name è stato eliminato permanentemente"
        ]);
    }
}

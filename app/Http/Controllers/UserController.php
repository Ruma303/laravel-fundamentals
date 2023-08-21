<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::all();
        return view('users.index', compact(['users']));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //$ Creazione nuovo record
        $user = new User();

        //$ Assegnazione dati ai singoli campi
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = $request->input('password');

        //$ Salvataggio ed invio al database del nuovo record
        $user->save();

        //$ Reindirizzamento verso l'index degli users
        return redirect('/users');
    }

    //* Variante store() 1
    /* public function store(Request $request)
    {
        //$ Recupero tutti i dati della $request
        $userData = $request->all();

        //$ Creazione nuovo record
        $newUser = new User();

        //$ Assegnazione nuovi dati
        $newUser->name = $userData['name'];
        $newUser->email = $userData['email'];
        $newUser->password = $userData['password'];

        $newUser->save();
        return redirect('/users');
    } */

    //* Variante store() 2
    /* public function store(Request $request)
    {
        //$ Assegnazione nuovi dati dalla $request
        $newUser = new User();
        $newUser->name = $request['name'];
        $newUser->email = $request['email'];
        $newUser->password = $request['password'];

        $newUser->save();
        return redirect('/users');
    } */

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        return view('users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        return view('users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        //$ Sostituzione dei nuovi dati nell'istanza $user
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = $request->input('password');

        //$ Invio dei dati al DB per aggiornarli
        $user->update();

        //$ Reindirizzamento alla vista users.show con i dati aggiornati
        return redirect()->route('users.show', compact('user'));
        //return redirect('users/' . $user->id)->with(compact('user'));
    }

    //* Variante update()
    /* public function update(Request $request, User $user)
    {
        $user->name = $request['name'];
        $user->email = $request['email'];
        $user->password = $request['password'];

        //$ Invio dei dati al DB per aggiornarli
        $user->update();

        //$ Reindirizzamento alla vista users.show con i dati aggiornati
        return redirect()->route('users.show', compact('user'));
    } */


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('users.index')->with([
            'success' => "User {$user->name} has been deleted."
        ]);
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    private $inputValidations = [
        'name'      => ['required', 'min:4', 'max:100'],
        'email'     => ['required', 'unique:users,email', 'min:4', 'max:100'],
        'password'  => ['required', 'min:4', 'max:100']
    ];

    private $validationsMessages = [
        'name.required'     =>  'Il nome è richiesto',
        'name.min'          =>  'Minimo 4 caratteri',
        'name.max'          =>  'Massimo 100 caratteri',

        'email.required'    =>  'L\'email è richiesta',
        'email.unique'      =>  'L\'email dev\'essere unica',
        'email.min'         =>  'Minimo 4 caratteri',
        'email.max'         =>  'Massimo 100 caratteri',

        'password.required' =>  'La password è richiesta',
        'password.min'      =>  'Minimo 4 caratteri',
        'password.max'      =>  'Massimo 100 caratteri',
    ];

    public function index()
    {
        $users = User::all();
        return view('users.index', compact('users'));
    }


    public function create()
    {
        return view('users.create');
    }


    /* public function store(Request $request)
    {
        //dd($request);
        //$ Creazione nuovo record
        $user = new User();

        //$ Assegnazione dati ai singoli campi
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = $request->input('password');

        //$ Salvataggio ed invio al database del nuovo record
        $user->save();

        //$ Reindirizzamento verso l'index degli users
        return redirect('/users')->with([
            'created' => 'User {$user->name} has been created.'
        ]);
    } */

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

    //% Mass assignment create()
    /* public function store(Request $request)
    {
        //* Creazione del nuovo utente utilizzando il mass assignment
        $user = User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password')),
        ]);

        //* Reindirizzamento verso l'index degli users
        return redirect('/users')->with([
            'created' => "User {$user->name} has been created."
        ]);
    }*/


    //% Creare record con fill()
    /* public function store(Request $request)
    {
        //* Creazione utente con fill()
        $user = new User;
        $user->fill([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password')),
        ]);
        $user->save();

        //* Reindirizzamento alla vista index con i dati aggiornati
        return redirect('/users')->with([
            'created' => "User {$user->name} has been created."
        ]);
    } */

    //% Validazione
    /* public function store(Request $request)
    { */
        //* Validazione dati in input
        /* $request->validate([
            'name' => 'required|string',
            'email' => 'required|email',
            'password' => 'required|string'
        ]); */
        /* $request->validate([
            'name' => 'required|min:4|max:255',
            'email' => 'required|unique:users|min:4|max:100',
            'password' => 'required|min:4|max:100'
        ]);
         */
        /* $request->validate([
            'name' => ['required', 'string'],
            'email' => ['required', 'email'],
            'password' => ['required', 'string']
        ]); */
        /* $request->validate([
            'name'      => ['required', 'min:4', 'max:100'],
            'email'     => ['required', 'unique:users,email', 'min:4', 'max:100'],
            'password'  => ['required', 'min:4', 'max:100']
        ], [
            'name.required'     =>  'Il nome è richiesto',
            'name.min'          =>  'Minimo 4 caratteri',
            'name.max'          =>  'Massimo 100 caratteri',

            'email.required'    =>  'L\'email è richiesta',
            'email.unique'      =>  'L\'email dev\'essere unica',
            'email.min'         =>  'Minimo 4 caratteri',
            'email.max'         =>  'Massimo 100 caratteri',

            'password.required' =>  'La password è richiesta',
            'password.min'      =>  'Minimo 4 caratteri',
            'password.max'      =>  'Massimo 100 caratteri',
        ]); */
        //dd('Validazione soddisfatta');

    public function store(Request $request)
    {
        //* Validazioni
        $request->validate(
            $this->inputValidations,
            $this->validationsMessages
        );

        //* Creazione del nuovo utente
        $user = User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password')),
        ]);

        //* Reindirizzamento verso l'index degli users
        return redirect('/users')->with([
            'created' => "User {$user->name} has been created."
        ]);
    }


    public function show(User $user)
    {
        return view('users.show', compact('user'));
    }


    public function edit(User $user)
    {
        return view('users.edit', compact('user'));
    }


    /* public function update(Request $request, User $user)
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
    } */

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

    //% Mass assignment update()
    /* public function update(Request $request, User $user)
    {
        //* Aggiornamento dell'utente utilizzando il mass assignment
        $user->update([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => $request->input('password'),
        ]);

        //* Reindirizzamento alla vista con i dati aggiornati
        return redirect()->route('users.show', compact('user'));
    } */


    //% Aggiornare record con fill()
    public function update(Request $request, User $user)
    {
        //* Validazioni
        $request->validate(
            $this->inputValidations,
            $this->validationsMessages
        );

        //* Aggiornamento dell'utente usando fill()
        $user->fill([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password')),
        ]);
        $user->save();

        //* Reindirizzamento alla vista dettagli con i dati aggiornati
        return redirect()->route('users.show', compact('user'));
    }


    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('users.index')->with([
            'success' => "User {$user->name} has been deleted."
        ]);
    }
}

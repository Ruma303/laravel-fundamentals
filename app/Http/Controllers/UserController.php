<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    private $inputValidations = [
        'name' => ['required', 'min:4', 'max:100'],
        'email' => ['required', 'unique:users,email', 'min:4', 'max:100'],
        'password' => ['required', 'min:4', 'max:100']
    ];

    private $validationsMessages = [
        'name.required' => 'Il nome è richiesto',
        'name.min' => 'Minimo 4 caratteri',
        'name.max' => 'Massimo 100 caratteri',
        'email.required' => 'L\'email è richiesta',
        'email.unique' => 'L\'email dev\'essere unica',
        'email.min' => 'Minimo 4 caratteri',
        'email.max' => 'Massimo 100 caratteri',
        'password.required' => 'La password è richiesta',
        'password.min' => 'Minimo 4 caratteri',
        'password.max' => 'Massimo 100 caratteri',
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
    //}


    //* Validazioni
    /* $request->validate(
        $this->inputValidations,
        $this->validationsMessages
    ); */
    public function store(UserRequest $request)
    {
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

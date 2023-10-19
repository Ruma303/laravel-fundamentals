<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
{
    public function authorize()
    {
        //? Questo dovrebbe ritornare true se l'utente ha l'autorità per fare la richiesta, altrimenti, dovremmo implementare la logica per determinare se l'utente è autorizzato
        return true;
    }

    public function rules()
    {
        return [
            'name' => ['required', 'min:4', 'max:100'],
            'email' => ['required', 'unique:users,email', 'min:4', 'max:100'],
            'password' => ['required', 'min:4', 'max:100'],
        ];
    }

    public function messages()
    {
        return [
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
    }
}

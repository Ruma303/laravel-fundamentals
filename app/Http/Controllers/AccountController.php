<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Account;
use Illuminate\Http\Request;

class AccountController extends Controller
{
    public function associate($id)
    {   //? Cerca l'Account con quell'id passato dalla rotta.
        $account = Account::find($id);
        if (!$account) { //! Se non esiste l'Account, lancia errore.
            return response()->json(['message' => "Errore: Account non trovato con id: $id"]);
        }

        $existingPost = Post::where('title', 'Nuovo Post')->where('account_id', $account->id)->first();

        if ($existingPost) { //! Se esiste già un Post associato, lancia errore.
            return response()->json(['message' => "Errore: Post già associato all'account con id: $id"]);

        }
        //* Crea e associa nuovo Post ad Account
        $post = new Post(['title' => 'Nuovo Post', 'body' => 'Testo di prova.']);
        $post->account()->associate($account);
        $post->save();

        return response()->json(['message' => "Nuovo Post associato all'account con id: $id"]);
    }

    public function dissociate($id)
    {   //? Cerca l'Account con quell'id passato dalla rotta.
        $account = Account::find($id);
        if (!$account) {
            return response()->json(['message' => "Errore: Account non trovato con id: $id"]);
        }
        $post = Post::where('title', 'Nuovo Post')->where('account_id', $account->id)->first();
        if (!$post) { //! Se non esiste il post associato, lancia errore.
            return response()->json(['message' => "Errore: Post con il titolo 'Nuovo Post' non associato all'account con id: $id"]);
        }  //* Dissocia Post da Account
        $post->account()->dissociate();
        $post->save();
        return response()->json(['message' => "Post dissociato dall'account con id: $id"]);
    }
}

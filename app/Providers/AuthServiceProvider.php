<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        //
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        //* Esempio Gate
        /* Gate::define('edit-post', function ($user, $post) {
            return $user->id === $post->user_id;
        }); */

        //, Permessi per l'amministratore

        Gate::define('admin', function (User $user) {
            return Auth::user()->is_admin;
            //return auth()->user()->is_admin;
            //return $user->is_admin;
        });




        //, Esempi di permessi

        //* Creare un post
        Gate::define('create-post', function ($user) {
            return $user->is_admin;
        });
        //* Modificare un post
        Gate::define('edit-post', function () {
            return Auth::user()->is_admin;
        });
        //* Eliminare un post
        Gate::define('delete-post', function () {
            return auth()->user()->is_admin;
        });
    }
}

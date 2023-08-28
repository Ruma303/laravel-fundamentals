<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;
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
        /**
         * 1. Creare un post
         * 2. Editare un post
         * 3. Eliminare un post
        */

        //* Creare un post
        Gate::define('create_post', function ($user) {
            return $user->is_admin;
        });

        //* Modificare un post
        Gate::define('edit_post', function () {
            return Auth::user()->is_admin;
        });

        //* Eliminare un post
        Gate::define('delete_post', function () {
            return auth()->user()->is_admin;
        });
    }
}

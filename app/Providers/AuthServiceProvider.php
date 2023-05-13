<?php

namespace App\Providers;

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
        $this->registerPolicies();

        /* define a admin user role */
        Gate::define('Admin', function ($user) {
            return $user->role == 'Admin';
        });

        /* define a manager user role */
        Gate::define('Promotor', function ($user) {
            return $user->role == 'Promotor';
        });

        /* define a user role */
        Gate::define('Visitador', function ($user) {
            return $user->role == 'Visitador';
        });
    }
}

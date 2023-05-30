<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

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
        /* define a SuperAdmin user role */
        Gate::define('SuperAdmin', function ($user) {
           return $user->role == 'SuperAdmin';
       });

       /* define a Admin user role */
       Gate::define('Admin', function ($user) {
           return $user->role == 'Admin';
       });

       /* define a Promotor user role */
       Gate::define('Promotor', function ($user) {
           return $user->role == 'Promotor';
       });

       /* define a Visitador role */
       Gate::define('Visitador', function ($user) {
           return $user->role == 'Visitador';
       });
    }
}
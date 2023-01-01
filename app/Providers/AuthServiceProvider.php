<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use App\Models\User;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('purchase-product', function (User $user){
            return !$user->is_admin; //returns true if NOT admin
        });
        Gate::define('edit-product', function (User $user){
            return $user->is_admin;  //returns true if admin
        });
        Gate::define('edit-users', function (User $user){
            return $user->is_admin;  //returns true if admin
        });

    }
}

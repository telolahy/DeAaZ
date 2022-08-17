<?php

namespace App\Providers;

use App\Models\RoleUser;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array<class-string, class-string>
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

        Gate::define('admin', function (User $user) {
            foreach ($user->roles as $role) {
                if ($role->role == "admin") {
                    return $role->role === "admin";
                }
            }
        });
        Gate::define('formateur', function (User $user) {
            foreach ($user->roles as $role) {
                if ($role->role == "admin") {
                    return $role->role === "admin";
                }
                if ($role->role == 'formateur') {
                    return $role->role ==='formateur';
                }
            }
        });
        Gate::define('etudiant', function (User $user) {
            foreach ($user->roles as $role) {
                if ($role->role == "admin") {
                    return $role->role === "admin";
                }
                if ($role->role == 'etudiant') {
                    return $role->role === 'etudiant';
                }
            }
        });
    }
}

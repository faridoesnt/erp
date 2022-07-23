<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

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

        Gate::define('hr', function($user) {
            return $user->roles == 'HR';
        });

        Gate::define('supervisor', function($user) {
            return $user->roles == 'Supervisor';
        });

        Gate::define('manager', function($user) {
            return $user->roles == 'Manager';
        });
        
        Gate::define('karyawan', function($user) {
            return $user->roles == 'Karyawan';
        });
    }
}

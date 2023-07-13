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
    public function boot()
    {
        $this->registerPolicies();
        //Mengatur Hak Akses untuk Admin
        Gate::define('admin-only', function ($user) {
            if ($user->level == 'admin') {
                return true;
            }
            return false;
        });
        Gate::define('user-only', function ($user) {
            if ($user->level == 'user') {
                return true;
            }
            return false;
        });
    }
}

<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // GATES

        // verifica se o usuário é admin
        Gate::define('admin', function (\App\Models\User $user) {
            return $user->isAdmin();
        });

        Gate::define("rh", function (\App\Models\User $user) {
            return $user->isRh();
        });
    }
}

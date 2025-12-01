<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Gate;
use Illuminate\Pagination\Paginator;
class AppServiceProvider extends ServiceProvider
{

    public function register(): void
    {
        //
    }

    public function boot()
    {
        Gate::define('isAdmin', function ($user) {
            return $user->role === 0;
        });

        Paginator::useBootstrapFive();
    }
}

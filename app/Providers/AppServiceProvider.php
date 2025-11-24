<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Gate;

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
    }
}

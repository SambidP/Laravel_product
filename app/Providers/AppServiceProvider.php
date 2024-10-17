<?php

namespace App\Providers;

use Gate;
use Illuminate\Support\ServiceProvider;
use Laravel\Passport\Passport;
use App\Models\User;
use App\Models\Category;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        Passport::ignoreRoutes();
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {

    }
}
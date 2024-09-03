<?php

namespace App\Providers;

use Darryldecode\Cart\CartServiceProvider;
use Illuminate\Foundation\AliasLoader;
use Illuminate\Support\ServiceProvider;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        // \Barryvdh\Debugbar\ServiceProvider::class,
        
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {

    }
}

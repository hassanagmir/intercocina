<?php

namespace App\Providers;

use Darryldecode\Cart\CartServiceProvider;
use Illuminate\Foundation\AliasLoader;
use Illuminate\Support\ServiceProvider;
use App\Policies\ActivityPolicy;
use Illuminate\Support\Facades\Gate;
use Spatie\Activitylog\Models\Activity;
use Filament\Support\Colors\Color;
use Filament\Support\Facades\FilamentColor;


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
        Gate::policy(Activity::class, ActivityPolicy::class);

    }
}

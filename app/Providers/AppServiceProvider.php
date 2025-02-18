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
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Route;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        // \Barryvdh\Debugbar\ServiceProvider::class,
        \Illuminate\Session\Middleware\StartSession::class;
        
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Gate::policy(Activity::class, ActivityPolicy::class);

        Blade::directive('responsiveImage', function ($expression) {
            [$src, $alt, $width, $height, $sizes] = explode(',', $expression);
            return <<<HTML
                <img
                src="{{ asset($src) }}"
                srcset="{{ asset(str_replace('.jpg', '-300.jpg', $src)) }} 300w,
                        {{ asset(str_replace('.jpg', '-500.jpg', $src)) }} 500w,
                        {{ asset(str_replace('.jpg', '-800.jpg', $src)) }} 800w"
                sizes="$sizes"
                width="$width"
                height="$height"
                alt="$alt">
                HTML;
        });

        Route::middleware('api')
            ->prefix('api')
            ->group(base_path('routes/api.php'));

    }
}

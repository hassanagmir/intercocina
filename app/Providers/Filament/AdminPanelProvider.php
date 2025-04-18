<?php

namespace App\Providers\Filament;

use Filament\Http\Middleware\Authenticate;
use Filament\Http\Middleware\DisableBladeIconComponents;
use Filament\Http\Middleware\DispatchServingFilamentEvent;
use Filament\Pages;
use Filament\Panel;
use Filament\PanelProvider;
use Filament\Support\Colors\Color;
use Filament\Widgets;
use Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse;
use Illuminate\Cookie\Middleware\EncryptCookies;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;
use Illuminate\Routing\Middleware\SubstituteBindings;
use Illuminate\Session\Middleware\AuthenticateSession;
use Illuminate\Session\Middleware\StartSession;
use Illuminate\View\Middleware\ShareErrorsFromSession;
use CharrafiMed\GlobalSearchModal\Customization\Position;
use Filament\View\PanelsRenderHook;
use Illuminate\Support\Facades\Blade;

class AdminPanelProvider extends PanelProvider
{
    public function panel(Panel $panel): Panel
    {
        return $panel
            ->default()
            ->id('admin')
            ->path('admin')
            ->login()
            ->brandLogo('\assets\imgs\intercocina-logo.png')
            ->brandLogoHeight("2.5rem")
            ->favicon('\assets\imgs\favicon.png')
            ->colors([
                'primary' => Color::Rose,
            ])
            // ->renderHook(PanelsRenderHook::TOPBAR_END, function () {
            //     return Blade::render('<div style="border: solid red 1px; padding: 5px;">{{ $text }}</div>', [
            //         'text' => 'INTERCOCINA',
            //     ]);
            // })
            ->databaseNotifications()
            ->discoverResources(in: app_path('Filament/Resources'), for: 'App\\Filament\\Resources')
            ->discoverPages(in: app_path('Filament/Pages'), for: 'App\\Filament\\Pages')
            ->pages([
                Pages\Dashboard::class,
            ])
            ->discoverWidgets(in: app_path('Filament/Widgets'), for: 'App\\Filament\\Widgets')
            ->widgets([
                Widgets\AccountWidget::class,
            ])
            ->plugins([
                \BezhanSalleh\FilamentShield\FilamentShieldPlugin::make(),
                \Rmsramos\Activitylog\ActivitylogPlugin::make()
                    ->label(__("Journal d'activité"))
                    ->navigationIcon('heroicon-o-adjustments-vertical')
                    ->navigationGroup('Autorisation')
                    ->pluralLabel(__("Journaux d'activité")),
                \CharrafiMed\GlobalSearchModal\GlobalSearchModalPlugin::make()
                    ->position(
                        fn (Position $position) => $position
                            ->top(100, 'px')     // Numeric value with unit
                            ->right('30rem')     // String with unit
                    )
            ])
            ->middleware([
                EncryptCookies::class,
                AddQueuedCookiesToResponse::class,
                StartSession::class,
                AuthenticateSession::class,
                ShareErrorsFromSession::class,
                VerifyCsrfToken::class,
                SubstituteBindings::class,
                DisableBladeIconComponents::class,
                DispatchServingFilamentEvent::class,
            ])

            ->navigationGroups([
                "Porduits",
                "Plus d'options",
                "Autorisation",
            ])
            
            ->authMiddleware([
                Authenticate::class,
            ])->viteTheme('resources/css/filament/admin/theme.css');
    }
}

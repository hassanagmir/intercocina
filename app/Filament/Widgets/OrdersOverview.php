<?php

namespace App\Filament\Widgets;

use App\Models\Order;
use App\Models\Review;
use App\Models\User;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use GuzzleHttp\Client;
use Spatie\FilamentSimpleStats\SimpleStat;

class OrdersOverview extends BaseWidget
{

    
    protected function getStats(): array
    {
        return [
        // SimpleStat::make(Order::class)
        //     ->label(__("Commandes"))
        //     ->description(__("L'année dernière"))
        //     ->lastYears(1)
        //     ->dailyCount(),

            
            SimpleStat::make(User::class)
                ->description(__("L'année dernière"))
                ->label(__("Clients"))
                ->lastYears(1)
                ->dailyCount(),
            
            SimpleStat::make(Review::class)
                ->description(__("L'année dernière"))
                ->label(__("Avis"))
                ->lastYears(1)
                ->dailyCount(),
        ];
    }
}

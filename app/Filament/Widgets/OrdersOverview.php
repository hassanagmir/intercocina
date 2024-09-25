<?php

namespace App\Filament\Widgets;

use App\Enums\OrderStatusEnum;
use App\Models\Order;
use App\Models\Review;
use App\Models\User;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Spatie\FilamentSimpleStats\SimpleStat;

class OrdersOverview extends BaseWidget
{

    
    protected function getStats(): array
    {
        return [

            SimpleStat::make(Order::class)
                ->description(__("L'année dernière"))
                ->label(__("Commandes"))
                ->where('status',"<>", OrderStatusEnum::CANCELD)
                ->lastYears(1)
                ->dailyCount(),

            
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

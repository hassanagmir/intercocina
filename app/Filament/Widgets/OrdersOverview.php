<?php

namespace App\Filament\Widgets;

use App\Enums\OrderStatusEnum;
use App\Models\Order;
use App\Models\Product;
use App\Models\Review;
use App\Models\User;
use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class OrdersOverview extends StatsOverviewWidget
{
    protected function getStats(): array
    {
        $startOfLastYear = now()->subYear()->startOfDay();

        // Orders
        $ordersCount = Order::query()
            ->where('status', '<>', OrderStatusEnum::CANCELED)
            ->where('created_at', '>=', $startOfLastYear)
            ->count();

        $ordersChart = Order::query()
            ->where('status', '<>', OrderStatusEnum::CANCELED)
            ->where('created_at', '>=', $startOfLastYear)
            ->selectRaw('DATE(created_at) as date, COUNT(*) as count')
            ->groupBy('date')
            ->orderBy('date')
            ->pluck('count')
            ->toArray();

        // Users
        $usersCount = User::query()
            ->where('created_at', '>=', $startOfLastYear)
            ->count();

        $usersChart = User::query()
            ->where('created_at', '>=', $startOfLastYear)
            ->selectRaw('DATE(created_at) as date, COUNT(*) as count')
            ->groupBy('date')
            ->orderBy('date')
            ->pluck('count')
            ->toArray();

        // Reviews
        $reviewsCount = Review::query()
            ->where('created_at', '>=', $startOfLastYear)
            ->count();

        $reviewsChart = Review::query()
            ->where('created_at', '>=', $startOfLastYear)
            ->selectRaw('DATE(created_at) as date, COUNT(*) as count')
            ->groupBy('date')
            ->orderBy('date')
            ->pluck('count')
            ->toArray();

        // Products
        $productsCount = Product::query()
            ->where('created_at', '>=', $startOfLastYear)
            ->count();

        $productsChart = Product::query()
            ->where('created_at', '>=', $startOfLastYear)
            ->selectRaw('DATE(created_at) as date, COUNT(*) as count')
            ->groupBy('date')
            ->orderBy('date')
            ->pluck('count')
            ->toArray();

        return [
            Stat::make(__('Commandes'), $ordersCount)
                ->description(__("L'année dernière"))
                ->chart($ordersChart)
                ->color('primary'),

            Stat::make(__('Clients'), $usersCount)
                ->description(__("L'année dernière"))
                ->chart($usersChart)
                ->color('success'),

            Stat::make(__('Avis'), $reviewsCount)
                ->description(__("L'année dernière"))
                ->chart($reviewsChart)
                ->color('warning'),

            Stat::make(__('Produits'), $productsCount)
                ->description(__("L'année dernière"))
                ->chart($productsChart)
                ->color('danger'),
        ];
    }
}
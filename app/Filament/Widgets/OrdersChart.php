<?php

namespace App\Filament\Widgets;

use App\Models\Order;
use Filament\Widgets\ChartWidget;
use Illuminate\Support\Carbon;

class OrdersChart extends ChartWidget
{
    protected static ?string $heading = 'Rapport des commandes';

    protected static string $color = 'info';

    protected static ?int $sort = 4;

    protected function getData(): array
    {
        $endDate = now();
        $startDate = $endDate->copy()->subDays(29); // To get 30 days including today

        $data = Order::selectRaw('DATE(created_at) as date, COUNT(*) as count')
            ->where('created_at', '>=', $startDate)
            ->groupBy('date')
            ->pluck('count', 'date')
            ->toArray();

        $dateRange = [];
        for ($date = $startDate; $date <= $endDate; $date->addDay()) {
            $dateString = $date->toDateString();
            $dateRange[$dateString] = $data[$dateString] ?? 0;
        }

        return [
            'datasets' => [
                [
                    'label' => __("Commandes"),
                    'data' => array_values($dateRange),
                    'backgroundColor' => 'rgba(54, 162, 235, 0.2)',
                    'borderColor' => 'rgba(54, 162, 235, 1)',
                ],
            ],
            'labels' => array_keys($dateRange),
        ];
    }

    protected function getType(): string
    {
        return 'line';
    }
}
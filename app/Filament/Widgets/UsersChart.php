<?php

namespace App\Filament\Widgets;

use App\Models\User;
use Filament\Widgets\ChartWidget;

class UsersChart extends ChartWidget
{
    protected static ?string $heading = 'Rapport des clients';

    protected static string $color = 'primary';

    protected static ?int $sort = 4;
    protected function getData(): array
    {
        $endDate = now();
        $startDate = $endDate->copy()->subDays(29); // To get 30 days including today

        $data = User::selectRaw('DATE(created_at) as date, COUNT(*) as count')
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
                    'label' => __("Clients"),
                    'data' => array_values($dateRange),
                    // 'backgroundColor' => 'rgba(54, 162, 235, 0.2)',
                    // 'borderColor' => 'rgba(54, 162, 235, 1)',
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

<?php

namespace App\Filament\Widgets;

use App\Models\User;
use Filament\Widgets\ChartWidget;
use Carbon\CarbonPeriod;

class UsersChart extends ChartWidget
{
    protected ?string $heading = 'Rapport des clients';

    protected string $color = 'primary';

    protected static ?int $sort = 5;

    protected function getData(): array
    {
        $endDate = now();
        $startDate = $endDate->copy()->subDays(29);

        $data = User::selectRaw('DATE(created_at) as date, COUNT(*) as count')
            ->whereBetween('created_at', [
                $startDate->copy()->startOfDay(),
                $endDate->copy()->endOfDay(),
            ])
            ->groupByRaw('DATE(created_at)')
            ->pluck('count', 'date')
            ->toArray();

        $period = CarbonPeriod::create($startDate, $endDate);

        $labels = [];
        $counts = [];

        foreach ($period as $date) {
            $dateString = $date->toDateString();
            $labels[] = $dateString;
            $counts[] = $data[$dateString] ?? 0;
        }

        return [
            'datasets' => [
                [
                    'label'           => 'Clients',
                    'data'            => $counts,
                    'backgroundColor' => 'rgba(54, 162, 235, 0.2)',
                    'borderColor'     => 'rgba(54, 162, 235, 1)',
                    'fill'            => true,
                    'tension'         => 0.4,
                ],
            ],
            'labels' => $labels,
        ];
    }

    protected function getType(): string
    {
        return 'line';
    }

    protected function getOptions(): array
    {
        return [
            'scales' => [
                'y' => [
                    'beginAtZero' => true,
                    'ticks' => [
                        'stepSize' => 1,
                        'precision' => 0,
                    ],
                    'min' => 0,
                ],
            ],
        ];
    }
}

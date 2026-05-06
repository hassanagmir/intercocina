<?php

namespace App\Filament\Widgets;

use App\Models\Order;
use Filament\Widgets\ChartWidget;

class OrdersChart extends ChartWidget
{
    protected ?string $heading = 'Rapport des commandes';
    protected string $color = 'info';
    protected static ?int $sort = 4;
    protected ?string $maxHeight = '300px'; // ← fixed: non-static

    protected function getData(): array
    {
        try {
            $endDate = now();
            $startDate = $endDate->copy()->subDays(29);

            $data = Order::selectRaw('DATE(created_at) as date, COUNT(*) as count')
                ->whereBetween('created_at', [
                    $startDate->copy()->startOfDay(),
                    $endDate->copy()->endOfDay(),
                ])
                ->groupByRaw('DATE(created_at)')
                ->pluck('count', 'date')
                ->toArray();

            $dateRange = [];
            $current = $startDate->copy();

            while ($current->lte($endDate)) {
                $dateString = $current->toDateString();
                $dateRange[$dateString] = $data[$dateString] ?? 0;
                $current->addDay();
            }

            return [
                'datasets' => [
                    [
                        'label'           => __('Commandes'),
                        'data'            => array_values($dateRange),
                        'backgroundColor' => 'rgba(54, 162, 235, 0.2)',
                        'borderColor'     => 'rgba(54, 162, 235, 1)',
                        'fill'            => true,
                        'tension'         => 0.4,
                    ],
                ],
                'labels' => array_keys($dateRange),
            ];
        } catch (\Exception $e) {
            \Log::error('OrdersChart error: ' . $e->getMessage());

            return [
                'datasets' => [
                    [
                        'label'           => __('Commandes'),
                        'data'            => [],
                        'backgroundColor' => 'rgba(54, 162, 235, 0.2)',
                        'borderColor'     => 'rgba(54, 162, 235, 1)',
                        'fill'            => true,
                        'tension'         => 0.4,
                    ],
                ],
                'labels' => [],
            ];
        }
    }

    protected function getType(): string
    {
        return 'line';
    }

    protected function getOptions(): array
    {
        return [
            'plugins' => [
                'legend' => [
                    'display' => true,
                ],
            ],
            'scales' => [
                'y' => [
                    'beginAtZero' => true,
                    'ticks' => [
                        'stepSize' => 1,
                    ],
                ],
            ],
        ];
    }
}
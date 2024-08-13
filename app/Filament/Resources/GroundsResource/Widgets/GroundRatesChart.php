<?php

namespace App\Filament\Resources\GroundsResource\Widgets;

use App\Models\grounds;
use Filament\Widgets\ChartWidget;

class GroundRatesChart extends ChartWidget
{
    protected static ?string $heading = 'Ground Rates Distribution';

    protected function getData(): array
    {
        $rateRanges = [
            '0-50' => [0, 50],
            '51-100' => [51, 100],
            '101-200' => [101, 200],
            '201+' => [201, PHP_INT_MAX],
        ];

        // Initialize data array
        $data = [];

        // Count the number of grounds within each rate range
        foreach ($rateRanges as $label => [$min, $max]) {
            $data[$label] = Grounds::whereBetween('rate', [$min, $max])->count();
        }

        return [
            'datasets' => [
                [
                    'label' => 'Number of Grounds',
                    'data' => array_values($data),
                    'backgroundColor' => ['#FF6384', '#36A2EB', '#FFCE56', '#4BC0C0'],
                ],
            ],
            'labels' => array_keys($data),
        ];
    }

    protected function getType(): string
    {
        return 'bar';
    }
}

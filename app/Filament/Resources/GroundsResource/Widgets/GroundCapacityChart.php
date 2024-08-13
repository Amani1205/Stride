<?php

namespace App\Filament\Resources\GroundsResource\Widgets;

use App\Models\grounds;
use Filament\Widgets\ChartWidget;

class GroundCapacityChart extends ChartWidget
{
    protected static ?string $heading = 'Ground Capacity Distribution';

    protected function getData(): array
    {
        $capacityRanges = [
            '0-50' => [0, 50],
            '51-100' => [51, 100],
            '101-200' => [101, 200],
            '201+' => [201, PHP_INT_MAX],
        ];

        // Initialize data array
        $data = [];

        // Count the number of grounds within each capacity range
        foreach ($capacityRanges as $label => [$min, $max]) {
            $data[] = grounds::whereBetween('capacity', [$min, $max])->count();
        }
        return [
           'datasets' => [
                [
                    'label' => 'Number of Grounds',
                    'data' => $data,
                    'backgroundColor' => ['#FF6384', '#36A2EB', '#FFCE56', '#4BC0C0'],
                    'borderColor' => ['#FF6384', '#36A2EB', '#FFCE56', '#4BC0C0'],
                    'borderWidth' => 1,
                ],
            ],
            'labels' => array_keys($capacityRanges),
        ];
    }

    protected function getType(): string
    {
        return 'bar';
    }
}

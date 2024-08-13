<?php

namespace App\Filament\Resources\UserResource\Widgets;

use App\Models\User;
use Carbon\Carbon;
use Filament\Widgets\ChartWidget;

class RegisterTrendChart extends ChartWidget
{
    protected static ?string $heading = 'Last 7 days Registration';

    protected function getData(): array
    {
        $data = [];
        $labels = [];

        for ($i = 6; $i >= 0; $i--) {
            $date = Carbon::now()->subDays($i)->toDateString();
            $count = User::whereDate('created_at', $date)->count();

            $labels[] = $date;
            $data[] = $count;
        }

        return [
           'datasets' => [
                [
                    'label' => 'Number of Registrations',
                    'data' => $data,
                    'backgroundColor' => '#ffc300',
                    'borderColor' => '#003566',
                    'fill' => true,
                ],
            ],
            'labels' => $labels,
        ];
    }

    protected function getType(): string
    {
        return 'line';
    }
}

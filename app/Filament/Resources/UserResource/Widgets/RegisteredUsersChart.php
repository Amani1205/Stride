<?php

namespace App\Filament\Resources\UserResource\Widgets;

use App\Models\User;
use Filament\Widgets\ChartWidget;

class RegisteredUsersChart extends ChartWidget
{
    protected static ?string $heading = 'Total Registered Coaches and Grounds';

    protected function getData(): array
    {
        // Fetch the counts of registered coaches and ground owners
        $coachesCount = User::where('usertype', 'Coach')->count();
        $groundsCount = User::where('usertype', 'Ground Owner')->count();

        return [
            'datasets' => [
                [
                    'label' => 'Total Registered Users',
                    'data' => [$coachesCount, $groundsCount],
                    'backgroundColor' => ['#99d6ea', '#054a91'], // Custom colors for bars
                ],
            ],
            'labels' => ['Coaches', 'Ground Owners'], // Chart labels
        ];
    }

    protected function getType(): string
    {
        return 'bar'; // Using a bar chart
    }
}


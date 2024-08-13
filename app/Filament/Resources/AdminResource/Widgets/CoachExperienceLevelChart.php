<?php

namespace App\Filament\Resources\AdminResource\Widgets;

use App\Models\User;
use Filament\Widgets\ChartWidget;

class CoachExperienceLevelChart extends ChartWidget
{
    protected static ?string $heading = 'Coach Experience Level Distribution';

    protected function getData(): array
    {

        $experienceLevels = [
            'District', 'National', 'International'
        ];

        // Fetch the number of confirmed coaches for each experience level
        $coachesByExperience = User::join('coaches', 'users.id', '=', 'coaches.user_id')
            ->where('users.usertype', 'Coach')
            ->whereIn('users.level_of_experience', $experienceLevels)
            ->groupBy('users.level_of_experience')
            ->selectRaw('users.level_of_experience, COUNT(*) as count')
            ->pluck('count', 'users.level_of_experience');

        // Ensure all experience levels are included, even if their count is 0
        $counts = [];
        foreach ($experienceLevels as $level) {
            $counts[] = $coachesByExperience->get($level, 0);
        }
        return [
            'datasets' => [
                [
                    'label' => 'Number of Coaches',
                    'data' => $counts, // Chart data (counts)
                    'backgroundColor' => ['#0096c7','#69a197', '#0077b6' ], // Custom colors for bars
                ],
            ],
            'labels' => $experienceLevels, // Chart labels (experience levels)
            'options' => [
                'scales' => [
                    'y' => [
                        'ticks' => [
                            'callback' => function($value) {
                                return intval($value); // Ensure numbers are shown as integers
                            },
                        ],
                    ],
                ],
            ],
        ];
    }

    protected function getType(): string
    {
        return 'bar';
    }
}

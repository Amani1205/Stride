<?php

namespace App\Filament\Resources\AdminResource\Widgets;

use Filament\Widgets\ChartWidget;
use App\Models\User;

class CoachingSportChart extends ChartWidget
{
    protected static ?string $heading = 'Sports Coaches Registered For';

    protected function getData(): array
    {
        // Define the sports you want to include in the chart
        $sports = [
            'Cricket', 'Football', 'Basketball', 'Rugby', 'Boxing', 'Hockey',
            'Tennis', 'Swimming', 'Volleyball', 'Badminton', 'Baseball',
            'Table Tennis', 'Athletics','Karate', 'Chess'
        ];

        // Fetch the number of coaches for each specified sport
        $coachesBySport = User::where('usertype', 'coach')
            ->whereIn('coaching_sport', $sports)
            ->groupBy('coaching_sport')
            ->selectRaw('coaching_sport, COUNT(*) as count')
            ->pluck('count', 'coaching_sport');

        // Ensure all sports are included, even if their count is 0
        $counts = [];
        foreach ($sports as $sport) {
            $counts[] = $coachesBySport->get($sport, 0);
        }

        return [
            'datasets' => [
                [
                    'label' => 'Number of Coaches',
                    'data' => $counts, // Chart data (counts)
                    'backgroundColor' => ['#df9a57', '#fae588','#69a197', '#1a759f'], // Optional: custom colors for bars
                ],
            ],
            'labels' => $sports, // Chart labels (sports)
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



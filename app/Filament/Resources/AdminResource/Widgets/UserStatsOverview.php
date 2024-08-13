<?php

namespace App\Filament\Resources\AdminResource\Widgets;

use App\Models\coach;
use App\Models\grounds;
use App\Models\User;
use Filament\Support\Enums\IconPosition;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class UserStatsOverview extends BaseWidget
{
    protected static ?string $pollingInterval = '10s';
    protected function getStats(): array
    {
        return [
            Stat::make('Total Registered Users',\App\Models\User::count())
                ->icon('heroicon-o-user-group')
                ->description('30% Increase')
                ->color('primary')
                ->chart([
                    User::whereDate('created_at', now()->subDays(6))->count(),
                    User::whereDate('created_at', now()->subDays(5))->count(),
                    User::whereDate('created_at', now()->subDays(4))->count(),
                    User::whereDate('created_at', now()->subDays(3))->count(),
                    User::whereDate('created_at', now()->subDays(2))->count(),
                    User::whereDate('created_at', now()->subDays(1))->count(),
                    User::whereDate('created_at', now())->count(),
                ])
                ->descriptionIcon('heroicon-m-arrow-trending-up', IconPosition::Before),

                Stat::make('Total Registered Coaches', User::where('usertype', 'Coach')->count())
                ->icon('heroicon-o-users')
                ->description('5% increase')
                ->color('warning')
                ->chart([7, 2, 1, 3, 15, 4, 17])
                ->descriptionIcon('heroicon-m-arrow-trending-up', IconPosition::Before),


                Stat::make('Total Registered Grounds', User::where('usertype', 'Ground Owner')->count())
                ->icon('heroicon-o-presentation-chart-line')
                ->description('2% increase')
                ->color('warning')
                ->chart([7, 12, 10, 33, 15, 4, 17])
                ->descriptionIcon('heroicon-m-arrow-trending-up'),

                Stat::make('Finalized Coaches', coach::count())
                ->icon('heroicon-o-users')
                ->description('5% increase')
                ->color('success')
                ->chart([7, 2, 1, 3, 15, 4, 17])
                ->descriptionIcon('heroicon-m-arrow-trending-up', IconPosition::Before),

                Stat::make('Finalized Grounds', grounds::count())
                    ->icon('heroicon-o-presentation-chart-line')
                    ->description('2% increase')
                    ->color('success')
                    ->chart([7, 12, 10, 33, 15, 4, 17])
                    ->descriptionIcon('heroicon-m-arrow-trending-up', IconPosition::Before),

                    Stat::make('Number of Sports',15)
                    ->icon('heroicon-o-lifebuoy')
                    ->descriptionIcon('heroicon-m-arrow-trending-up', IconPosition::Before),

        ];
    }
}

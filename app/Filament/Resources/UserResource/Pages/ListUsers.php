<?php

namespace App\Filament\Resources\UserResource\Pages;

use App\Filament\Resources\AdminResource\Widgets\UserStatsOverview;
use App\Filament\Resources\UserResource;
use App\Filament\Resources\UserResource\Widgets\RegisteredUsersChart;
use App\Filament\Resources\UserResource\Widgets\RegisterTrendChart;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListUsers extends ListRecords
{
    protected static string $resource = UserResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }

    protected function getFooterWidgets(): array
    {
        return [
            RegisteredUsersChart::class,
            RegisterTrendChart::class

        ];
    }

}

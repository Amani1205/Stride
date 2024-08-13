<?php

namespace App\Filament\Resources\GroundsResource\Pages;

use App\Filament\Resources\GroundsResource;
use App\Filament\Resources\GroundsResource\Widgets\GroundCapacityChart;
use App\Filament\Resources\GroundsResource\Widgets\GroundRatesChart;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListGrounds extends ListRecords
{
    protected static string $resource = GroundsResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }

    protected function getFooterWidgets(): array
    {


        return [
          GroundRatesChart::class,
          GroundCapacityChart::class,
        ];
    }
}

<?php

namespace App\Filament\App\Resources\TestingResource\Pages;

use App\Filament\App\Resources\TestingResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListTestings extends ListRecords
{
    protected static string $resource = TestingResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}

<?php

namespace App\Filament\App\Resources\TestingResource\Pages;

use App\Filament\App\Resources\TestingResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditTesting extends EditRecord
{
    protected static string $resource = TestingResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}

<?php

namespace App\Filament\Resources\GroundsResource\Pages;

use App\Filament\Resources\GroundsResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditGrounds extends EditRecord
{
    protected static string $resource = GroundsResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}

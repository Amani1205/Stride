<?php

namespace App\Filament\App\Resources\TestingResource\Pages;

use App\Filament\App\Resources\TestingResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateTesting extends CreateRecord
{
    protected static string $resource = TestingResource::class;
}

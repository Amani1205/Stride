<?php

namespace App\Filament\Resources\AdminResource\Widgets;

use App\Models\Grounds;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget as BaseWidget;
use Filament\Tables\Columns\TextColumn;

class GroundTable extends BaseWidget
{
    protected static ?string $heading = 'Confirmed Grounds';
    protected int | string | array $columnSpan="full";
    public function table(Table $table): Table
    {
        return $table
            ->query(Grounds::query()->with('user'))
            ->columns([
                TextColumn::make('user_id')
                    ->label('Ground ID')
                    ->sortable()
                    ->searchable(),

                TextColumn::make('user.name')
                    ->label('Ground Name')
                    ->sortable()
                    ->searchable(),

                TextColumn::make('user.contact_number')
                    ->label('Contact Number')
                    ->sortable()
                    ->searchable(),

                TextColumn::make('rate')
                    ->label('Rate per Hour')
                    ->sortable()
                    ->searchable(),

                TextColumn::make('capacity')
                    ->label('Capacity')
                    ->sortable()
                    ->searchable(),
            ]);
    }
}

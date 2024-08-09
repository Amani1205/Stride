<?php

namespace App\Filament\App\Resources;

use App\Filament\App\Resources\TestingResource\Pages;
use App\Models\Testing;
use Filament\Forms;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class TestingResource extends Resource
{
    protected static ?string $model = Testing::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make([
                    Grid::make()
                        ->schema([
                            TextInput::make('user_id')
                                ->default(auth()->user()->id)
                                ->dehydrated()
                                ->disabled()
                                ->required()
                                ->maxLength(255),
                            TextInput::make('name')
                                
                                ->required()
                                ->maxLength(255),
                        ])
                ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListTestings::route('/'),
            'create' => Pages\CreateTesting::route('/create'),
            'edit' => Pages\EditTesting::route('/{record}/edit'),
        ];
    }

    // protected static function mutateFormDataBeforeCreate(array $data): array
    // {
    //     $data['user_id'] = auth()->user()->id;
    //     return $data;
    // }

    // protected static function mutateFormDataBeforeSave(array $data): array
    // {
    //     $data['user_id'] = auth()->user()->id;
    //     return $data;
    // }
}



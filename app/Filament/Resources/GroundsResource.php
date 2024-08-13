<?php

namespace App\Filament\Resources;

use App\Filament\Resources\GroundsResource\Pages;
use App\Filament\Resources\GroundsResource\RelationManagers;
use App\Models\Grounds;
use App\Models\User;
use Filament\Forms;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class GroundsResource extends Resource
{
    protected static ?string $model = Grounds::class;

    protected static ?string $navigationGroup = 'Ground Management';
    protected static ?string $navigationIcon = 'heroicon-o-building-office';
    protected static ?int $navigationSort = 3;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Select::make('user_id')
                ->label('Ground Owner')
                ->options(User::all()->where('usertype', 'Ground Owner')->mapWithKeys(function ($user) {
                    return [$user->id => "{$user->id} - {$user->name}"];
                }))
                ->reactive()
                ->required()
                ->afterStateUpdated(function ($state, $set) {
                    $user = User::find($state);
                    $set('contact_number', $user ? $user->contact_number : '');
                    $set('stadium_address', $user ? $user->stadium_address : '');
                    $set('available_sports', $user ? $user->available_sports : []);
                }),

            TextInput::make('contact_number')
                ->label('Contact Number')
                ->disabled()
                ->required()
                ->maxLength(255),

            TextInput::make('stadium_address')
                ->label('Stadium Address')
                ->disabled()
                ->required()
                ->maxLength(255),

            Select::make('available_sports')
                ->label('Available Sports')
                ->multiple()
                ->options([
                    'Football' => 'Football',
                    'Basketball' => 'Basketball',
                    'Tennis' => 'Tennis',
                    'Cricket' => 'Cricket',
                ])
                ->disabled(),

            TextInput::make('rate')
                ->label('Rate per hour')
                ->required()
                ->maxLength(255),

            TextInput::make('capacity')
                ->label('Capacity')
                ->required()
                ->maxLength(255),

            Repeater::make('time_slots')
                ->schema([
                    Select::make('day')
                        ->options([
                            'Monday' => 'Monday',
                            'Tuesday' => 'Tuesday',
                            'Wednesday' => 'Wednesday',
                            'Thursday' => 'Thursday',
                            'Friday' => 'Friday',
                            'Saturday' => 'Saturday',
                            'Sunday' => 'Sunday',
                        ])
                        ->required(),
                    TextInput::make('start_time')
                        ->label('Start Time')
                        ->required()
                        ->placeholder('09:00')
                        ->type('time'),
                    TextInput::make('end_time')
                        ->label('End Time')
                        ->required()
                        ->placeholder('11:00')
                        ->type('time'),
                ])
                ->minItems(1)
                ->required()
                ->createItemButtonLabel('Add Time Slot'),

            FileUpload::make('images')
                ->label('Images')
                ->image()
                ->multiple()
                ->required(),

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('user_id')
                    ->label('Ground ID')
                    ->searchable()
                    ->sortable(),
                    // ground name
                TextColumn::make('user.name')
                    ->label('Ground Name')
                    ->searchable()
                    ->sortable(),

                // contact number
                TextColumn::make('user.contact_number')
                    ->label('Contact Number')
                    ->searchable()
                    ->sortable(),
// capacity
                TextColumn::make('capacity')
                    ->label('Capacity')
                    ->searchable()
                    ->sortable(),
                
                // rate
                TextColumn::make('rate')
                    ->label('Rate per hour')
                    ->searchable()
                    ->sortable(),


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
            'index' => Pages\ListGrounds::route('/'),
            'create' => Pages\CreateGrounds::route('/create'),
            'edit' => Pages\EditGrounds::route('/{record}/edit'),
        ];
    }
}

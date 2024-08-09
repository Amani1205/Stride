<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CoachResource\Pages;
use App\Filament\Resources\CoachResource\RelationManagers;
use App\Models\Coach;
use App\Models\User;
use Filament\Forms;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TagsColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class CoachResource extends Resource
{
    protected static ?string $model = Coach::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Select::make('user_id')
                    ->label('User')
                    ->options(User::all()->mapWithKeys(function ($user) {
                        return [$user->id => "{$user->id} : {$user->name} - {$user->usertype}"];
                    }))
                    ->reactive()
                    ->required()
                    ->afterStateUpdated(function ($state, $set) {
                        $user = User::find($state);
                        $set('coaching_sport', $user ? $user->coaching_sport : '');
                    }),

                TextInput::make('coaching_sport')
                    ->label('Coaching Sport')
                    ->disabled()
                    ->required()
                    ->maxLength(255),


                TextInput::make('rate')
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

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('user_id')
                ->label('User ID')
                ->sortable()
                ->searchable(),

            TextColumn::make('user.name')
                ->label('User Name')
                ->sortable()
                ->searchable(),

            TextColumn::make('user.coaching_sport')
                ->label('Coaching Sport')
                ->sortable()
                ->searchable(),

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
            'index' => Pages\ListCoaches::route('/'),
            'create' => Pages\CreateCoach::route('/create'),
            'edit' => Pages\EditCoach::route('/{record}/edit'),
        ];
    }
}

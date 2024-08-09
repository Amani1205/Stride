<?php

namespace App\Filament\Resources;

use App\Filament\Resources\UserResource\Pages;
use App\Filament\Resources\UserResource\RelationManagers;
use App\Models\User;
use Faker\Provider\ar_EG\Text;
use Filament\Forms;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Pages\Page;
use Filament\Resources\Pages\CreateRecord;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class UserResource extends Resource
{
    protected static ?string $model = User::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
                TextInput::make('name')
                ->required()
                ->placeholder('John Doe'),

                Select::make('usertype')
                    ->required()
                    ->placeholder('Select a user type')
                    ->options([
                        'Coach' => 'Coach',
                        'Ground Owner' => 'Ground Owner',
                        'Athlete' => 'Athlete',
                    ])
                    ->reactive(),

                TextInput::make('coaching_sport')
                    ->label('Coaching Sport')
                    ->placeholder('Enter the sport')
                    ->visible(fn ($get) => $get('usertype') === 'Coach'),

                    // years_of_experience
                    TextInput::make('years_of_experience')
                    ->label('Years of Experience')
                    ->placeholder('Enter the years of experience')
                    ->visible(fn ($get) => $get('usertype') === 'Coach'),

                    // drop down for level_of_experience
                    Select::make('level_of_experience')
                    ->label('Level of Experience')

                    ->options([
                        'District' => 'District',
                        'National' => 'National',
                        'International' => 'International',
                    ])
                    ->visible(fn ($get) => $get('usertype') === 'Coach'),

                    // contact_number
                    TextInput::make('contact_number')
                    ->label('Contact Number')
                    ->placeholder('Enter the contact number')
                    ->visible(fn ($get) => $get('usertype') === 'Coach'),

                    // stadium_address
                    TextInput::make('stadium_address')
                    ->label('Stadium Address')
                    ->placeholder('Enter the stadium address')
                    ->visible(fn ($get) => $get('usertype') === 'Ground Owner'),

                    TextInput::make('email')
                    ->label('Email Address')
                    ->email()
                    ->required()
                    ->maxLength(255)
                    ->unique(),

                    TextInput::make('password')
                ->label('Password')
                ->password()
                ->dehydrated(fn($state)=>filled($state))
                ->required(fn(Page $livewire):bool=> $livewire instanceof CreateRecord),


            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->searchable(),

                TextColumn::make('email')
                    ->searchable(),

                TextColumn::make('usertype')
                    ->searchable(),
            TextColumn::make('coaching_sport')
                    ->searchable(),

            ])
            ->filters
                ([
                    SelectFilter::make('usertype')
                        ->options([
                            'Coach' => 'Coach',
                            'Ground Owner' => 'Ground Owner',
                            'Athlete' => 'Athlete',
                        ]),
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
            'index' => Pages\ListUsers::route('/'),
            'create' => Pages\CreateUser::route('/create'),
            'edit' => Pages\EditUser::route('/{record}/edit'),
        ];
    }
}

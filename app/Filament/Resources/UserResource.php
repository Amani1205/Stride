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

    protected static ?int $navigationSort = 1;
    protected static ?string $navigationGroup = 'User Management';
    protected static ?string $navigationIcon = 'heroicon-o-user-group';

    public static function form(Form $form): Form
    {


    return $form
        ->schema([
            Select::make('usertype')
                ->label('User Type')
                ->required()
                ->placeholder('Select a user type')
                ->options([
                    'Coach' => 'Coach',
                    'Ground Owner' => 'Ground Owner',
                    'Athlete' => 'Athlete',
                ])
                ->reactive(),

            TextInput::make('name')
                ->label(fn ($get) =>
                    $get('usertype') === 'Coach' ? 'Coach Name' :
                    ($get('usertype') === 'Ground Owner' ? 'Ground Name' : 'Name')
                )
                ->required()
                ->placeholder('John Doe'),

            Select::make('coaching_sport')
                ->label('Coaching Sport')
                ->placeholder('Select a sport')
                ->options([
                    'Cricket' => 'Cricket',
                    'Football' => 'Football',
                    'Basketball' => 'Basketball',
                    'Rugby' => 'Rugby',
                    'Boxing' => 'Boxing',
                    'Hockey' => 'Hockey',
                    'Tennis' => 'Tennis',
                    'Swimming' => 'Swimming',
                    'Volleyball' => 'Volleyball',
                    'Badminton' => 'Badminton',
                    'Baseball' => 'Baseball',
                    'Table Tennis' => 'Table Tennis',
                    'Athletics' => 'Athletics',
                    'Karate' => 'Karate',
                    'Chess' => 'Chess',
                ])
                ->visible(fn ($get) => $get('usertype') === 'Coach'),

            TextInput::make('years_of_experience')
                ->label('Years of Experience')
                ->placeholder('Enter the years of experience')
                ->visible(fn ($get) => $get('usertype') === 'Coach'),

            Select::make('level_of_experience')
                ->label('Level of Experience')
                ->options([
                    'District' => 'District',
                    'National' => 'National',
                    'International' => 'International',
                ])
                ->visible(fn ($get) => $get('usertype') === 'Coach'),

            TextInput::make('contact_number')
                ->label('Contact Number')
                ->placeholder('Enter the contact number')
                ->visible(fn ($get) => in_array($get('usertype'), ['Coach', 'Ground Owner']))
                ->required(),

            TextInput::make('stadium_address')
                ->label('Stadium Address')
                ->placeholder('Enter the stadium address')
                ->visible(fn ($get) => $get('usertype') === 'Ground Owner'),

            Select::make('available_sports')
                ->label('Available Sports')
                ->multiple()
                ->options([
                    'Cricket' => 'Cricket',
                    'Football' => 'Football',
                    'Basketball' => 'Basketball',
                    'Rugby' => 'Rugby',
                    'Boxing' => 'Boxing',
                    'Hockey' => 'Hockey',
                    'Tennis' => 'Tennis',
                    'Swimming' => 'Swimming',
                    'Volleyball' => 'Volleyball',
                    'Badminton' => 'Badminton',
                    'Baseball' => 'Baseball',
                    'Table Tennis' => 'Table Tennis',
                    'Athletics' => 'Athletics',
                    'Karate' => 'Karate',
                    'Chess' => 'Chess',
                ])
                ->visible(fn ($get) => $get('usertype') === 'Ground Owner')
                ->required(),
                // ->default(fn ($record) => is_array($record->available_sports) ? $record->available_sports : json_decode($record->available_sports, true) ?? []),

            TextInput::make('email')
                ->label('Email Address')
                ->email()
                ->required()
                ->maxLength(255)
                ->unique(),

            TextInput::make('password')
                ->label('Password')
                ->password()
                ->dehydrated(fn ($state) => filled($state))
                ->required(fn (Page $livewire): bool => $livewire instanceof CreateRecord),
        ]);
}

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id')
                    ->label('User ID')
                    ->sortable()
                    ->searchable(),

                TextColumn::make('name')
                    ->searchable(),

                TextColumn::make('email')
                    ->searchable(),

                TextColumn::make('usertype')
                ->label('User Type')
                    ->searchable(),
            TextColumn::make('contact_number')
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

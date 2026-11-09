<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AddressResource\Pages;
use App\Models\Address;
use App\Models\User;
use BackedEnum;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use UnitEnum;

class AddressResource extends Resource
{
    protected static ?string $model = Address::class;

    protected static string|BackedEnum|null $navigationIcon = 'heroicon-o-map-pin';

    protected static string|UnitEnum|null $navigationGroup = "Plus d'options";

    public static function getModelLabel(): string
    {
        return __('Adresse');
    }

    public static function getPluralModelLabel(): string
    {
        return __('Adresses');
    }

    public static function form(Schema $schema): Schema
    {
        return $schema
            ->columns(2)
            ->components([
                // Searchable select, loaded on demand (no huge preload)
                Select::make('user_id')
                    ->label(__('Utilisateur'))
                    ->relationship('user', 'first_name')
                    ->getOptionLabelFromRecordUsing(
                        fn (User $record): string => trim("{$record->first_name} {$record->last_name}")
                    )
                    ->searchable(['first_name', 'last_name'])
                    ->columnSpanFull(),

                TextInput::make('address_name')
                    ->label(__('Adresse'))
                    ->required()
                    ->maxLength(255)
                    ->columnSpanFull(),

                TextInput::make('first_name')
                    ->label(__('Prénom'))
                    ->required()
                    ->maxLength(255),

                TextInput::make('last_name')
                    ->label(__('Nom'))
                    ->required()
                    ->maxLength(255),

                TextInput::make('phone')
                    ->label(__('Téléphone'))
                    ->tel()
                    ->required()
                    ->maxLength(255),

                TextInput::make('email')
                    ->label(__('E-mail'))
                    ->email()
                    ->maxLength(255),

                Select::make('city_id')
                    ->label(__('Ville'))
                    ->relationship('city', 'name')
                    ->searchable()
                    ->preload()
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            // Eager load only what the table needs (avoids N+1 queries)
            ->modifyQueryUsing(fn (Builder $query) => $query
                ->with(['user:id,first_name,last_name', 'city:id,name']))
            ->defaultSort('created_at', 'desc')
            ->columns([
                TextColumn::make('user_name')
                    ->label(__('Utilisateur'))
                    ->state(fn (Address $record): string => $record->user
                        ? trim("{$record->user->first_name} {$record->user->last_name}")
                        : '-')
                    ->searchable(query: fn (Builder $query, string $search): Builder => $query
                        ->whereHas('user', fn (Builder $q) => $q
                            ->where('first_name', 'like', "%{$search}%")
                            ->orWhere('last_name', 'like', "%{$search}%")))
                    ->sortable(query: fn (Builder $query, string $direction): Builder => $query
                        ->orderBy(
                            User::select('first_name')
                                ->whereColumn('users.id', 'addresses.user_id')
                                ->limit(1),
                            $direction
                        )),

                TextColumn::make('address_name')
                    ->label(__('Adresse'))
                    ->searchable(),

                TextColumn::make('phone')
                    ->label(__('Téléphone'))
                    ->searchable(),

                TextColumn::make('city.name')
                    ->label(__('Ville'))
                    ->sortable(),

                TextColumn::make('email')
                    ->label(__('E-mail'))
                    ->searchable(),

                TextColumn::make('created_at')
                    ->label(__('Créé le'))
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->recordActions([
                EditAction::make(),
                DeleteAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index'  => Pages\ListAddresses::route('/'),
            'create' => Pages\CreateAddress::route('/create'),
            'edit'   => Pages\EditAddress::route('/{record}/edit'),
        ];
    }
}
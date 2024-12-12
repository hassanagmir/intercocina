<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AddressResource\Pages;
use App\Filament\Resources\AddressResource\RelationManagers;
use App\Models\Address;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class AddressResource extends Resource
{
    protected static ?string $model = Address::class;

    protected static ?string $navigationIcon = 'heroicon-o-map-pin';

    protected static ?string $navigationGroup = "Plus d'options";

    public static function getModelLabel(): string
    {
        return __("Adresse");
    }

    
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('user_id'),
                Forms\Components\TextInput::make('address_name')
                    ->label(__("Adresse"))
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('first_name')
                    ->label(__("Prénom"))
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('last_name')
                    ->label(__("Nom"))
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('phone')
                    ->label(__("Téléphone"))
                    ->tel()
                    ->required()
                    ->maxLength(255),
                Forms\Components\Select::make('city_id')
                    ->relationship("city", 'name')
                    ->searchable()
                    ->preload()
                    ->label(__("Ville"))
                    ->required(),
                Forms\Components\TextInput::make('email')
                    ->label(__("E-mail"))
                    ->email()
                    ->maxLength(255),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('user')
                    ->state(function (Model $model) {
                        return $model->user->first_name . " " . $model->user->last_name;
                    })
                    ->label(__("Utilisateur"))
                    ->sortable(),
                Tables\Columns\TextColumn::make('address_name')
                    ->label(__("Adresse"))
                    ->searchable(),

                Tables\Columns\TextColumn::make('phone')
                    ->label(__("Téléphone"))
                    ->searchable(),
                Tables\Columns\TextColumn::make('city.name')
                    ->label(__("Ville"))
                    ->sortable(),
                Tables\Columns\TextColumn::make('email')
                    ->label(__("E-mail"))
                    ->searchable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->label(__("Cree le"))
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),

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
            'index' => Pages\ListAddresses::route('/'),
            'create' => Pages\CreateAddress::route('/create'),
            'edit' => Pages\EditAddress::route('/{record}/edit'),
        ];
    }
}

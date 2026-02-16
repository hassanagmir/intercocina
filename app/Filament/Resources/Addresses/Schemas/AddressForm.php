<?php

namespace App\Filament\Resources\Addresses\Schemas;

use Filament\Forms;
use Filament\Schemas\Schema;

class AddressForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Forms\Components\Select::make('user_id')
                    ->label(__('Ville'))
                    ->relationship('user', 'first_name')
                    ->searchable()
                    ->preload()
                    ->required()
                    ->getOptionLabelFromRecordUsing(
                        fn($record) =>
                        $record->first_name . ' ' . $record->last_name
                    ),

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
}

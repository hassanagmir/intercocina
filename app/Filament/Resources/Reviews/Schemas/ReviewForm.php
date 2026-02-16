<?php

namespace App\Filament\Resources\Reviews\Schemas;

use Filament\Forms;
use Filament\Schemas\Schema;

class ReviewForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                    Forms\Components\TextInput::make('full_name')
                        ->label(__("Nom et prénom"))
                        ->required()
                        ->maxLength(255),
                    Forms\Components\TextInput::make('email')
                        ->label(__("E-mail"))
                        ->email()
                        ->required()
                        ->maxLength(255),
                    
                    Forms\Components\Select::make('product_id')
                        ->label(__("Produit"))
                        ->relationship('product', 'name')
                        ->searchable()
                        ->preload()
                        ->required(),
                    Forms\Components\TextInput::make('stars')
                        ->numeric()
                        ->label(__("Notation"))
                        ->required(),
                    Forms\Components\Toggle::make('status')
                        ->required(),
                    Forms\Components\Textarea::make('comment')
                        ->label(__("Commentaire"))
                        ->columnSpanFull()
            ]);
    }
}

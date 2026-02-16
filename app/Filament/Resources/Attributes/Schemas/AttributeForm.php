<?php

namespace App\Filament\Resources\Attributes\Schemas;

use Filament\Forms;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class AttributeForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make([
                    Forms\Components\TextInput::make('name')
                        ->label(__("Attribut"))
                        ->required()
                        ->maxLength(255),

                    Forms\Components\Select::make('category_id')
                        ->relationship('category', 'name')
                        ->searchable()
                        ->label(__("Catégorie")),

                    Forms\Components\Textarea::make('discription')
                        ->label(__("Description"))
                        ->columnSpanFull(),
                ])->columns(2)
                ->columnSpanFull()
            ]);
    }
}

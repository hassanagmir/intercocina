<?php

namespace App\Filament\Resources\Colors\Schemas;


use Filament\Forms;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class ColorForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Grid::make(1)
                    ->schema([
                        Forms\Components\FileUpload::make('image')
                            ->label(__("Image du color"))
                            ->avatar()
                            ->alignCenter()
                            ->image(),
                        Section::make()
                            ->schema([
                                Forms\Components\TextInput::make('name')
                                    ->label(__("Couleur"))
                                    ->required()
                                    ->maxLength(255),

                                Forms\Components\TextInput::make('es_name')
                                    ->label(__("Couleur en espagnol"))
                                    ->maxLength(255)
                                    ->default(null),
                                Forms\Components\TextInput::make('code')
                                    ->label(__("Nombre"))
                                    ->maxLength(255)
                                    ->default(null),

                                Forms\Components\Toggle::make('status')
                                    ->inline(false)
                                    ->helperText('Rendre cette catégorie visible pour tout le monde.')
                                    ->label(__("Visibilité"))
                                    ->default(true)
                                    ->required(),
                            ])
                            ->columns(2)
                            ->columnSpanFull(),
                    ])->columnSpanFull(),
            ]);
    }
}
